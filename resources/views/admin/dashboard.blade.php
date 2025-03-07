<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Dashboard Kesiapan Kerja</title>

        <!-- Custom fonts for this template -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset("css/dashboard-admin.css")}}" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">FIRE-FIT</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" a href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard Kesiapan Kerja</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" a href="{{route('list.personel')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>List Data Diri Personel</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" a href="{{route('laporan.personel')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Laporan</span></a>
        </li>
        {{-- <li><button type="button" class="btn btn-default" aria-label="Log Out">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
          </button></li> --}}

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content ">

            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-4 static-top">

                <div class="container-fluid d-flex justify-content-between align-items-center">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search (Hidden di layar kecil) -->
                    <form class="d-none d-md-flex form-inline flex-grow-1 mx-3">
                        <div class="input-group w-100">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </div>

            </nav>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h2 class="text-center font-weight-bold">Dashboard Kesiapan Kerja</h2><br>

                <main class="col-md-12">
                    <div class="row">
                        <!-- Welcome Card -->
                        <div class="col-md-6">
                            <div class="text-center card shadow bg-primary-gradient p-3">
                                <h5 class="greetings">Selamat Datang, Hartin Alfina 🎉</h5>
                                <p class="status-excellent">Excellent</p>
                                <button class="btn btn-light btn-sm">Lihat Laporan</button>
                            </div>
                        </div>

                        <!-- Statistics -->
                        <div class="col-md-6">
                            <div class="text-center card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik</h6>
                                </div><br>
                                <div class="row">
                                    <div class="col-4"><strong>20</strong><br> Laporan Terkumpul</div>
                                    <div class="col-4"><strong>12</strong><br> Good</div>
                                    <div class="col-4"><strong>9</strong><br> Kurang Fit</div>
                                </div><br>
                            </div>
                        </div>
                    </div>

                    <!-- Health & Reports -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="text-center card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Kesehatan</h6>
                                </div><br>
                                <p>Bulan Lalu: <strong>75</strong> (+8.24%)</p>
                            </div><br>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Laporan Tahunan</h6>
                                </div><br>
                                <p>Jumlah Laporan: <strong>78%</strong></p>
                            </div><br>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center card shadow mb-4-3">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Laporan Fitness Pegawai</h6>
                                </div><br>
                                <p>Laporan Bulanan: <strong>184</strong> (+15.8%)</p>
                            </div><br>
                        </div>
                    </div>

                    <!-- Employee Shift & Availability -->
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-6">
                            <div class="text-center card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Shift Pegawai</h6>
                                </div>
                                <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Pagi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Siang</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Malam</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <ul class="shift">
                                    <li>Hartin Alfina - <span class="status-excellent">Excellent</span></li><hr>
                                    <li>Arvi Arinal Khaqqo - <span class="status-excellent">Excellent</span></li><hr>
                                    <li>M. Rizky Awaludin - <span class="status-good">Good</span></li><hr>
                                    <li>Kasamuna Tedi R. - <span class="status-unfit">Kurang Fit</span></li><hr>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Pegawai Available</h6>
                                </div><br>
                                <ul class="available">
                                    <li>Hartin Alfina - <span class="status-excellent">Excellent</span></li><hr>
                                    <li>Arvi Arinal Khaqqo - <span class="status-excellent">Excellent</span></li><hr>
                                    <li>Ryan Priyatna - <span class="status-good">Good</span></li><hr>
                                    <li>Kasamuna Tedi R. - <span class="status-unfit">Kurang Fit</span></li><hr>
                                </ul>
                            </div><br>
                        </div>
                    </div>

                </main>
            </div>
        </div>

            <!-- /.container-fluid -->
 <!-- Footer --><br>
 <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Fire-Fit</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



{{-- <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

</body>
</html>
