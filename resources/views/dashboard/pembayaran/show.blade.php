@extends('layout.main')
@section('title')
<title>Dashboard | Pay #{{ $p->id }}</title>
@endsection
@section('content')
<section >
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="mt-1 mb-4">INFORMASI SISWA</h4>
              <img src="/img/default-user.jpg" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $p->Siswa->nama }}</h5>
              <p class="text-muted">Kelas {{ $p->Siswa->Kelas->kelas . ' ' . $p->Siswa->Kelas->jurusan . $p->Siswa->Kelas->no }} <br>Tahun Ajaran {{ $p->Siswa->tahun_ajaran }}</p>
              {{-- <p class="text-muted"></p> --}}
              <div class="d-flex justify-content-center mb-2">
                <a href="/dashboard/data/siswa/{{$p->Siswa->id}}/show" class="btn btn-primary">Lihat Data Siswa</a>
                {{-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
              </div>
            </div>
          </div>



        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-heade">
                    <h4 class="text-center mt-3"> INFORMASI DETAIL </h4>
                </div>
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">ID</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$p->id}}</p>
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Nominal</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">Rp.{{number_format($p->jumlah_bayar)}}</p>
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Tanggal Bayar</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$p->tanggal_bayar }}</p>
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Bulan Pembayaran</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">@if ($p->bulan_pembayaran == '1')Januari @elseif ($p->bulan_pembayaran == '2') Februari @elseif ($p->bulan_pembayaran == '3') Maret @elseif ($p->bulan_pembayaran == '4')  April @elseif ($p->bulan_pembayaran == '5') Mei  @elseif ($p->bulan_pembayaran == '6') Juni @elseif ($p->bulan_pembayaran == '7') Juli @elseif ($p->bulan_pembayaran == '8') Agustus @elseif ($p->bulan_pembayaran == '9') September @elseif ($p->bulan_pembayaran == '10') Oktober @elseif ($p->bulan_pembayaran == '11') November @else Desember

                              @endif</p>
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Tahun Ajaran</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$p->tahun_pembayaran}}</p>
                            </div>
                          </div>
                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Administrasi</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $p->Admin->nama }}</p>
                            </div>
                          </div>

                          <hr class="mt-5">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Sisa Pembayaran</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">@if ($sisa < 0)
                                LUNAS
                                @else
                                Rp. {{number_format($sisa)}}
                              @endif </p>
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Total SPP</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">Rp.{{ number_format($spp) }}</p>
                            </div>
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
