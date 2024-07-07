<?php

namespace App\Http\Controllers;

use App\Models\StaffRole;
use Illuminate\Http\Request;

class StaffRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = StaffRole::get();
        return view('admin.pages.staffroles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.addstaffrole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "role" => "required"
        ]);

        $role = new StaffRole();
        $role->role = $request->role;
        $role->save();

        return redirect('staffrole')->with('success','Staff Role Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StaffRole::find($id);
        return view('admin.pages.viewstaffrole', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StaffRole::find($id);
        return view('admin.pages.editstaffrole', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "role" => "required"
        ]);

        $role = StaffRole::find($id);
        $role->role = $request->role;
        $role->update();

        return redirect('staffrole')->with('success','Staff Role Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StaffRole::find($id)->delete();
        return redirect('staffrole')->with('success','Staff Role Deleted.');
    }
}
