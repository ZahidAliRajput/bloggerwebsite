<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.manage', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return back()->with('message', $validator->errors()->first());
        }
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();
        if ($role) {
            return redirect()->route('roles')->with("message", "Role is created.");
        } else {
            return redirect()->route('roles')->with("message", "Role is not created.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return $role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return back()->with('message', $validator->errors()->first());
        }
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->update();
        if ($role) {
            return redirect()->route('roles')->with("message", "Role is Updated.");
        } else {
            return redirect()->route('roles')->with("message", "Role is not Updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles')->with('message', 'Role is deleted');
    }

    public function haspermissions($id)
    {
        $role = Role::findOrFail($id);
        if ($role) {
            $permissions = Permission::all();
            $rolepermissions = $role->getAllPermissions();
            return view('admin.roles.haspermissions', compact('permissions', 'role', 'rolepermissions'));
        }
    }

    public function haspermissionsupdate(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->syncPermissions();
        foreach($request->RolePermissionIds as $RolePermissionId){
            $role->givePermissionTo($RolePermissionId);
        }
        return redirect()->route('roles')->with("message","Role Permission updated successfully");
    }
}
