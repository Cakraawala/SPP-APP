<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function register(){
        return view('login.register');
    }

    public function authenticate(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:4'
        ]);
        $remember = $request->has('remember') ? true : false;
        $minutes = 1440;
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember)){
            if($request->has('remember')){
                Cookie::queue('username', $request->username, $minutes);
                Cookie::queue('password', $request->password, $minutes);}
            Alert::success('Success', 'Login berhasil');
            return redirect()->intended('/dashboard');
        }
        Alert::error('Error', 'Gagal');
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::Success('Success', 'Berhasil Logout');
        return redirect('/');
    }
}
