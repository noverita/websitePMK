<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List Data Diri Personel</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{asset('css/dashboard-admin.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FIRE-FIT</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('list.personel')}}"><i class="fas fa-fw fa-users"></i> List Data Diri</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('laporan.personel')}}"><i class="fas fa-fw fa-file-alt"></i> Laporan</a></li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-4">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle"><i class="fa fa-bars"></i></button>
                        <form class="d-none d-md-flex form-inline flex-grow-1 mx-3">
                            <div class="input-group w-100">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <h2 class="text-center font-weight-bold">List Data Diri Personel</h2>
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('data.personel') }}" class="btn btn-primary mb-2 w-20">+ Create</a>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Role</th>
                                        <th>Grade</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Donna Snider</td>
                                        <td>0000000000001</td>
                                        <td>Personnel</td>
                                        <td>-</td>
                                        <td>
                                            <a href="http://" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="http://" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Noverita</td>
                                        <td>0000000000001</td>
                                        <td>Personnel</td>
                                        <td>-</td>
                                        <td>
                                            <a href="http://" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="http://" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto text-center">
                    <span>Copyright &copy; PMK 2025</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
