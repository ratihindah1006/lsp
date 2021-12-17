<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('auth.login',[
            'title'=> 'Login',
        ]);
    }
    
    public function postLogin(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
        //dd($request->all());
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended('dashboard');
          
        }
        elseif (Auth::guard('assessi')->attempt($credentials)){
            return redirect()->intended('beranda'); 
        }
        elseif (Auth::guard('assessor')->attempt($credentials)){
            return redirect()->intended('beranda');  
        }
        return redirect('/login');
    }
  
    public function logout(Request $request){
        Auth::logoutOtherDevices($request);

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect('login');
    }
}