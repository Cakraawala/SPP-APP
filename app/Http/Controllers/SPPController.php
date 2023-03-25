<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SPPController extends Controller
{
    public function index(){
        $spp = SPP::orderby('id','desc')->get();
        return view('dashboard.spp.index', compact('spp'));
    }

    public function store(Request $request){
        $request->validate([
            'tahun_ajaran' => 'required',
            'nominal' => 'required',
        ]);
        SPP::create($request->all());
        Alert::success('Success', 'Data Berhasil di tambahkan');
        return redirect('/dashboard/data/spp');
    }

    public function edit($id){
        $spp = SPP::findOrFail($id);
        return view('dashboard.spp.edit', compact('spp'));
    }

    public function update($id,Request $request){
        $spp = SPP::findOrFail($id);
        $request->validate([
            'tahun_ajaran' => 'nullable',
            'nominal' => 'nullable'
        ]);
        $spp->update($request->all());
        Alert::success('Success', 'Data berhasil di update');
        return redirect('/dashboard/data/spp');
    }

    public function destroy($id){
        // dd($id);/
        $spp = SPP::findOrFail($id);
        $spp->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return back();
    }
}
