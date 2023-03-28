@extends('layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
<style>

    @media print {
   body * {
     visibility: hidden;
   }
   #print * {
     visibility: visible;
     zoom: 100%;
   }
   #print {
     position: absolute;
     left: 0;
     top: 0;
   }
 }
 </style>
 <div class="print" id="print">
     <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Siswa Jurusan RPL </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rplcount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Siswa Jurusan MM</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mmcount}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Siswa Jurusan TKJ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tkjcount}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Profit Compared Last Month
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-2 font-weight-bold text-gray-800">%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Transaction</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tcount }} | Rp. {{ number_format($total) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300 me-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

 @endsection
 @section('footer')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
 {{-- <script>
     const ctx = document.getElementById('myChart');

     new Chart(ctx, {
       type: 'bar',
       data: {
         labels:['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov',
     'Des'],
         datasets: [{
           label: 'Earnings A Month',
           backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
           data: JSON.parse('{!! json_encode($count) !!}'),
           borderWidth: 1
         }]
       },
       options: {
         scales: {
           y: {
             beginAtZero: true
           }
         }
       }
     });
   </script>

 <script>
 const labels2 = JSON.parse('{!! json_encode($months) !!}');
 const data = {
     labels: labels2,
     datasets: [{
         // data: JSON.parse('{!! json_encode($qty) !!}'),
         // data: ['123','123','243','0','0'],
         data: JSON.parse('{!! json_encode($qty) !!}'),
         backgroundColor:['rgb(255, 61, 61)',
         'rgb(255, 245, 61)',
         'rgb(61, 64, 255)',
         'rgb(139, 255, 61)',
         'rgb(1, 200, 255)',
         'rgb(255, 132, 61)',
         'rgb(102, 204, 204)',
         'rgb(255, 171, 171)',
         'rgb(102, 153, 255)',
         'rgb(102, 102, 102)',
         'rgb(197, 163, 255)',
         'rgb(231, 255, 172)',
     ],
     }]
 };
 const config = {
   type: 'doughnut',
   data: data,
 };
 const myChart2 = new Chart(
     document.getElementById('myChart2'),
     config
 )
   </script> --}}
@endsection
