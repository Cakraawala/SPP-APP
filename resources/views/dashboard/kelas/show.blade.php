@extends('layout.main')
@section('title')
<title>Dashboard | Siswa Kelas {{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->no }}</title>
@endsection
@section('content')
<section >
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Kelas {{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->no }}</h5>
                    <p class="mb-1">Tahun Ajaran {{ $kelas->updated_at->isoformat('Y') }} - Jumlah Siswa {{ $kelas->Siswa->count() }}</p>

                  </div>
                </div>

          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://mdbootstrap.com</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <p class="mb-0">@mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-lg-8">

          <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Nama</th>
                            <th width="20%">NISN</th>
                            <th>JK</th>
                            <th width="20%">No Telepon</th>
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
                    <div class="modal-body">Hapus data Siswa {{ $s->nama }} <br><span class="text-danger fw-bold fs-6"> Warning! Data tidak akan bisa dikembalikan. </span></div>
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
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->nisn }}</td>
                                <td>{{ $s->jk }}</td>
                                <td>{{ $s->no_telp }}</td>
                                <td>
                                    <a class="text-warning" href="/dashboard/data/siswa/{{$s->id}}"><i class="fas fa-pen-alt"></i></a>
                                    <a class="text-success" href="/dashboard/data/siswa/{{$s->id}}/show"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="me-5 text-danger" data-target="#deletemodal{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{-- <tfoot>
                        <tr>
                           <th width="5%">#</th>
                            <th width="25%">Nama</th>
                            <th width="20%">NISN</th>
                            <th>JK</th>
                            <th width="20%">No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> --}}
                </table>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </section>

@endsection
