<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\HTTP\Request;
use App\Models\Profile\User;

class UserController extends Controller {
 
    
/* user sign up and login functions */    
    
    public function getSignin(){
        
        return view('users.signin');
    }
    
    public function getSignup(){
        
        return view('users.signup');
    }
    
    
    public function postSignin(Request $request){
        
        $this->validate($request,[
        'email'=>'required', 
        'password'=>'required',     
        ]);
        
        if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
        return redirect()->back()->with('info','could not sign you in with those details.');    
        }
            
        return redirect()->route('login.recents')
            ->with('info','You are now signed in.');    
        
    }
    
    public function postSignup(Request $request){
        
        $this->validate($request,[
        'name'=>'required|min:6', 
        'email'=>'required|email|max:255|unique:users', 
        'password'=>'required|min:6',     
        ]);
        
        User::create([
        'name'  => $request->input('name'),  
        'email' => $request->input('email'),    
        'password' => bcrypt($request->input('password')),    
        ]);
        
        return redirect()->route('users.signin')
            ->with('info','Your account has been created and you can now sign in.');
    }
    
    public function getSignout(){
        
        Auth::logout();
        
        return redirect()->route('home')->with('info','You are now signed out.');
    }
    
    
    
    
    
}

