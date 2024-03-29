<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $user = User::orderby('nama', 'asc')->where('is_admin', 1)->where('level', 'petugas')->get();
        return view('dashboard.user.index', compact('user'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
            'level' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'level' => $request->level
        ]);
        Alert::success('Success', 'Data Berhasil Dibuat!');
        return redirect('/dashboard/user');
    }

    public function edit($id){
        if(auth()->guest()){
            return redirect('/');
        }
        if(auth()->user()->is_admin == 0 or auth()->user()->level == "petugas"){
            abort(404);
        }
        $user = User::findOrFail($id);
        return view('dashboard.user.edit', compact('user'));
    }
    public function post(request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'nullable',
            'nama' => 'nullable',
            'password' => 'nullable',
            'is_admin' => 'nullable',
            'level' => 'nullable'
        ]);
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'level' => $request->level
        ]);
        Alert::success('Success', 'Data Berhasil DiUpdate!');
        return redirect('/dashboard/user');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect('/dashboard/user');
    }
}
