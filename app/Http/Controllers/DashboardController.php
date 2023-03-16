<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 1){
            // abort(404);
            return view('index');
        } else {
            return view('welcome');
        }


    }
}
