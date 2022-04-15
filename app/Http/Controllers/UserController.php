<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except([Auth::id()]);
        return view('admin.users.manage', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.add', compact('roles'));
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
            'email' => 'email|required',
        ]);

        if($validator->fails())
        {
            return back()->with('message', $validator->errors()->first());
        }
            // $newPassword = Str::random(8);
            $newPassword = '123456789';    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_email_verified = '1';
            $user->password = Hash::make($newPassword);
            $user->save();
            if($user){
                $user->assignRole($request->role);
                return redirect()->route('users')->with("message","User is created.");
            }else{
                return redirect()->route('users')->with("message","User is not created.");
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
        $user = User::find($id);
        return view('admin.users.update', compact('user'));
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
            'email' => 'email|required'
        ]);

        if($validator->fails())
        {
            return back()->with('message', $validator->errors()->first());
        }
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            if($user){
                $user->assignRole($request->role);
                return redirect()->route('users')->with("message","User is created.");
            }else{
                return redirect()->route('users')->with("message","User is not created.");
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users')->with('message', 'User is deleted');
    }

    public function haspermissions($id){
        $user = User::findOrFail($id);
        if($user){
           $userPermissions = $user->getAllPermissions(); 
            $permissions = Permission::all();
        return view('admin.users.haspermissions', compact('user','permissions', 'userPermissions' ));
        }
        else{
            return back()->with('message', 'Something went wrong');
        }
    }


    public function haspermissionsupdate(Request $request){
        // dd($request->user_id);
        $user = User::findOrFail($request->user_id);
        $user->syncPermissions();
        foreach($request->UserPermissionIDs as $UserPermissionID){
            $user->givePermissionTo($UserPermissionID);
        }
        return redirect()->route('users')->with("message","User Permission updated successfully");
    }

    public function UserProfile(){
        $userprofile = User::find(auth()->user()->id);
        //  dd($userprofile->email);   
        return view('admin.profiles.userprofile', compact('userprofile'));

    }

    public function UpdateProfile(Request $request){
           $user_id = Auth::user()->id;
        
           $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,'.$user_id,
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    if($user){
        return redirect()->route('userprofile')->with('message','User profile is updated successfully');
        }
        else{
            return redirect()->route('userprofile')->with('message','User profile is not updated due to a reason');
        } 
    }
public function editpassword(){
    return view('admin.profiles.updatepassword');
}

public function updatepassword(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'password' => 'required|max:255',
        'new_password' => 'required|required_with:confirm_new_password|same:confirm_new_password',
        'confirm_new_password' => 'required',
    ]);
    
    if($validator->fails()){
        return back()->with("message",$validator->errors()->first());
    }
    
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error','Your current Password is invalid');
        }
        $updated = $user->update([
            'password'=> Hash::make($request->new_password)
        ]);
        
        if($updated){
            return back()->with('message','User Password has been updated');
        }else{
            return back()->with('message','Password not updated due to some error. Please try again');
        }
}




}
