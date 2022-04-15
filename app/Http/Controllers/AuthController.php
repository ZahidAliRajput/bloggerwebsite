<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(){
        $title = "Signup";
        return view('admin.auth.signup', compact('title'));
    }

    public function postsignup(Request $request)
    {
        //dd($request->password);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = $request->all();

        // dd($user); 
        // $createUser = $this->create($user);
        $createUser = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password'])
          ]);
          
          if($createUser)
          {
            $token = base64_encode($request->email);
            UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);
            Mail::send('admin.emails.userverifyemail', ['token' => $token],
             function($message) use($request)
             {
                 $message->to($request->email);
                 $message->subject('User Email Verification');
             });

             return redirect('signup')->with('message','Great, You are  registered, please check your email for verification.');
            }  

        //     Mail::send()

        //   }
    }
    // public function create(array $user)
    // {
    //   return User::create([
    //     'name' => $user['name'],
    //     'email' => $user['email'],
    //     'password' => Hash::make($user['password'])
    //   ]);
    // }
    public function signin(){
        $title = "Signin";
        return view('admin.auth.signin', compact('title'));
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function postsignin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard')->with('success','Welcome to dashboard, You are successfully Loged in.');
        }
        return redirect()->route('signin')->with('message', 'Sorry something went wrong, olease try again');
    }

    public function verifyAccount($token){
        $verifyUser = UserVerify::where('token', $token)->first();
        
        if(!$verifyUser)
        {
            $message = 'Sorry your email can not be identified';
            return back()->with('message', $message);
        }

        if(!is_null($verifyUser))
        {
            $user = $verifyUser->user;
            if(!$user->is_email_verified){
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = 'Your email is verified You can now login'; 
            }
            else{
                $message = 'Your email is already verified, You can now login'; 
            }
            return redirect('signin')->with('message', $message);
        }
    }
    public function signoff(){
        
        Auth::logout();
        return redirect()->route('signin');
    }


}
