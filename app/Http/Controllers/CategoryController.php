<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.pages.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $imagePath = 'categoryimage/' . $name_gen;
            $resizeImage = Image::make($image)->resize(300, 200);
            $resizeImage->save($imagePath);
        } else {
            $name_gen = null;
        }

        $category = new Category();
        $category->name  =  $request->name;
        $category->image = $name_gen;
        $category->save();

        return redirect('category')->with('success', 'Category Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);
        return view('admin.pages.viewcategory', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::find($id);
        return view('admin.pages.editcategory', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        $category = Category::find($id);

        if ($request->file('image')) {
            if ($category->image) {
                unlink('categoryimage/' . $category->image);
            }

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            $imagePath = 'categoryimage/' . $name_gen;
            $resizeImage = Image::make($image)->resize(300, 200);
            $resizeImage->save($imagePath);


            $category->image = $name_gen;
        }

        $category->name  =  $request->name;
        $category->update();

        return redirect('category')->with('success', 'Category Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->image) {
            unlink('categoryimage/' . $category->image);
        }
        $category->delete();
        return redirect('category')->with('success', 'Category Deleted.');
    }
}
