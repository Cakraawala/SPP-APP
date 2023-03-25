<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
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
    public function report(Request $request){
        if($request->bulan != 0){
            $p = Pembayaran::where('bulan_pembayaran', $request->bulan)->get();
            $bulan = $request->bulan;
            $total = $p->count();
            // dd($total);
        // }elseif($request->bulan == 0){
        //     $p = Pembayaran::get();
        //     $bulan = null;
        //     $total = $p->count();
            // return redirect('/dashboard/laporan');
        } else{
            $p = Pembayaran::get();
            $bulan = null;
            $total = $p->count();
        }
        return view('dashboard.report', compact('p', 'bulan','total'));
    }
}
