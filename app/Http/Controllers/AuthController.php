<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;



class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:assessi')->except('logout');
        $this->middleware('guest:assessor')->except('logout');
    }
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function postLogin(Request $request)
    {
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        } elseif (Auth::guard('assessi')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('beranda');
        } elseif (Auth::guard('assessor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('assessor');
        }
        return redirect('/login')->with('loginError', 'akun tidak valid');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }

   
}
