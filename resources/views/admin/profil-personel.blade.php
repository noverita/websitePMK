@extends('layouts.admin-app')

@section('title', 'Laporan Personel')
@section('css')

@endsection
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjust column width -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Profile Picture -->
                        <img src="{{ $personel->foto_diri }}" class="rounded-circle me-3 img-fluid"
                            style="width: 100px; height: 100px; object-fit: cover;">

                        <!-- User Info -->
                        <div>
                            <h3 class="mb-2 px-3">{{ $personel->nama_lengkap }}</h3>
                            <p class="text-muted mb-1">
                                <i class="fas fa-map-marker-alt px-3"></i> {{ $personel->grade }}
                            </p>
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar-alt px-3"></i> {{ date('d F Y', strtotime($personel->tanggal_lahir)) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row justify-content-center">
    <div class="nav">
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('profil.personel') }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sertifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pelatihan</a>
            </li>
        </ul>
    </div>
</div>
    <hr>

    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card shadow ">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    Nama Lengkap
                </div>
                <div class="col">
                    {{ $personel->nama_lengkap }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    NIK
                </div>
                <div class="col">
                    {{ $personel->nik }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Role
                </div>
                <div class="col">
                    Administrator
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Grade
                </div>
                <div class="col">
                    {{ $personel->grade }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    No. Whatsapp
                </div>
                <div class="col">
                    {{ $personel->whatsapp }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Email
                </div>
                <div class="col">
                    admin.pmk@gmail.com
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
@endsection
