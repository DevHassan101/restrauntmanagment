<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::join('staff_roles', 'staff_roles.id', '=', 'staff.role_id')
        ->select('staff.*','staff_roles.role')->get();
        return view('admin.pages.staffs', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = StaffRole::get();
        return view('admin.pages.addstaff', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "role" => "required",
            "name" => "required"
        ]);

        $role = new Staff();
        $role->name = $request->name;
        $role->role_id = $request->role;
        $role->save();

        return redirect('staff')->with('success', 'Staff Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Staff::join('staff_roles', 'staff_roles.id', '=', 'staff.role_id')
        ->select('staff.*','staff_roles.role')->find($id);
        return view('admin.pages.viewstaff', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Staff::find($id);
        return view('admin.pages.editstaff', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "role" => "required",
            "name" => "required"
        ]);

        $role = Staff::find($id);
        $role->name = $request->name;
        $role->role_id = $request->role;
        $role->update();

        return redirect('staff')->with('success', 'Staff Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::find($id)->delete();
        return redirect('staff')->with('success', 'Staff Deleted.');
    }
}
