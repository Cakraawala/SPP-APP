@extends('layout.main')
@section('title')
<title>Dashboard | Siswa Index</title>
@endsection
@section('content')

<!--- MODAL FORM CREATE -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Siswa</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/data/siswa/store" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                    <label for="nama">Nama</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="nisn" id="nisn" placeholder="nis">
                <label for="nisn">NISN</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select" name="id_kelas" id="id_kelas">
                        @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->no }}</option>
                        @endforeach
                    </select>
                    <label for="id_kelas">Kelas</label>
                    </div>
            </div>
           </div>

           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="telp" id="telp" placeholder="a">
                <label for="telp">No Telepon</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating  mb-3">
                    <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="a">
                    <label for="birthdate">Birthdate</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="tahun_ajaran" id="tahun_ajaran" placeholder="a" value="2023">
                <label for="tahun_ajaran">Tahun Ajaran</label>
                </div>
            </div>
           </div>
           <div class="row">
                <div class="col-md-4">
                    <div class="form-floating  mb-3">
                        <select class="form-select" name="jk" id="jk">
                            <option value="?" selected> Pilih Jenis Kelamin</option>
                            <option value="L"> Pria</option>
                            <option value="P"> Wanita</option>
                        </select>
                        <label for="jk">Jenis Kelamin</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-floating mb-3">
                        <input required class="form-control" type="text" name="alamat" id="alamat" placeholder="a">
                    <label for="alamat">Alamat</label>
                    </div>
                </div>
           </div>

            <hr>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-floating mb-3">
                        <input required class="form-control" type="text" name="username" id="username" placeholder="a">
                    <label for="username">Username</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating mb-3">
                        <input required placeholder="a" class="form-control" type="password" name="password" id="password">
                    <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="is_admin" id="is_admin">
                            <option value="0" selected>Siswa</option>
                            @if (Auth()->user()->is_admin == 1 and Auth()->user()->id == 1)
                            <option value="1">Admin</option>
                            @endif
                        </select>
                        <label for="is_admin">Status</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- End Modal -->


<!--- KONTEN -->
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0">Data Rekapitulasi Siswa</h1>
          <button data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:20px"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Siswa</button>
        </div>

        <table class="mt-4 table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Tahun Ajaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                <!-- MODAL DELETE -->
                <div class="modal fade" id="deletemodal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Menghapus? </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">Hapus Data Siswa <br>|{{ $s->nama }} | Nisn {{ $s->nisn }} | Kelas {{ $s->Kelas->kelas }} {{$s->Kelas->jurusan}} {{$s->Kelas->no}} | Tahun Ajaran {{ $s->tahun_ajaran }}| <span class="text-danger fw-bold fs-6"> Warning!  Data tidak akan bisa dikembalikan. </span></div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="/dashboard/data/siswa/{{$s->id}}/delete" method="post">
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                {{-- <a class="btn btn-primary" href="/logout">Logout</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
                <tr>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->Kelas->kelas }} {{ $s->Kelas->jurusan }} {{$s->Kelas->no }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->no_telp }}</td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $s->tahun_ajaran }}</td>
                    <td>
                        <a class="text-warning" href="/dashboard/data/siswa/{{$s->id}}"><i class="fas fa-pen-alt"></i></a>
                        <a class="text-success" href="/dashboard/data/siswa/{{$s->id}}/show"><i class="fas fa-eye"></i></a>
                        <a href="#" class="text-danger" data-target="#deletemodal{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Tahun Ajaran</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

 @endsection

