<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    Public function login(){
        return view('auth.login');
    }
    Public function register(){
        return view('auth.register');
    }

    Public function save(request $request){
        //validate rquests
        $request->validate([
            'name'=>'required',
            'age' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'

        ]);
        //insert data into database
        $user = new User;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success','New user has been created successfully added to database');
        }else{
            return back()->with('fail','something went wrong, try again later');
        }
        



    }
    Public function check(request $request){
        
        //validate requests
        $validate = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'

        ]);

        $userinfo = User::where('email','=',$request->email)->first();
        if(!$userinfo){
                return redirect()->route('login')->with('fail','We do not recognize your email address');

            }else{
                //check password
                if(Auth::attempt($validate)){
                    $request->session()->regenerate();
                    return redirect()->route('poll')->with('Status','Logged In Successfully');
                }else{                
                return redirect()->route('login')->with('fail','Invalid Credentials');
            }
        }

    }
    public function logout(Request $request)
{

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
}
}
