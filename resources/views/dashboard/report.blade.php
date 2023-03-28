@extends('layout.main')

@section('title')
<title> Cakra | Report </title>
<style>
    @media print{
       .sticky-footer,.waktu,.heder,.btn,.topber{display: none;}
        .navbar{display: none;}

        .myTable {
            zoom:90%;
            margin: 0;
            padding: 0;
            margin-right: 30px;
        }
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 waktu mb-5 mt-2">
                    <form action="/dashboard/laporan" method="get">@csrf
                    <label for="bulan" class="form-label">Pilih bulan : </label>
                    <td class="btn">
                        {{-- <input type="date" name="from" class="form-control" required="required"> --}}
                        <select name="bulan" class="form-select" id="bulan">
                            <option value="0">Pilih Bulan Pencarian</option>
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
                    </td>
                </div>
                {{-- <div class="col-md-3 waktu mb-5 mt-2">
                    <label> Sampai Tanggal : </label>
                    <td class="btn"><input type="date" name="to"  required="required" class="form-control"> </td>
                </div> --}}
                <div class="col-md-3 waktu ">
                    <button class="btn waktu ml-4 btn-primary btn-fill pull-right" style="margin-top:33px" type="submit"> Filter </button>
                    {{-- <input href="" type="submit" name="filter" value="Filter" style="margin-top: 33px" class="btn waktu ml-4 btn-primary btn-fill pull-right "></input> --}}
                </div>
            </form>
                    <div class="col-md-3 waktu">
                        <a href="" class="waktu btn btn-outline-primary " style="margin-left: 120px;margin-top:32px" onclick="window.print()"> Print laporan </a>
                    </div>
                </div>
                    </form>
                    <div class="mt-2">
                    <h3 style="text-align : center;margin-bottom:30px;"> Laporan SPP </h3>
                        {{-- <h6> Dari Tanggal :</h6> --}}
                        <h6> Bulan : @if($bulan ==1) Januari @elseif ($bulan == 2) Februari @elseif ($bulan == 3) Maret @elseif ($bulan == 4)  April
                            @elseif ($bulan == 5) Mei @elseif ($bulan == 6)  Juni @elseif ($bulan == 7)  Juli
                            @elseif ($bulan == 8) Agustus
                            @elseif ($bulan == 9) September @elseif ($bulan == 10) Oktober @elseif ($bulan == 3) November
                            @elseif($bulan == 12) Desember @else Jan - Des @endif </h6>
                        <h6> Total : {{ $total }} </h6>
                    </div>


            <div class="MyTable">
                <div class="container me-4">
                    <table style="margin-top: 20px" class="table table-striped" >
                </div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Admin</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Invoice</th>
                            <th>Nominal</th>
                         </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $no = 1;
                        @endphp --}}
                        {{-- @if ($p) --}}
                        @foreach ($p as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->Siswa->nama }} {{ $s->Siswa->Kelas->kelas . ' ' . $s->Siswa->kelas->jurusan . $s->Siswa->kelas->no }}</td>
                            <td>{{ $s->tanggal_bayar->isoformat('ddd, D-MM-Y') }}</td>
                            <td>{{ $s->Admin->nama }}</td>
                            <td>@if($s->bulan_pembayaran ==1) Januari @elseif ($s->bulan_pembayaran == 2) Februari @elseif ($s->bulan_pembayaran == 3) Maret @elseif ($s->bulan_pembayaran == 4)  April
                                @elseif ($s->bulan_pembayaran == 5) Mei @elseif ($s->bulan_pembayaran == 6)  Juni @elseif ($s->bulan_pembayaran == 7)  Juli
                                @elseif ($s->bulan_pembayaran == 8) Agustus
                                @elseif ($s->bulan_pembayaran == 9) September @elseif ($s->bulan_pembayaran == 10) Oktober @elseif ($s->bulan_pembayaran == 3) November
                                @else  Desember @endif</td>
                            <td>{{ $s->tahun_pembayaran }}</td>
                            <td>{{ $s->invoice }}</td>
                            <td>Rp. {{ number_format($s->jumlah_bayar) }}</td>
                        </tr>
                        @endforeach
                        {{-- @endif --}}

                    </tbody>
                    @if (auth()->user()->is_admin == 1)
                    <tfoot>
                        <tr>
                            <th colspan="5"></th>
                            <th colspan="2" class="text-center">Total Pendapatan</th>
                            <td>  Rp. {{ number_format($pendapatan) }} </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
                </div>
        </div>
    </div>
</div>
@endsection
