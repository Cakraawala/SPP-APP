@extends('layout.main')
@section('title')
<title>Dashboard | Pembayaran Index</title>
@endsection
@section('content')

<!--- MODAL FORM CREATE -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pembayaran</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/data/pembayaran/store" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select name="siswa" class="form-select" id="siswa">
                    @foreach ($siswa as $ss)
                    <option value="{{ $ss->id }}">{{ $ss->nama }} | {{ $ss->Kelas->kelas . ' '. $ss->Kelas->Jurusan .' '  . $ss->Kelas->no}} </option>
                    @endforeach
                  </select>
                    <label for="siswa">Pilih Siswa</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="jumlah_bayar" id="jumlah_bayar" placeholder="No">
                    <label for="jumlah_bayar">Nominal</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{ Auth()->user()->nama }}" type="number" name="admin" id="admin" placeholder="No" disabled>
                <label for="admin">Admin</label>
                </div>
            </div>

            pilih bulan
            tahun bayar
            tanggal bayar
           </div>
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">

                    <label for=""></label>
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

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0">Data Rekapitulasi Pembayaran</h1>
      <button data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:20px"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Siswa</button>
    </div>

    <table class="mt-4 table table-striped" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Siswa</th>
                <th>Nominal</th>
                <th>Sisa Bayar</th>
                <th>Admin</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pay as $s)
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
                        <div class="modal-body">Hapus Data Pembayaran <br><span class="text-danger fw-bold fs-6"> Warning!  Data tidak akan bisa dikembalikan. </span></div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form action="/dashboard/data/pembayaran/{{$s->id}}/delete" method="post">
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
                <td>{{ $s->Siswa->nama }}</td>
                <td>Rp.{{ number_format($s->jumlah_bayar,2,',','.') }}</td>
                <td></td>
                <td>{{ $s->Admin->nama }}</td>
                <td>{{ $s->created_at }}</td>
                <td>
                    <a class="text-warning" href="/dashboard/data/pembayaran/{{$s->id}}"><i class="fas fa-pen-alt"></i></a>
                    <a class="text-success" href="/dashboard/data/pembayaran/{{$s->id}}/edit"><i class="fas fa-eye"></i></a>
                    <a href="#" class="text-danger" data-target="#deletemodal{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


 @endsection
