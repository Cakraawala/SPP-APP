<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INVOICE | {{ $p->invoice}}</title>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/invoice/style.css" media="all" /> --}}
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style type="text/css" media="print">
 .heder {
    display: none;
  }
 @page{
    size: A3 landscape;
 }

    </style>
</head>
<body>
    {{-- <a href="">aaa</a> --}}
    <div class="container mt-4 text-primary">
        <div class="card heder shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="/dashboard/pembayaran" class="btn btn-primary">Kembali ke Pembayaran</a>
                    <a href="#" onclick="print()" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12 mt-2" >
                <div class="prints">
                <div class="card shadow" id="print">
                   <div class="card-body">
                    <div class="container">
                      <div class="row ">
                        <div class="col-md-1 ">
                            <img src="/img/smk.png" class="text-primary img-fluid" width="70px" height="70px" alt="invoice#{{ $p->invoice }}">
                        </div>
                        <div class="col-md-4">
                          <h5 class="text-primary mt-3 mb-2" style="">YAYASAN BINA PERTIWI MANDIRI</h5>
                          <h4 class="text-primary" style="">SMK BINA MANDIRI MULTIMEDIA</h3>
                        </div>
                        <div class="col-md-4 ">

                        </div>
                        <div class="col-md-3">
                         <h4 class="text-primary mt-3 ms-2" style=""><strong> BUKTI PEMBAYARAN</strong></h3>
                        </div>
                      </div>

                      <div class="row mt-1 ">
                        <div class="col-md-7 ">

                        </div>
                        <div class="col-md-2 ">
                          <h6>Tanggal : {{$p->tanggal_bayar->isoformat('D-MM-Y')}} </h6>
                        </div>
                        <div class="col-md-3 ">
                            <h6>Nomor Invoice : {{$p->invoice}} </h6>
                          </div>
                      </div>

                      <div class="row mt-1 ">
                        {{-- <div class="col-md-12"> --}}
                            <table class="text-primary table table-sm table-bordered border-primary">
                                <tr>
                                    <td width="15%">Nama</td>
                                    <td width="30%">{{$p->Siswa->nama}}</td>
                                    <td width="25%" align="center">Rincian</td>
                                    <td align="center">Jumlah</td>
                                </tr>
                                <tr>
                                    <td width="15%">NIS/NISN</td>
                                    <td width="30%">{{$p->Siswa->nisn}}</td>
                                    <td width="25%" >1. Pendaftaran</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>
                                    <td width="15%">Jurusan</td>
                                    <td width="30%">{{$p->Siswa->Kelas->jurusan}}</td>
                                    <td width="25%" >2. Uang Gedung</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>
                                    <td width="15%">Kelas</td>
                                    <td width="30%">{{$p->Siswa->Kelas->kelas}}</td>
                                    <td width="25%" >3. Iuran SPP (@if($p->bulan_pembayaran ==1) Januari @elseif ($p->bulan_pembayaran == 2) Februari
                                        @elseif ($p->bulan_pembayaran == 3) Maret @elseif ($p->bulan_pembayaran == 4)  April @elseif ($p->bulan_pembayaran == 5) Mei
                                        @elseif ($p->bulan_pembayaran == 6)  Juni @elseif ($p->bulan_pembayaran == 7)  Juli
                                        @elseif ($p->bulan_pembayaran == 8) Agustus @elseif ($p->bulan_pembayaran == 9) September @elseif ($p->bulan_pembayaran == 10) Oktober
                                        @elseif ($p->bulan_pembayaran == 3) November @else  Desember @endif)</td>
                                    <td >Rp. {{number_format($p->jumlah_bayar)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="5">KETERANGAN : <br> SISA SPP @if($sisa <= 0)Lunas @else Rp. {{number_format($sisa)}} @endif</td>
                                    <td width="25%" >4. Seragam dan Atribut</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>

                                    <td width="25%" >5. Komputer</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>

                                    <td width="25%" >6. Ujian</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>

                                    <td width="25%" >7. ............................................................</td>
                                    <td >Rp. -</td>
                                </tr>
                                <tr>

                                    <td width="25%" align="center">Jumlah</td>
                                    <td >Rp. {{ number_format($p->jumlah_bayar) }}</td>
                                </tr>
                            </table>
                        {{-- </div> --}}
                      </div>
                      <div style="margin-top:80px" class="row ">
                        <div class="col-md-3"> <hr class="border border-2 border-primary opacity-50"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3"> <hr class="border border-2 border-primary opacity-50"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4"><p style="size:1px"> Tanda Tangan Administrasi <br> *Uang yang sudah disetor tidak dapat dikembalikan</p></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-3"><p>Nama dan Tanda Tangan Pembayar</p></div>
                      </div>
                    </div>
                   </div>
                </div>
           </div>
        </div>

        </div>
    </div>
  </body>
@include('vendor.sweetalert.alert')

</html>
