<?php

namespace App\Http\Controllers;


use Cart;
use Dompdf\Dompdf;
use App\Models\Tax;
use App\Models\Deal;
use App\Models\Table;
use App\Models\Product;
use App\Models\Category;
use App\Models\DealItem;
use App\Models\Discount;
use Mike42\Escpos\Printer;
use App\Models\DineinOrder;
use App\Models\BookingOrder;
use Illuminate\Http\Request;
use App\Models\TakeawayOrder;
use App\Models\DelieveryOrder;
use App\Models\DineinOrderItem;
use App\Models\BookingOrderItem;
use App\Models\TakeawayOrderItem;
use App\Models\DelieveryOrderItem;
use Illuminate\Support\Facades\Session;


use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

class PosController extends Controller
{

    public function Cashier()
    {
        return view('admin.pages.cashier');
    }
    public function SelectTable()
    {
        $tables = Table::join('floors', 'floors.id', '=', 'tables.floor_id')
            ->leftJoin('assign_table_to_staff', 'assign_table_to_staff.table_id', '=', 'tables.id')
            ->leftjoin('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
            ->select('tables.*', 'staff.name as waiter', 'floors.name as floor')
            ->get();
        return view('admin.pages.selecttable', compact('tables'));
    }
    // public function BookedTable(Request $request)
    // {
    //     $request->validate([
    //         "tableid" => "required"
    //     ]);
    //     $table = Table::find($request->tableid);
    //     $table->status = false;
    //     $table->update();
    //     $id = $table->id;

    //     return redirect('pos/' . $id)->with('tableid', $id);
    // }

    public function index($id)
    {
        $tables = Table::get();
        $items = \Cart::getContent();
        $categories = Category::get();
        $discounts = Discount::get();
        $tax = Tax::where('status', '=', true)->first();
        $deals = Deal::get();
        $products = Product::get();
        return view('admin.pages.pos', compact('categories', 'items', 'tables', 'id', 'discounts', 'tax', 'deals', 'products'));
    }

    public function fetchProducts(Request $request)
    {
        $products = Product::where('category_id', '=', $request->categoryid)->get();
        $html =  view('admin.pages.productlist', compact('products'))->render();
        return response()->json(['html' => $html]);
    }

    public function DealItems(Request $request)
    {
        $items = DealItem::join('products', 'products.id', '=', 'deal_items.product_id')
            ->select('products.*', 'deal_items.quantity')
            ->where('deal_id', '=', $request->dealid)->get();
        return response()->json($items);
    }

    public function AddToCart(Request $request)
    {
        if ($request->dealid == 0) {
            $data = Product::find($request->productid);
            $price = $data->price;
            $instruction = $request->pinstruction;
        } else {
            $data = Deal::select('deals.*', 'deals.id as did')->find($request->dealid);
            $price = $data->dealprice;
            $instruction = $request->dinstruction;
        }


        $rowID = rand(1000, 9999);
        $items = \Cart::session($request->id)->getContent();
        foreach ($items as $item) {
            if ($item->name == $data->name) {
                Cart::session($request->id)->update($item->id, [
                    'attributes' => array('instruction' => $instruction),
                ]);
                return redirect('increasequantity')->with(['id' => $item->id, 'tableid' => $request->id]);
            }
        }
        // Add Product
        Cart::session($request->id)->add(array(
            'id' => $rowID + 1,
            'name' => $data->name,
            'productid' => $data->id,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array('instruction' => $instruction),
            'associatedModel' => $data
        ));


        $tablestatus = Table::find($request->id);
        $tablestatus->status = false;
        $tablestatus->update();
    }

    public function fetchCarts(Request $request)
    {
        $items = \Cart::session($request->id)->getContent();
        return response()->json(['carts' => $items]);
    }

    public function RemoveCart(Request $request)
    {
        \Cart::session($request->tableid)->remove($request->id);
        return "success";
    }

    public function IncreaseQuantity(Request $request)
    {
        if ($request->id) {
            $id = $request->id;
        } elseif (session('id')) {
            $id = session('id');
        }
        if ($request->tableid) {
            // update the item on cart
            \Cart::session($request->tableid)->update($id, [
                'quantity' => 1
            ]);
        } else {
            $tid = session('tableid');
            \Cart::session($tid)->update($id, [
                'quantity' => 1
            ]);
        }


        return "Quantity Increased";
    }

    public function DecreaseQuantity(Request $request)
    {
        // update the item on cart
        \Cart::session($request->tableid)->update($request->id, [
            'quantity' => -1
        ]);

        return "Quantity Decreased";
    }

    public function FetchTotal(Request $request)
    {
        $total = Cart::session($request->tableid)->getTotal();
        $totalitem = Cart::session($request->tableid)->getTotalQuantity();
        return response()->json(['total' => $total, 'totalitem' => $totalitem]);
    }

    public function Takeaway(Request $request)
    {
        $total = Cart::getTotal();
        $items = Cart::getTotalQuantity();
        $order = new TakeawayOrder();
        $order->customer_name = $request->customer_name;
        $order->cashier_name = $request->cashier_name;
        $order->payment_type = $request->payment_type;
        $order->items = $items;
        $order->total = $total;
        $order->recieve = $request->recieve;
        $order->refund = $request->recieve - $total;
        $order->save();

        $carts = Cart::getContent();
        foreach ($carts as $cart) {
            $orderitem = new TakeawayOrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $cart->associatedModel->id;
            $orderitem->quantity = $cart->quantity;
            $orderitem->save();
        }
        Cart::clear();

        return redirect('pos');
    }

    public function Delievery(Request $request)
    {
        $total = Cart::getTotal();
        $items = Cart::getTotalQuantity();
        $order = new DelieveryOrder();
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_email = $request->customer_email;
        $order->payment_type = $request->payment_type;
        $order->rider_name = $request->rider_name;
        $order->items = $items;
        $order->delievery_charges = $request->delievery_charges;
        $order->sub_total = $total;
        $order->total = $total + $request->delievery_charges;
        $order->recieve = $request->recieve;
        $order->refund = $request->recieve - ($total + $request->delievery_charges);
        $order->save();

        $carts = Cart::getContent();
        foreach ($carts as $cart) {
            $orderitem = new DelieveryOrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $cart->associatedModel->id;
            $orderitem->quantity = $cart->quantity;
            $orderitem->save();
        }
        Cart::clear();

        return redirect('pos');
    }

    public function DineIn(Request $request, $id)
    {
        $total = Cart::session($id)->getTotal();
        $items = Cart::session($id)->getTotalQuantity();
        $tax =  Tax::find($request->tax);
        if ($request->discount != null || $request->discount != '') {
            $discount = Discount::find($request->discount);
            $discoun = $discount->percentage;
        } else {
            $discoun = 0;
        }
        $taxx = ($tax->percentage / 100) * $total;
        $discountt = ($discoun / 100) * $total;
        $totall = ($total + $taxx) - $discountt;
        $order = new DineinOrder();
        $order->table_id = $id;
        $order->discount_id = $request->discount;
        $order->tax_id = $request->tax;
        $order->payment_type = $request->payment_type;
        $order->items = $items;
        $order->subtotal = $total;
        $order->tax = $taxx;
        $order->discount = $discountt;
        $order->total = $totall;
        $order->recieve = $request->recieve;
        $order->refund = $request->recieve - $totall;
        $order->save();

        $carts = Cart::session($id)->getContent();
        foreach ($carts as $cart) {
            $orderitem = new DineinOrderItem();
            $orderitem->order_id = $order->id;
            if ($cart->associatedModel->did) {
                $orderitem->product_id = null;
                $orderitem->deal_id = $cart->associatedModel->did;
            } else {
                $orderitem->product_id = $cart->associatedModel->id;
                $orderitem->deal_id = null;
            }

            $orderitem->quantity = $cart->quantity;
            $orderitem->save();
        }
        Cart::clear();


        $table = Table::find($id);
        $table->status = true;
        $table->update();
        return redirect('order/print/' . $order->id);
    }

    public function PrintOrder($id)
    {
        $data = DineinOrder::join('tables', 'tables.id', '=', 'dinein_orders.table_id')
            ->join('floors', 'floors.id', '=', 'tables.floor_id')
            ->join('assign_table_to_staff', 'assign_table_to_staff.table_id', '=', 'tables.id')
            ->join('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
            // ->join('discounts', 'discounts.id', '=', 'dinein_orders.discount_id')
            ->join('taxes', 'taxes.id', '=', 'dinein_orders.tax_id')
            ->select('dinein_orders.*', 'taxes.percentage as taxp', 'staff.name as staff', 'tables.table as table', 'floors.name as floor')
            ->find($id);

        $products = DineinOrderItem::join('products', 'products.id', '=', 'dinein_order_items.product_id')
            ->where('order_id', '=', $id)
            ->select('products.name as product_name', 'products.price', 'dinein_order_items.*')
            ->get();
        $deals = DineinOrderItem::join('deals', 'deals.id', '=', 'dinein_order_items.deal_id')
            ->where('order_id', '=', $id)
            ->select('deals.name as product_name', 'deals.dealprice as price', 'dinein_order_items.*')
            ->get();
        return view('admin.pages.printreceipt', compact('id', 'products', 'data', 'deals'));
    }

    public function Booking(Request $request)
    {
        $total = Cart::getTotal();
        $items = Cart::getTotalQuantity();
        $order = new BookingOrder();
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_email = $request->customer_email;
        $order->payment_type = $request->payment_type;
        $order->payment_status = $request->payment_status;
        $order->rider_name = $request->rider_name;
        $order->event_date = $request->date;
        $order->items = $items;
        $order->delievery_charges = $request->delievery_charges;
        $order->sub_total = $total;
        $order->total = $total + $request->delievery_charges;
        $order->recieve = $request->recieve;
        if ($request->payment_status == 'paid') {
            $order->refund = $request->recieve - ($total + $request->delievery_charges);
        } else {
            $order->left = ($total + $request->delievery_charges) - $request->recieve;
        }

        $order->save();

        $carts = Cart::getContent();
        foreach ($carts as $cart) {
            $orderitem = new BookingOrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $cart->associatedModel->id;
            $orderitem->quantity = $cart->quantity;
            $orderitem->save();
        }
        Cart::clear();

        return redirect('pos');
    }

    public function FetchDiscount(Request $request)
    {
        $id = $request->discountid;
        $total = Cart::session($request->tableid)->getTotal();

        $discount = Discount::find($id);
        $discountamount = (($discount->percentage / 100) * $total);

        return $discountamount;
    }
    public function KotPrint(Request $request, $id)
    {
        // $items = \Cart::session($id)->getContent();
        // $sortedItems = $items->sortBy(function ($item) {
        //     return $item->associatedModel->category_id;
        // });
        // $sortedItems->values()->all();


        $items = \Cart::session($id)->getContent();
        $groupedItems = $items->groupBy(function ($item) {
            return $item->associatedModel->category_id;
        });
        $sortedCategories = $groupedItems->sortBy(function ($items, $categoryId) {
            return $categoryId;
        });
        // Set params
        $mid = '123123456';
        $store_name = 'NZ';
        $store_address = 'Mart Address';
        $store_phone = '1234567890';
        $store_email = 'yourmart@email.com';
        $store_website = 'yourmart.com';
        $tax_percentage = 10;
        $transaction_id = 'TX123ABC456';
        $currency = 'Rp';
        $image_path = 'logo.png';

        $totalAmount = 0;
        foreach ($sortedCategories as $categoryId => $items) {


            $printer = new ReceiptPrinter;
            $printer->init(
                config('receiptprinter.connector_type'),
                config('receiptprinter.connector_descriptor')
            );

            // Set store info
            $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

            // Print items in the category
            foreach ($items as $item) {

                $printer->addItem(
                    $item['name'],
                    $item['quantity'],
                    $item['price']
                );
            }
            $printer->printReceipt();
        }

        return redirect()->back();
    }

    // public function KotPrint(Request $request, $id)
    // {
    //     $items = \Cart::session($id)->getContent();
    //     $groupedItems = $items->groupBy(function ($item) {
    //         return $item->associatedModel->category_id;
    //     });
    //     $sortedCategories = $groupedItems->sortBy(function ($items, $categoryId) {
    //         return $categoryId;
    //     });

    //     $totalAmount = 0;

    //     // Initialize the printer
    //     $printer = printer_open('Your_Printer_Name'); // Replace 'Your_Printer_Name' with the actual name of your printer

    //     if ($printer) {
    //         // Print receipt header
    //         printer_start_doc($printer, "Receipt");
    //         printer_start_page($printer);

    //         printer_set_option($printer, PRINTER_MODE, "RAW");

    //         // Print receipt content
    //         printer_write($printer, "Receipt\n");
    //         printer_write($printer, "--------\n");

    //         foreach ($sortedCategories as $categoryId => $items) {
    //             // Print category header
    //             printer_write($printer, "Category: $categoryId\n");

    //             // Print items in the category
    //             foreach ($items as $item) {
    //                 $itemName = $item->name;
    //                 $itemPrice = $item->price;
    //                 $itemQuantity = $item->quantity;
    //                 $itemTotal = $itemPrice * $itemQuantity;

    //                 // Print item details
    //                 printer_write($printer, "- $itemName (Qty: $itemQuantity) - $itemTotal\n");

    //                 $totalAmount += $itemTotal;
    //             }

    //             printer_write($printer, "\n"); // Add a line break between categories
    //         }

    //         // Print total amount
    //         printer_write($printer, "Total: $totalAmount\n");

    //         // End the page and close the printer
    //         printer_end_page($printer);
    //         printer_end_doc($printer);
    //         printer_close($printer);
    //     } else {
    //         echo "Failed to open the printer.";
    //     }
    // }

    // use Dompdf\Dompdf;
    // use Illuminate\Http\Request;

    // method 4
    // public function KotPrint(Request $request, $id)
    // {
    //     $items = \Cart::session($id)->getContent();

    //     // Group items by category
    //     $groupedItems = $items->groupBy(function ($item) {
    //         return $item->associatedModel->category_id;
    //     });

    //     // Sort categories by their IDs
    //     $sortedCategories = $groupedItems->sortBy(function ($items, $categoryId) {
    //         return $categoryId;
    //     });

    //     // Read the KOT template HTML file
    //     $template = file_get_contents('C:\xampp\htdocs\restrauntmanagment\resources\views\admin\pages\printkot.html');

    //     // Create a new Dompdf instance
    //     $dompdf = new Dompdf();

    //     // Loop over categories
    //     foreach ($sortedCategories as $categoryId => $items) {
    //         // Print category header
    //         $itemList = "<div class='category'>Category: $categoryId</div>";

    //         // Print items in the category
    //         foreach ($items as $item) {
    //             $itemName = $item->name;
    //             $itemQuantity = $item->quantity;
    //             $itemInstructions = $item->attributes['instruction'];

    //             $itemHtml = "<div class='item'>
    //             <span class='name'>$itemName</span>
    //             <span class='quantity'>Qty: $itemQuantity</span>
    //             <span class='instructions'>Instructions: $itemInstructions</span>
    //         </div>";
    //             $itemList .= $itemHtml;
    //         }

    //         // Replace the item placeholder in the template with the generated item list
    //         $template = str_replace('<!-- Item details will be populated here -->', $itemList, $template);
    //     }

    //     // Load the HTML template
    //     $dompdf->loadHtml($template);

    //     // (Optional) Set the paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the PDF content
    //     $pdfContent = $dompdf->output();

    //     // Save the PDF file
    //     file_put_contents('kot_receipt.pdf', $pdfContent);

    //     // Print the PDF file
    //     exec('lp kot_receipt.pdf');
    // }

    // method 5

    // public function KotPrint(Request $request, $id)
    // {
    //     $items = \Cart::session($id)->getContent();

    //     // Group items by category
    //     $groupedItems = $items->groupBy(function ($item) {
    //         return $item->associatedModel->category_id;
    //     });

    //     // Sort categories by their IDs
    //     $sortedCategories = $groupedItems->sortBy(function ($items, $categoryId) {
    //         return $categoryId;
    //     });

    //     // Read the KOT template HTML file
    //     $template = view('admin.pages.printkot')->render();


    //     // Create a new Dompdf instance
    //     $dompdf = new Dompdf();

    //     // Loop over categories
    //     foreach ($sortedCategories as $categoryId => $items) {
    //         // Print category header
    //         $itemList = "<div class='category'>Category: $categoryId</div>";

    //         // Print items in the category
    //         foreach ($items as $item) {
    //             $itemName = $item->name;
    //             $itemQuantity = $item->quantity;
    //             $itemInstructions = $item->attributes['instruction'];

    //             $itemHtml = "<div class='item'>
    //                 <span class='name'>$itemName</span>
    //                 <span class='quantity'>Qty: $itemQuantity</span>
    //                 <span class='instructions'>Instructions: $itemInstructions</span>
    //             </div>";
    //             $itemList .= $itemHtml;
    //         }

    //         // Replace the item placeholder in the template with the generated item list
    //         $template = str_replace('<!-- Item details will be populated here -->', $itemList, $template);
    //     }

    //     // Load the HTML template
    //     $dompdf->loadHtml($template);

    //     // (Optional) Set the paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the PDF content
    //     $pdfContent = $dompdf->output();

    //     // Provide the PDF as a response to display in the browser
    //     return response($pdfContent, 200, [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename="kot_receipt.pdf"',
    //     ]);
    // }

    public function savesession(Request $request)
    {
        $pageId = $request->pageId;
        $text = $request->text;

        // Save the session data
        Session::put('pages.' . $pageId, $text);

        // Return a success response
        return response()->json(['success' => session('pages.' . $pageId)]);
    }
}
