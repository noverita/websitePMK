@extends('layouts.app')

@section('title', 'Laporan Personel')
@section('css')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                            <i class="fas fa-calendar-alt px-3"></i>
                            {{ \Carbon\Carbon::parse($personel->tanggal_lahir)->translatedFormat('d F Y') }}
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
                <a class="nav-link" href="{{ route('profil.personel', $personel->id) }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sertifikasi.personel', $personel->user_id) }}">Sertifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('pelatihan.personel', $personel->user_id) }}">Pelatihan</a>
            </li>
        </ul>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-8">
<a href="{{ route('pelatihan.create', $personel->user_id) }}" class="btn red text-white btn-icon-split mb-4">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Pelatihan</span>
</a>
</div>
</div>

    <div class="card shadow">
        {{-- <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Personnel</h6>
        </div> --}}
        <div class="card-body">
            <table id="dataTable" class="table table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pelatihan</th>
                        <th>Penyelenggara</th>
                        <th>Tanggal Pelatihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihans as $p)
                        <tr>
                            <td>{{ $p->nama_pelatihan }}</td>
                            <td>{{ $p->penyelanggara }}</td>
                            <td>{{ $p->date_pelatihan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

    </script>
@endsection
