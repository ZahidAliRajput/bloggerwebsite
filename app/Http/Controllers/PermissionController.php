<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.manage', compact('permissions'));
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
            'name'=> 'required|max:191',
        ]);

        if($validator->fails())
        {
            return back()->with('message', $validator->errors()->first());
        }
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
            $permission->save();
            if($permission){
                return redirect()->route('permissions')->with("message","Permission is created.");
            }else{
                return redirect()->route('permissions')->with("message","Permission is not created.");
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
        $permission = Permission::find($id);
        return $permission;
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
            'name'=> 'required|max:191',
        ]);

        if($validator->fails())
        {
            return back()->with('message', $validator->errors()->first());
        }
            $permission = Permission::find($request->id);
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
            $permission->save();
            if($permission){
                return redirect()->route('permissions')->with("message","Permission is created.");
            }else{
                return redirect()->route('permissions')->with("message","Permission is not created.");
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
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permissions')->with('message', 'Permissions is deleted successfully');
    }
}
