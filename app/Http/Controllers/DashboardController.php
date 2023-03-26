<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use Carbon\Carbon;
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
            $siswa = Siswa::where('id', auth()->user()->Siswa->id)->first();
            $p = Pembayaran::where('id_siswa' , auth()->user()->Siswa->id)->get();
            $now = Carbon::now()->isoformat('Y');
            $kurang = 0;
            foreach($p as $pembayaran){
                $kurang += $pembayaran->jumlah_bayar;
            }
            $spp =SPP::where('tahun_ajaran', $now)->first()->nominal;
            $sisa = $spp - $kurang;
            return view('siswa.index', compact('siswa','kurang','sisa','spp'));
        }


    }
    public function report(Request $request){
       if(auth()->user()->is_admin == 1){

           if(auth()->guest()){
               return redirect('/');
            }
            if(auth()->user()->is_admin == 0){
            abort(404);
        }
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
    else{
        if($request->bulan != 0){
            $p = Pembayaran::where('bulan_pembayaran', $request->bulan)->where('id_siswa', auth()->user()->Siswa->id)->get();
            $bulan = $request->bulan;
            $total = $p->count();

        } else{
            $p = Pembayaran::where('id_siswa', auth()->user()->Siswa->id)->get();
            $bulan = null;
            $total = $p->count();
        }
        return view('dashboard.report', compact('p', 'bulan','total'));

    }
    }
}
