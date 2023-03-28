@extends('layout.main')
@section('title')
<title>Dashboard | Siswa {{ $siswa->nama }}</title>
@endsection
@section('content')
<section >
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="/img/default-user.jpg" alt="avatar"
                class="rounded-circle img-fluid" style="width: 120px;">
              <h5 class="my-3">{{ $siswa->nama }}</h5>
              <p class="text-muted">
                @php
                    $psg = $siswa->User->username;
                    echo '@'.$psg;
                @endphp

              </p>
              <p class="text-muted mb-1">@if($siswa->Kelas->jurusan == "MM")Mutimedia @elseif ($siswa->Kelas->jurusan == "RPL")Rekayasa Perangkat Lunak @else Teknik Komputer Jaringan @endif</p>
              <p class="text-muted mb-4">Tahun Ajaran {{ $siswa->tahun_ajaran }}</p>
              <div class="d-flex justify-content-center mb-2">
                <a href="/dashboard/data/siswa/{{ $siswa->id }}" class="btn btn-primary">Edit</a>
                {{-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
              </div>
            </div>
          </div>

          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  {{-- <i class="fas fa-globe fa-lg text-warning"></i> --}}
                  TOTAL Pembayaran
                  <p class="mb-0">Rp. {{number_format($kurang)}}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    {{-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> --}}
                    TOTAL yang harus dibayar bulan ini
                    <p class="mb-0">Rp. {{number_format($harusdibayar)}}</p>
                  </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  {{-- <i class="fas fa-globe fa-lg text-warning"></i> --}}
                  TOTAL SPP
                  <p class="mb-0">Rp. {{number_format($spp)}}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  {{-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> --}}
                  Sisa Pembayaran
                  <p class="mb-0">Rp. {{number_format($sisa)}}</p>
                </li>

              </ul>
            </div>
          </div>

        </div>

        <div class="col-lg-8">

          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->nama}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">NISN</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->nisn}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kelas</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->Kelas->kelas}} {{$siswa->Kelas->jurusan}} {{$siswa->Kelas->no}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->alamat}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nomer Telepon</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->no_telp}}</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Jenis Kelamin</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@if ($siswa->jk == "P")
                    Perempuan @elseif ($siswa->jk == "L") Laki Laki @else ?
                  @endif</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Tanggal Lahir</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->birthdate}}</p>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Tahun ajaran</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $siswa->tahun_ajaran }}</p>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Status</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@if($siswa->tahun_ajaran > 2020) Siswa Aktif @else Tidak Aktif @endif</p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$siswa->User->username}}</p>
                </div>
              </div>



            </div>
          </div>


          {{-- <div class="row">
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
          </div> --}}

        </div>


      </div>
    </div>
  </section>

@endsection
