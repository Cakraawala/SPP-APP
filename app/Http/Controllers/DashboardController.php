<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
            $rpl = Kelas::where('jurusan', 'rpl')->get();
            $tkjcount = 0;
            $rplcount = 0;
            $mmcount = 0;
            $total = 0;
            foreach($rpl as $r){
                $rplcount += $r->Siswa->count();
            }
            $mm = Kelas::where('jurusan', 'mm')->get();
            foreach($mm as $m){
                $mmcount += $m->Siswa->count();
            }
            $tkj = Kelas::where('jurusan', 'tkj')->get();
            foreach($tkj as $t){
                $tkjcount += $t->Siswa->count();
            }
            $tcount = Pembayaran::count();
            $pembayaran = Pembayaran::get();
            foreach($pembayaran as $p){
                $total += $p->jumlah_bayar;
            }
            return view('index', compact('tkjcount', 'rplcount', 'mmcount','tcount','total'));
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
       if(auth()->user()->level == "admin"){
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
        } else{
            $p = Pembayaran::get();
            $bulan = null;
            $total = $p->count();
        }
        $pendapatan = 0;
        foreach($p as $pp){
            $pendapatan += $pp->jumlah_bayar;
        }
        return view('dashboard.report', compact('p', 'bulan','total','pendapatan'));
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
