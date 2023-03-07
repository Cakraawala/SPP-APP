<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function register(){
        return view('login.register');
    }

    public function authenticate(Request $request){
        dd($request->all());
    }
}
