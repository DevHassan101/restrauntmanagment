<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::join('floors','floors.id','=','tables.floor_id')->select('tables.*','floors.name as floor')->get();
        return view('admin.pages.tables', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $floors = Floor::get();
        return view('admin.pages.addtable', compact('floors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "table.*" => "required",
            "floor.*" => "required",
            "capacity.*" => "required"
        ]);

        $count = 0;
        foreach ($request->input('table') as $tablee) {
            $table = new Table();
            $table->table = $tablee;
            $table->floor_id = $request->floor[$count];
            $table->capacity = $request->capacity[$count];
            $table->save();

            $count++;
        }
        return redirect('table')->with('success', 'Tables Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Table::find($id);
        return view('admin.pages.viewtable', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Table::find($id);
        $floors = Floor::get();
        return view('admin.pages.edittable', compact('data','floors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "table" => "required",
            "floor" => "required",
            "capacity" => "required"
        ]);

        $table = Table::find($id);
        $table->table = $request->table;
        $table->floor_id = $request->floor;
        $table->capacity = $request->capacity;
        $table->update();

        return redirect('table')->with('success', 'Table Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Table::find($id)->delete();
        return redirect('table')->with('success', 'Table Deleted.');
    }
}
