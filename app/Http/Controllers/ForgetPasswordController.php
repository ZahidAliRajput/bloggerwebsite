<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function forgetpassword(){
        return view('admin.forgetresetpassword.forgetpassword');
    }

    public function postforgetpassword(Request $request){
        $request->validate([
            'email' => 'required',
        ]);
        $token = base64_encode($request->email);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('admin.emails.forgetpasswordemail',['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Email for reset password');
        });

        return back()->with('message', 'Please check your email to reset your password');
    }

    public function showresetpasswordform($token){
        return view('admin.forgetresetpassword.resetpassword', ['token' => $token]);
    }
    public function postresetpassword(Request $request){
        $request->validate([
            'password' => 'min:6|required|same:confirmpassword',
            'confirmpassword' => 'min:6'
        ]);

        $updatepassword = DB::table('password_resets')->where([
            'token' => $request->token
        ]);
        if(!$updatepassword){
            return back()->with('message', 'Sorry Something went wrong, try again');
        }
        $email =  base64_decode($request->token);
        $user = User::where('email', $email)->update(['password' => Hash::make($request->password)]);
        if($user){
            DB::table('password_resets')->where(['email' => $email])->delete();
        }
        return redirect()->route('signin')->with('message', 'Your password is Reset, you can now login.');
    }






}
