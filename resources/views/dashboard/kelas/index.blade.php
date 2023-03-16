@extends('layout.main')
@section('title')
<title>Dashboard | Kelas Index</title>
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
            <form action="/dashboard/data/kelas/store" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select name="kelas" id="kelas" class="form-select">
                        <option value="10" selected>10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                    </select>
                    <label for="kelas">Kelas</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select" name="jurusan" id="jurusan">
                        <option selected value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="MM">Multimedia</option>
                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                    </select>
                <label for="jurusan">Jurusan</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="no" id="no" placeholder="No">
                <label for="no">No</label>
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
        <div class="row">

        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0">Data Kelas</h1>
                    </div>
                    <p>Data Rekapitulasi Kelas tahun ajaran {{ Carbon\Carbon::now()->isoformat('Y') }}</p>
                    <button data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:20px"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Kelas</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow border-0">
            <div class="card-body">
            <table class="mt-4 table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="5%">Kelas</th>
                        <th width="40%">Jurusan</th>
                        <th width="5%">No</th>
                        <th>Tahun Ajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $s)
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
                                <div class="modal-body">Hapus Data Kelas Hapus data kelas {{ $s->kelas }} {{ $s->jurusan }} {{ $s->no }} <br><span class="text-danger fw-bold fs-6"> Warning! Data tidak akan bisa dikembalikan. </span></div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/data/kelas/{{$s->id}}/delete" method="post">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->kelas }} </td>
                        <td>@if ($s->jurusan == "RPL")
                            Rekayasa Perangkat Lunak ({{ $s->jurusan }}) @elseif ($s->jurusan == "MM") Multimedia ({{ $s->jurusan }}) @else Teknik Komputer Dan Jaringan ({{ $s->jurusan }})
                        @endif</td>
                        <td> {{ $s->no }}</td>
                        <td> <span class="ms-4"> {{ $s->updated_at->isoformat('Y') }} </span></td>
                        <td>
                            <a class="text-warning" href="/dashboard/data/kelas/{{$s->id}}/edit"><i class="fas fa-pen-alt"></i></a>
                            <a class="text-success" href="/dashboard/data/kelas/{{$s->id}}"><i class="fas fa-eye"></i></a>
                            <a href="#" class="me-5 text-danger" data-target="#deletemodal{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th width="5%">#</th>
                        <th width="5%">Kelas</th>
                        <th width="40%">Jurusan</th>
                        <th width="5%">No</th>
                        <th>Tahun Ajaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</div>
    </div>

 @endsection

