<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $kelas = Kelas::get();
        $siswa = Siswa::orderBy('nama','asc')->orderBy('id_kelas','asc')->get();
        $siswalast = Siswa::orderBy('id', 'desc')->first();
        $username = $siswalast->User->username;
        $usernameafter = $username[5].$username[6].$username[7].$username[8].$username[9] + 1;
        // dd($usernameafter);
        return view('dashboard.siswa.index', compact('kelas','siswa' ,'usernameafter'));
    }

    public function show($id){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
       $siswa = Siswa::findOrFail($id);
       $p = Pembayaran::where('id_siswa' , $id)->get();
       $now = Carbon::now()->isoformat('Y');
       $skrg = Carbon::now()->isoFormat('M');
       $kurang = 0;
       foreach($p as $pembayaran){
           $kurang += $pembayaran->jumlah_bayar;
       }
       $spp =SPP::where('tahun_ajaran', $now)->first()->nominal;
       $harusdibayar = $spp/12* $skrg;
    //    dd($harusdibayar*$skrg);
       $sisa = $spp - $kurang;
       return view('dashboard.siswa.show', compact('siswa', 'spp','sisa', 'kurang', 'harusdibayar'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'id_kelas' => 'nullable',
            'telp' => 'nullable',
            'birthdate' => 'nullable',
            'tahun_ajaran' => 'nullable',
            'jk' => 'nullable',
            'alamat' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->username,
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'id_kelas' => $request->id_kelas,
            'no_telp' => $request->telp,
            'birthdate' => $request->birthdate,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect('/dashboard/data/siswa');
    }

    public function edit($id){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $kelas = Kelas::get();
        $siswa = Siswa::findOrFail($id);
            $kelaskecuali = Kelas::wherenotin('id', [$siswa->Kelas->id])->get();
        // }
        return view('dashboard.siswa.edit', compact('siswa', 'kelas','kelaskecuali'));
    }

    public function postedit(Request $request){
        $siswa = Siswa::findOrFail($request->id);
        // dd($request->all());
        $siswa->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'id_kelas' => $request->id_kelas,
            'no_telp' => $request->no_telp,
            'birthdate' => $request->birthdate,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'id_user' => $siswa->User->id,
        ]);
        $siswa->User->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->username,
            'is_admin' => $request->is_admin
        ]);
        Alert::success('Success','Data Berhasil di Edit');
        return redirect('/dashboard/data/siswa');
    }

    public function destroy($id){
        $siswa = Siswa::FindOrFail($id);
        $siswa->User->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return back();
    }
}
