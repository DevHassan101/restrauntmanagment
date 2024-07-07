<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::get();
        return view('admin.pages.floors', compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.addfloor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "floor" => "required"
        ]);
        $floor = new Floor();
        $floor->name  =  $request->floor;
        $floor->save();

        return redirect('floor')->with('success', 'Floor Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Floor::find($id);
        return view('admin.pages.viewfloor', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Floor::find($id);
        return view('admin.pages.editfloor', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "floor" => "required"
        ]);
        $floor = Floor::find($id);
        $floor->name  =  $request->floor;
        $floor->update();

        return redirect('floor')->with('success', 'Floor Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Floor::find($id)->delete();
        return redirect('floor')->with('success', 'Floor Deleted.');
    }
}
