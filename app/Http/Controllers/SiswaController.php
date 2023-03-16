<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $kelas = Kelas::get();
        $siswa = Siswa::orderBy('id_kelas','asc')->get();
        // dd($siswa);
        return view('dashboard.siswa.index', compact('kelas','siswa'));
    }

    public function show($id){
       $siswa = Siswa::findOrFail($id);
       return view('dashboard.siswa.show', compact('siswa'));
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
        if(auth()->user()->is_admin == 0){
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
        $siswa->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return back();
    }
}
