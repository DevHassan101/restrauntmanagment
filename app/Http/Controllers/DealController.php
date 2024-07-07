<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\DealItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::get();
        return view('admin.pages.deals', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view('admin.pages.adddeal', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "discount_percentage" => "required",
            "quantity" => "required"
        ]);

        $total = 0;
        $countt = 0;
        foreach ($request->product as $product) {
            $p = Product::find($product);
            $q = $request->quantity[$countt];
            $total += ($p->price * $q);
        }

        $deal = new Deal();
        $deal->name = $request->name;
        $deal->originalprice = $total;
        $deal->dealprice = $total - (($request->discount_percentage / 100) * $total);
        $deal->discount_percentage = $request->discount_percentage;
        $deal->personcaneat = $request->personcaneat;
        $deal->save();

        $count = 0;
        foreach ($request->product as $product) {
            $dealitem = new DealItem();
            $dealitem->deal_id = $deal->id;
            $dealitem->product_id = $product;
            $dealitem->quantity = $request->quantity[$count];
            $dealitem->save();
            $count++;
        }

        return redirect('deal')->with('success', 'Deal Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Deal::find($id);
        $dataitems = DealItem::join('products', 'products.id', '=', 'deal_items.product_id')
            ->select('deal_items.*', 'products.name as product', 'products.price as price')
            ->where('deal_id', '=', $id)->get();

        return view('admin.pages.viewdeal', compact('data', 'dataitems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Deal::find($id);
        $dataitems = DealItem::where('deal_id', '=', $id)->get();
        $products = Product::get();
        $products2 = Product::leftJoin('deal_items', function ($join) use ($id) {
            $join->on('products.id', '=', 'deal_items.product_id')
                ->where('deal_items.deal_id', '=', $id);
        })
            ->whereNull('deal_items.product_id')
            ->select("products.*")
            ->get();


        return view('admin.pages.editdeal', compact('data', 'dataitems', 'products', 'products2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "discount_percentage" => "required",
            "quantity" => "required"
        ]);

        // $total = 0;
        // foreach ($request->product as $product) {
        //     $p = Product::find($product);
        //     $total += $p->price;
        // }

        // $deal = Deal::find($id);
        // $deal->name = $request->name;
        // $deal->originalprice = $total;
        // $deal->dealprice = $total - (($request->discount_percentage / $total) * 100);
        // $deal->discount_percentage = $request->discount_percentage;
        // $deal->personcaneat = $request->personcaneat;
        // $deal->update();

        $total = 0;
        $countt = 0;
        foreach ($request->product as $product) {
            $p = Product::find($product);
            $q = $request->quantity[$countt];
            $total += ($p->price * $q);
        }

        $deal = Deal::find($id);
        $deal->name = $request->name;
        $deal->originalprice = $total;
        $deal->dealprice = $total - (($request->discount_percentage / 100) * $total);
        $deal->discount_percentage = $request->discount_percentage;
        $deal->personcaneat = $request->personcaneat;
        $deal->update();

        $count = 0;
        foreach ($request->product as $product) {
            if ($request->dealitem[$count] != 0) {
                $dealitem = DealItem::find($request->dealitem[$count]);
                $dealitem->product_id = $product;
                $dealitem->quantity = $request->quantity[$count];
                $dealitem->save();
            } else {
                $dealitem = new DealItem();
                $dealitem->product_id = $product;
                $dealitem->deal_id = $id;
                $dealitem->quantity = $request->quantity[$count];
                $dealitem->save();
            }



            $count++;
        }

        return redirect('deal')->with('success', 'Deal Added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Deal::find($id)->delete();

        return redirect('deal')->with('success', 'Deal Deleted');
    }

    public function DeleteItem(Request $request)
    {
        $id =  $request->id;
        $dealitem = DealItem::find($id);
        $product = Product::find($dealitem->product_id);
        $deal = Deal::find($dealitem->deal_id);
        $originalprice = $deal->originalprice - ($product->price * $dealitem->quantity);
        $deal->originalprice = $originalprice;
        // $dealprice = $deal->dealprice;
        // 12 / 1200 * 100
        $deal->dealprice = (($deal->discount_percentage / 100) * $originalprice);
        $deal->update();

        $dealitem->delete();

        return redirect()->back();
    }
}
