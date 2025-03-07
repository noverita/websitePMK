<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Data Diri Personel </title>

    <!-- Custom fonts for this template -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset("css/dashboard-admin.css")}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

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
            <hr class="sidebar-divider my-0" >

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
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
            <div id="content">

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
                    {{-- <h2 class="text-center font-weight-bold">Data Diri Personel</h2><br> --}}



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Diri Personel</h6>
                        </div>
                        <div class="form-kuesioner">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Nama Lengkap</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Nama Lengkap...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>NIK</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan NIK...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Role</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role">
                                        <label class="form-check-label" for="role">Administrator</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role">
                                        <label class="form-check-label" for="role">Personel</label>
                                    </div>
                                </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Grade</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Grade...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Whatsapp</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan No. Whatsapp...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Email</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Alamat Email...">
                                    </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sertifikasi</h6>
                        </div>
                        <div class="form-kuesioner">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Nama Sertifikasi</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Nama Sertifikasi...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Jenis Lisensi</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Jenis Lisensi...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Apakah sudah memiliki SKP PT?</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="skp" id="skp">
                                        <label class="form-check-label" for="skp">Sudah</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="skp" id="skp">
                                        <label class="form-check-label" for="skp">Belum</label>
                                    </div>
                                </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Tanggal Expired</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="date" class="form-control">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Status</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status">
                                        <label class="form-check-label" for="status">Aktif</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status">
                                        <label class="form-check-label" for="status">Expired</label>
                                    </div>
                                </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Masukkan File Sertifikat</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="file">
                                    </div>
                                </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pelatihan</h6>
                        </div>
                        <div class="form-kuesioner">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Nama Pelatihan</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Nama Pelatihan...">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label"><b>Penyelenggara</b></label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control"
                                            placeholder="Isikan Nama Penyelenggara...">
                                    </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PMK 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

</body>

</html>
