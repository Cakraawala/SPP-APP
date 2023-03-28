@extends('layout.main')
@section('title')
<title>Dashboard | Pembayaran Index</title>
@endsection
@section('content')
{{-- <script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"> </script>

<script>
 $('#siswa').change(function() {
   var selected_option = $(this).val();
   $.ajax({
      url: "/dashboard/pembayaran",
      type: 'post',
      cache: false,
      success: function(return_data) {
         $('#bulan').html(return_data);
      }
   });
}); --}}

</script>
@if (auth()->user()->is_admin == 1)

<!--- MODAL FORM CREATE -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Pembayaran</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/pembayaran/store" method="post">@csrf
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                  <select name="siswa" class="form-select" id="siswa">
                    <option value="0" selected>Pilih Siswa</option>
                    @foreach ($siswa as $ss)
                    <option value="{{ $ss->id }}">{{ $ss->nama }} | {{ $ss->Kelas->kelas . ' '. $ss->Kelas->jurusan .' '  . $ss->Kelas->no}} </option>
                    @endforeach
                  </select>
                    <label for="siswa">Pilih Siswa</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="date" id="tanggal_bayar" name="tanggal_pembayaran" class="form-control" value="{{ $now }}" placeholder="a">
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="number" id="tahun_pembayaran" placeholder="a" name="tahun_pembayaran" class="form-control" value="2023">
                    <label for="tahun_pembayaran">Tahun Bayar</label>
                </div>
            </div>
           </div>
           <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select name="bulan_pembayaran" class="form-select" id="bulan_pembayaran">
                        <option value="0" selected>Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <label for="bulan_pembayaran">Bulan</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="number" name="jumlah_bayar" id="jumlah_bayar" maxlength="10000000" value="300000" minlength="100000" step="10000" placeholder="No">
                    <label for="jumlah_bayar">Nominal</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3">
                    <input required class="form-control" type="text" value="{{ auth()->user()->nama }}" disabled name="admin" id="admin" placeholder="No">
                    <input type="hidden" name="id_admin" value="{{ auth()->user()->id }}">
                    <label for="admin">Admin</label>
                </div>
            </div>

           </div>
           <div class="row mb-3">
            <div class="col-sm-4" id="showBulan"></div>
            <div class="col-sm-8"  id="showPaymentType"></div>
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
      <button data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:20px"><i class="fas fa-download fa-sm text-white-50"></i> Input Pembayaran</button>
      {{-- <a href="/" class="d-nonen d-sm-inline-block btn btn-sm btn-secondary shadow-sm" style="margin-right:20px"><i class="fas fa-print"></i></a> --}}
    </div>

    <table class="mt-4 table table-striped" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Siswa</th>
                <th>Nominal</th>
                {{-- <th>Sisa Bayar</th> --}}
                <th>Admin</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pay as $s)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->Siswa->nama }} {{ $s->Siswa->Kelas->kelas . ' ' . $s->Siswa->kelas->jurusan . $s->Siswa->kelas->no }}</td>
                <td>Rp.{{ number_format($s->jumlah_bayar,2,',','.') }}</td>
                {{-- <td>{{ $s->jumlah_bayar }}</td> --}}
                <td>{{ $s->Admin->nama }}</td>
                <td>@if($s->bulan_pembayaran ==1) Januari @elseif ($s->bulan_pembayaran == 2) Februari @elseif ($s->bulan_pembayaran == 3) Maret @elseif ($s->bulan_pembayaran == 4)  April
                    @elseif ($s->bulan_pembayaran == 5) Mei @elseif ($s->bulan_pembayaran == 6)  Juni @elseif ($s->bulan_pembayaran == 7)  Juli
                    @elseif ($s->bulan_pembayaran == 8) Agustus
                    @elseif ($s->bulan_pembayaran == 9) September @elseif ($s->bulan_pembayaran == 10) Oktober @elseif ($s->bulan_pembayaran == 11) November
                    @else  Desember @endif</td>
                <td>{{ $s->tahun_pembayaran }}</td>
                <td>{{ $s->invoice }}</td>
                <td>{{ $s->created_at->isoformat('ddd    D-MM-Y') }}</td>
                <td>
                    @if ($s->jumlah_bayar >= ($s->Spp->nominal / 12))
                    <a class="text-primary" href="/dashboard/pembayaran/{{$s->id}}/invoice"><i class="fas fa-print"></i></a>
                    @endif
                    <a class="text-success" href="/dashboard/pembayaran/{{$s->id}}"><i class="fas fa-eye"></i></a>
                    {{-- <a href="#" class="text-danger" data-target="#deletemodal{{ $s->id }}" data-toggle="modal"><i class="fas fa-trash"></i></a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="/style/js/jquery.js"></script>
<script>
    $('#jumlah_bayar').keyup(function() {
        $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
            /(\d)(?=(\d{3})+\.)/g, "$1.")
            .toString());
        });
</script>
{{-- <script>
    $('#bulan').onselect(function() {
        $('#showBulan').text()
            .toString());
        });
</script> --}}
        @else
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="/img/default-user.jpg" alt="avatar"
                          class="rounded-circle img-fluid" style="width: 120px;">
                        <h5 class="my-3">{{ $siswa->nama }}</h5>
                        <p class="text-muted mb-1">@if($siswa->Kelas->jurusan == "MM")Mutimedia @elseif ($siswa->Kelas->jurusan == "RPL")Rekayasa Perangkat Lunak @else Teknik Komputer Jaringan @endif</p>
                        <p class="text-muted mb-4">Tahun Ajaran {{ $siswa->tahun_ajaran }}</p>
                        <div class="d-flex justify-content-center mb-2">
                        </div>
                      </div>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Invoice</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pay as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->tanggal_bayar->isoformat('dddd DD-MM-Y') }}</td>
                            <td>  @if($s->bulan_pembayaran ==1) Januari @elseif ($s->bulan_pembayaran == 2) Februari @elseif ($s->bulan_pembayaran == 3) Maret @elseif ($s->bulan_pembayaran == 4)  April
                                @elseif ($s->bulan_pembayaran == 5) Mei @elseif ($s->bulan_pembayaran == 6)  Juni @elseif ($s->bulan_pembayaran == 7)  Juli
                                @elseif ($s->bulan_pembayaran == 8) Agustus
                                @elseif ($s->bulan_pembayaran == 9) September @elseif ($s->bulan_pembayaran == 10) Oktober @elseif ($s->bulan_pembayaran == 11) November
                                @else  Desember @endif</td>
                            <td>{{ $s->tahun_pembayaran }}</td>
                            <td>Rp.{{ number_format($s->jumlah_bayar) }}</td>
                            <td>{{ $s->invoice }}</td>
                            <td>
                                {{-- <a class="text-primary" href="/dashboard/pembayaran/{{$s->id}}/invoice"><i class="fas fa-print"></i></a> --}}
                                <a class="text-success" href="/dashboard/pembayaran/{{$s->id}}"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



            @endif

 @endsection

