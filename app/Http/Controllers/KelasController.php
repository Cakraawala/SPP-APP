<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        // dd(auth()->user()->level);
        $kelas = Kelas::orderBy('id', 'asc')->get();
        return view('dashboard.kelas.index', compact('kelas'));
    }

    public function store(Request $request){
        $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required',
            'no' => 'required'
        ]);
        Kelas::create([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'no' => $request->no,
        ]);
        Alert::success('Success', 'Data Kelas berhasil Ditambahkan');
        return redirect('/dashboard/data/kelas');
    }
    public function show($id){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $kelas = Kelas::findOrFail($id);
        $man = Siswa::where('id_kelas', $id)->where('jk', 'L')->count();
        $woman = Siswa::where('id_kelas', $id)->where('jk', 'P')->count();
        // dd($man);
        $siswa = $kelas->Siswa->all();
        // dd($siswa);
        return view('dashboard.kelas.show', compact('kelas','siswa','man','woman'));
    }
    public function edit($id){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $kelas = Kelas::FindOrFail($id);
        return view('dashboard.kelas.edit', compact('kelas'));
    }
    public function postedit(Request $request, $id){
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        Alert::success('Success', 'Data Berhasil Diedit');
        return redirect('/dashboard/data/kelas');
    }

    public function destroy($id){
    $kelas = Kelas::findOrFail($id);
    $kelas->delete();
    Alert::success('Success', 'Data Berhasil Dihapus');
    return back();
    }
}
