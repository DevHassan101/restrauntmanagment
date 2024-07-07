<?php

namespace App\Http\Controllers;

use App\Models\AssignTableToStaff;
use App\Models\Staff;
use App\Models\Table;
use Illuminate\Http\Request;

class AssignTableToStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stafftables = AssignTableToStaff::join('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
            ->join('tables', 'tables.id', '=', 'assign_table_to_staff.table_id')
            ->select('assign_table_to_staff.*', 'staff.name as staff', 'tables.table')
            ->get();

        return view('admin.pages.stafftables', compact('stafftables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staffs = Staff::where('role_id', '=', '1')->get();
        $tables = Table::whereNotIn('id', function ($query) {
            $query->select('table_id')
                ->from('assign_table_to_staff');
        })->get();
        
        return view('admin.pages.addstafftable', compact('staffs', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "staff" => "required",
            "table" => "required"
        ]);

        $role = new AssignTableToStaff();
        $role->staff_id = $request->staff;
        $role->table_id = $request->table;
        $role->save();

        return redirect('stafftable')->with('success', 'Assigned Table To Staff.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = AssignTableToStaff::join('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
            ->join('tables', 'tables.id', '=', 'assign_table_to_staff.table_id')
            ->select('assign_table_to_staff.*', 'staff.name as staff', 'tables.table')->find($id);
        return view('admin.pages.viewstaff', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = AssignTableToStaff::find($id);
        return view('admin.pages.editstaff', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "staff" => "required",
            "table" => "required"
        ]);

        $role = AssignTableToStaff::find($id);
        $role->staff_id = $request->staff;
        $role->table_id = $request->table;
        $role->update();

        return redirect('stafftable')->with('success', 'Update Assigned Table To Staff.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AssignTableToStaff::find($id)->delete();
        return redirect('stafftable')->with('success', 'Delete Assigned Table To Staff.');
    }
}
