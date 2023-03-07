<html>
<head>
  @yield('title')
  {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"> --}}
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/db/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/img/logo.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    {{-- <link href="/carousel/carousel.css" rel="stylesheet"> --}}

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layout.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    @include('layout.topbar')
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layout.logout')

    @yield('footer')
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/db/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    {{-- <script src="/bs/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    @include('sweetalert::alert')
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
        $('#myTable1').DataTable();
        } );
    </script>

</body>
</html>

