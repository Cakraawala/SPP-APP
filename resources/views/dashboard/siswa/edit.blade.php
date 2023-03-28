@extends('layout.main')
@section('title')
<title>Dashboard | Edit siswa {{ $siswa->nama }}</title>
@endsection
@section('content')
<div class="row">
<!-- Content Row -->
<div class="col-lg-12">
    <div class="container">
    <div class="card border-0 shadow-sm">
            <div class="card-header">
            <h4>Edit Siswa </h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/data/siswa/{{ $siswa->id }}/update" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            <div class="col-md-4">
                            <label for="nama" class="form-label">Nama <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" placeholder="ex Jamal Kurniawan">
                            </div>
                            <div class="col-md-4">
                                <label for="nisn" class="form-label">NISN <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}" placeholder="ex Jamal30">
                            </div>
                            <div class="col-md-4">
                                <label for="tahun_ajaran" class="form-label">Tahun Ajaran <span style="font-style: italic;"></span></label>
                                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $siswa->tahun_ajaran }}" placeholder="2022">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select class="form-select" name="id_kelas" id="id_kelas">
                                @if ($siswa->Kelas->kelas !=null)
                                <option selected value="{{ $siswa->Kelas->id }}">{{ $siswa->Kelas->kelas }} {{ $siswa->Kelas->jurusan }} {{ $siswa->Kelas->no }}</option>
                                @foreach ($kelaskecuali as $k)
                                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->no }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="no_telp" class="form-label">Nomor Telpon <span style="font-style: italic;">(required)</span></label>
                            <input type="number" class="form-control" id="no_telp" name ='no_telp' value="{{ $siswa->no_telp }}" placeholder="ex 08123123123">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name ='alamat'  value="{{ $siswa->alamat }}" placeholder="ex Grand Kahuripan">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate" name ='birthdate' value="{{$siswa->birthdate}}">
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="jk" class="form-label">Jenis Kelamin </label>
                            <select class="form-select" name="jk" id="jk">
                                    {{-- <option> --}}
                                    @if ($siswa->jk == "?")
                                    <option selected value="?"> Pilih Jenis Kelamin </option>
                                    <option value="L">Pria</option>
                                    <option value="P">Wanita</option>
                                    @elseif ($siswa->jk == 'L')
                                    <option  value="?"> Pilih Jenis Kelamin </option>
                                    <option selected value="L">Pria</option>
                                    <option  value="P">Wanita</option>
                                    @else
                                    <option  value="?"> Pilih Jenis Kelamin </option>
                                    <option value="L">Pria</option>
                                    <option selected value="P">Wanita</option>
                                    @endif






                                    {{-- </option> --}}
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name ='username' value="{{$siswa->User->username}}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="password" class="form-label">New Password</label>
                                <input type="text" class="form-control" id="password" name ='password' placeholder="New Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mt-2">
                            <label for="is_admin" class="form-label">Status</label>
                            <select class="form-select" name="is_admin" id="is_admin">
                                <option selected value="0">Siswa </option>
                                @if (Auth()->user()->is_admin == 1 and Auth()->user()->id == 1)
                                <option value="1">Admin</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                </form>
            </div>
        </div>
</div>
</div>
</div>
@endsection
