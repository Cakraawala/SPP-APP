@extends('layout.main')
@section('title')
<title>Dashboard | Pay #{{ $p->id }}</title>
@endsection
@section('content')
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Pembayaran</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/pembayaran/{{ $p->id    }}/edit" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="siswa" id="siswa" disabled value="{{ $p->Siswa->nama }}">
                    <label for="siswa">Pilih Siswa</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" disabled id="tanggal_bayar" name="tanggal_pembayaran" class="form-control" value="{{ $p->tanggal_bayar->isoformat('dddd, DD-MM-Y') }}" placeholder="a">
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="number" id="tahun_pembayaran" placeholder="a" name="tahun_pembayaran" class="form-control" value="{{ $p->tahun_pembayaran }}" disabled>
                    <label for="tahun_pembayaran">Tahun Bayar</label>
                </div>
            </div>
           </div>

           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="bulan" id="bulan" disabled value="@if ($p->bulan_pembayaran == '1')Januari @elseif ($p->bulan_pembayaran == '2') Februari @elseif ($p->bulan_pembayaran == '3') Maret @elseif ($p->bulan_pembayaran == '4')  April @elseif ($p->bulan_pembayaran == '5') Mei  @elseif ($p->bulan_pembayaran == '6') Juni @elseif ($p->bulan_pembayaran == '7') Juli @elseif ($p->bulan_pembayaran == '8') Agustus @elseif ($p->bulan_pembayaran == '9') September @elseif ($p->bulan_pembayaran == '10') Oktober @elseif ($p->bulan_pembayaran == '11') November @else Desember

                    @endif">
                    <label for="bulan">Bulan</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" disabled id="before" name="before" class="form-control" value="Rp. {{ number_format($p->jumlah_bayar) }} | Kurang Rp. {{ number_format($p->jumlah_bayar - $min) }}" placeholder="a">
                    <label for="before">Nominal Sebelumnya</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="jumlah_bayar" id="jumlah_bayar" maxlength="10000000" value="{{ $min - $p->jumlah_bayar }}" minlength="100000" step="10000" placeholder="No">
                    <label for="jumlah_bayar">Nominal</label>
                </div>
            </div>
           </div>
           <div class="row mb-3">
            <div class="col-sm-8" id="showBulan"></div>
            <div class="col-sm-4"  id="showPaymentType"></div>
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
                @if (auth()->user()->level == 'admin')
                <a href="/dashboard/data/siswa/{{$p->Siswa->id}}/show" class="btn btn-primary">Lihat Data Siswa</a>
                @endif


                {{-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
              </div>
              @if($p->jumlah_bayar < $min)
              <a href="#" data-toggle="modal" data-target="#staticBackdrop"  class="btn btn-danger">Bayar Sisanya</a>
          @endif
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
                              <p class="text-muted mb-0">Rp.{{number_format($p->jumlah_bayar)}} dari Rp. {{ number_format($min) }} @if ($p->jumlah_bayar < $min)
                                 <button disabled class="badge badge-danger ms-3"><h6>Belum Lunas</h6></button> @else <button disabled class="badge badge-success ms-3"><h6>Lunas</h6></button>
                              @endif</p>
                            </div>
                          </div>

                          <hr>

                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Tanggal Bayar</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"> @if ($p->tanggal_bayar != $p->updated_at)
                                {{$p->tanggal_bayar->isoformat('dddd, DD-MM-Y') }} | {{$p->updated_at->isoformat('dddd, DD-MM-Y') }} @else {{$p->tanggal_bayar->isoformat('dddd, DD-MM-Y') }}
                              @endif </p>
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

  <script src="/style/js/jquery.js"></script>
<script>
    $('#jumlah_bayar').keyup(function() {
        $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
            /(\d)(?=(\d{3})+\.)/g, "$1.")
            .toString());
        });
</script
@endsection
