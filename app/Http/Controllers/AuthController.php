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
        //dd($request->all());
        if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
            return redirect()->intended('dashboard');
          
        }
        elseif (Auth::guard('assessi')->attempt(['email'=>$request->email, 'password'=> $request->password])){
            return redirect()->intended('beranda'); 
        }
        elseif (Auth::guard('assessor')->attempt(['email'=>$request->email, 'password'=> $request->password])){
            return redirect()->intended('beranda');  
        }
        return redirect('/login');
    }
  
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}