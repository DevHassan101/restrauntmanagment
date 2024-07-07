<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $taxes = Tax::get();
        return view('admin.pages.taxes', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.addtax');
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
        Tax::create($request->all());

        return redirect('tax')->with('success', 'Tax Added.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tax::find($id);
        return view('admin.pages.viewtax', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tax::find($id);
        return view('admin.pages.edittax', compact('data'));
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
        Tax::find($id)->update($request->all());
        return redirect('tax')->with('success', 'Tax Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tax::find($id)->delete();
        return redirect('tax')->with('success', 'Tax Deleted.');
    }

    public function changeStatus($id, $status)
    {
        if ($status == 1) {
            $tax = Tax::where('status','=',1)->count();
            if ($tax > 0) {
                return redirect('tax')->with('failed', 'One Tax is applyable at one time');
            }
        }
        $tax=Tax::find($id);
        $tax->status = $status;
        $tax->update();
        return redirect('tax')->with('success', 'Tax Status Updated.');
    }
}
