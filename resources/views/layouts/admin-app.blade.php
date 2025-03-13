<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Custom fonts and styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{asset('css/dashboard-admin.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @yield('css')
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FIRE-FIT</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('list.personel')}}"><i class="fas fa-fw fa-users"></i> Daftar Personel</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('laporan.personel')}}"><i class="fas fa-fw fa-file-alt"></i> Laporan</a></li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-4">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        {{-- <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle"><i class="fa fa-bars"></i></button> --}}
                        {{-- <form class="d-none d-md-flex form-inline flex-grow-1 mx-3">
                            <div class="input-group w-100">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
                                </div>
                            </div>
                        </form> --}}
                        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto text-center">
                    <span>Copyright &copy; Fire-Fit 2025</span>
                </div>
            </footer>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

    @yield('js')
</body>

</html>
