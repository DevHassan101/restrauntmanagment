<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::get();
        return view('admin.pages.discounts', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.adddiscount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "percentage" => "required"
        ]);
        Discount::create($request->all());

        return redirect('discount')->with('success', 'Discount Added.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Discount::find($id);
        return view('admin.pages.viewdiscount', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Discount::find($id);
        return view('admin.pages.editdiscount', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "percentage" => "required"
        ]);
        Discount::find($id)->update($request->all());
        return redirect('discount')->with('success', 'Discount Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Discount::find($id)->delete();
        return redirect('discount')->with('success', 'Discount Deleted.');
    }
}
