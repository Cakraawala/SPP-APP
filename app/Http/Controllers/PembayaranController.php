<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(){
        $pay = Pembayaran::get();
        $siswa = Siswa::get();
        return view('dashboard.pembayaran.index',compact('pay', 'siswa'));
    }
}
