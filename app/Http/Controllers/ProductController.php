<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category')->get();
        return view('admin.pages.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            'category' => 'required',
            'price' => 'required'
        ]);

        if ($request->file('image')) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $imagePath = 'productimage/' . $name_gen;
            $resizeImage = Image::make($image)->resize(300, 200);
            $resizeImage->save($imagePath);
        } else {
            $name_gen = null;
        }

        $product = new Product();
        $product->name  =  $request->name;
        $product->price  =  $request->price;
        $product->category_id  =  $request->category;
        $product->image = $name_gen;
        $product->save();

        return redirect('product')->with('success', 'Product Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category')->find($id);
        return view('admin.pages.viewproduct', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        $categories = Category::get();
        return view('admin.pages.editproduct', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            'category' => 'required',
            'price' => 'required'
        ]);
        $product = Product::find($id);

        if ($request->file('image')) {
            if ($product->image) {
                unlink('productimage/' . $product->image);
            }


            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $imagePath = 'productimage/' . $name_gen;
            $resizeImage = Image::make($image)->resize(300, 200);
            $resizeImage->save($imagePath);


            $product->image = $name_gen;
        }

        $product->price  =  $request->price;
        $product->name  =  $request->name;
        $product->category_id  =  $request->category;
        $product->update();

        return redirect('product')->with('success', 'Product Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product->image) {
            unlink('productimage/' . $product->image);
        }
        $product->delete();
        return redirect('product')->with('success', 'Product Deleted.');
    }
}
