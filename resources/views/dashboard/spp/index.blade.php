@extends('layout.main')
@section('title')
<title>Dashboard | SPP Index</title>
@endsection
@section('content')

<!--- MODAL FORM CREATE -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data SPP</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/data/spp/store" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input disabled class="form-control" type="number" name="id" id="id" value="{{App\Models\SPP::orderby('id','desc')->first()->id + 1}}">
                    <label for="id">ID</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="tahun_ajaran" id="tahun_ajaran" placeholder="No">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="nominal" id="nominal" placeholder="No">
                <label for="nominal">Nominal</label>
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
                        <h1 class="h3 mb-0">Data SPP </h1>
                    </div>
                    <p>Data Rekapitulasi SPP </p>
                    <button data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:20px"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data SPP</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow border-0">
            <div class="card-body">
            <table class="mt-4 table table-striped" id="">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="10%">ID</th>
                        <th width="20%">Tahun Ajaran</th>
                        <th width="30%">Nominal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spp as $s)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->tahun_ajaran }}</td>
                        <td>RP. {{ number_format($s->nominal,2, ',' ,'.') }}</td>
                        <td>
                            <a class="text-warning" href="/dashboard/data/spp/{{$s->id}}/edit"><i class="fas fa-pen-alt"></i></a>
                            {{-- <a class="text-success" href="/dashboard/data/spp/{{$s->id}}"><i class="fas fa-eye"></i></a> --}}
                            {{-- <a href="/dashboard/data/spp/{{$s->id}}/delete" class="me-5 text-danger"><i class="fas fa-trash"></i></a> --}}
                            <a href="#" class="me-5 text-danger" data-target="#modaldelete{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                              <!-- MODAL DELETE -->
                    <div class="modal fade" id="modaldelete{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Menghapus? </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                </div>
                                <div class="modal-body">Hapus data SPP {{ $s->tahun_ajaran }} #{{ $s->id }} <br><span class="text-danger fw-bold fs-6"> Warning! Data tidak akan bisa dikembalikan. </span></div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/data/spp/{{$s->id}}/delete" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                    {{-- <a class="btn btn-primary" href="/logout">Logout</a> --}}
                                </div>
                            </div>
                        </div></div>
                    <!-- END MODAL -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th width="10%">#</th>
                        <th width="10%">ID</th>
                        <th width="20%">Tahun Ajaran</th>
                        <th width="30%">Nominal</th>
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

