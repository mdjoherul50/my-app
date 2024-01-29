<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view('auth.dashboard', compact('user'));
    }
    
    public function register(){
        if(auth()->check()){
            return redirect('/dashboard');
        }

        return view('auth.register');
    }

    public function login(){
        if(auth()->check()){
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    public function store(Request $request){
        //Blade page input validation 1 way with laravel built in message
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);  
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.authentication')->with('success', 'Account Create Successfully');
    }

    public function authentication(Request $request){
        //Blade page input validation 2nd way with custom message
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Please type your correct mail!',
            'password.required' => 'Please type your correct password!',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Credentials does not match!',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        //auth()->logout();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
