<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index(){
        $pay = Pembayaran::get();
        $siswa = Siswa::orderBy('id_kelas', 'asc')->get();
        $now = Carbon::now()->isoformat('Y-MM-D');
        return view('dashboard.pembayaran.index',compact('pay', 'siswa','now'));
    }

    public function store(Request $request){
        $request->validate([
            'siswa'=> 'required',
            'id_admin' => 'required',
            'tanggal_pembayaran' => 'required',
            'tahun_pembayaran' => 'required',
            'bulan_pembayaran' => 'required',
            'jumlah_bayar' => 'required',
        ]);
        $spp = SPP::where('tahun_ajaran', $request->tahun_pembayaran)->first();
        $now = Carbon::now()->isoformat('Y-MM-D');
        // dd($request->all());
    // validasi siswa,bulan null / 0
        if($request->siswa === 0 or $request->bulan_pembayaran === 0){
            Alert::error('Warning!', 'Data tidak boleh kosong');
            return redirect('/dashboard/pembayaran');
        }

    // validasi nominal dibawah 100.000
        if($request->jumlah_bayar < 100000){
            Alert::error('Warning!', 'Nominal tidak boleh dibawah Rp. 100.000');
            return redirect('/dashboard/pembayaran');
        }

    // validasi tanggal tidak boleh melebihi tanggal sekarang
        if($request->tanggal_pembayaran > $now){
       Alert::error('Warning!', 'Tanggal tidak boleh melebihi hari ini!');
       return redirect('/dashboard/pembayaran');}

    // validasi pembayaran yg udah di bulan tersebut
        $bulan = [];
        $cekbulan = Pembayaran::where('tahun_pembayaran', $request->tahun_pembayaran)->where('id_siswa', $request->siswa)->get();
        foreach($cekbulan as $cb){
            $bulan[] = $cb->bulan_pembayaran;
        }
        if(in_array($request->bulan_pembayaran, $bulan)){
            Alert::error('Warning!', 'Pembayar sudah melunasi di bulan tersebut');
            return redirect('/dashboard/pembayaran');
        }

    // validasi pembayaran yang sudah lunas
       $bayarcek = Pembayaran::where('id_siswa', $request->siswa)->get();
       $totalcek = 0;
       foreach($bayarcek as $b){
        $totalcek += $b->jumlah_bayar;
       }
       if($totalcek >= $spp->nominal){
        Alert::error('Warning!', 'Pembayar sudah melunasi biaya SPP');
        return redirect('/dashboard/pembayaran');
       }
       $first = Pembayaran::first();
       $last = Pembayaran::orderby('id','desc')->first();
       if($first == null){
        $invoice = "001";
       }else{
           $invoice = strval($last->invoice + "1");
        //    dd($invoice);
       }
        Pembayaran::create([
            'id_siswa' => $request->siswa,
            'id_admin' => $request->id_admin,
            'id_spp' => $spp->id,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bulan_pembayaran' => $request->bulan_pembayaran,
            'tahun_pembayaran' => $request->tahun_pembayaran,
            'tanggal_bayar' => $request->tanggal_pembayaran,
            'invoice' => "00".$invoice
        ]);
        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect('/dashboard/pembayaran');
    }

    public function show($id){
        $p = Pembayaran::where('id',$id)->first();
        $siswabayar = Pembayaran::where('id_siswa', $p->Siswa->id)->get();
        $kurang = 0;
        foreach($siswabayar as $pembayaran){
            $kurang += $pembayaran->jumlah_bayar;
        }
        $spp = SPP::where('id', $p->SPP->id)->first()->nominal;
        $sisa = $spp - $kurang;
        return view('dashboard.pembayaran.show', compact('p', 'sisa', 'spp'));
    }

    public function invoice($id){
        $p = Pembayaran::findOrFail($id);
        $siswabayar = Pembayaran::where('id_siswa', $p->Siswa->id)->get();
        $kurang = 0;
        foreach($siswabayar as $pembayaran){
            $kurang += $pembayaran->jumlah_bayar;
        }
        $spp = SPP::where('id', $p->SPP->id)->first()->nominal;
        $sisa = $spp - $kurang;
        return view('dashboard.pembayaran.invoice',compact('p','sisa'));
    }
}
