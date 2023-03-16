<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index(){
        $kelas = Kelas::orderBy('id', 'desc')->get();
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
        $kelas = Kelas::findOrFail($id);
        $siswa = $kelas->Siswa->all();
        // dd($siswa);
        return view('dashboard.kelas.show', compact('kelas','siswa'));
    }
    public function edit($id){
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
