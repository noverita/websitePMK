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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                    <h2 class="text-center font-weight-bold">Data Diri Personel</h2><br>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        {{-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> --}}
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Isi Nama Lengkap...">
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" placeholder="Isi NIK...">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Tempat, Tanggal, Lahir</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Foto Diri</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-name"><b> Data Kesehatan</b></label>
                                        <br>
                                        <label class="form-label">Tahun</label>
                                        <select class="form-control" id="tahun" placeholder="Tahun">
                                            <option>___</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                            <option>2029</option>
                                            <option>2030</option>
                                            <option>2031</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <label class="label-name"><b>Pelatihan</b></label> <br>
                                        <label class="form-label">Jenis Pelatihan</label>
                                        <select class="form-control" id="tahun" placeholder="Tahun">
                                            <option>___</option>
                                            <option>Sertifikasi Resmi</option>
                                            <option>Pelatihan/Knowledge Sharing</option>
                                            <option>Insidentil</option>
                                        </select>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <label class="form-label">Attach File</label><br>
                                            <input type="file" class="form-control">
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Nama Pelatihan/Sertifikasi</label><br>
                                            <input type="text" class="form-control" placeholder="Isikan nama sertifikasi....">
                                        </div>
                                        </div>
                                        <br>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <label class="form-label">Catatan</label><br>
                                            <input type="text" class="form-control" placeholder="Isikan Catatan...">
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label class="form-label">Kesimpulan</label><br>
                                                <select class="form-control">
                                                    <option>___</option>
                                                    <option>Fit to Work</option>
                                                    <option>Fit with Note</option>
                                                    <option>Temporary Unfit</option>
                                                    <option>Unfit</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <label class="form-label">Tingkat Kebugaran</label><br>
                                                    <select class="form-control">
                                                        <option></option>
                                                        <option></option>
                                                        <option></option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">


                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-primary">Submit</button>
                                                    </div>
                                                    <div class="col-md-4">

                                                    </div>
                                                    </div>

                            </form>
                        </div>
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
