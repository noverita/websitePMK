@extends('layouts.app')

@section('title', 'Laporan Personel')
@section('css')

@endsection
@section('content')
    <div class="row justify-content-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-8"> <!-- Adjust column width -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Profile Picture -->
                        <img src="{{ asset('images/profile.jpeg') }}" class="rounded-circle me-3 img-fluid"
                            style="width: 100px; height: 100px; object-fit: cover;">

                        <!-- User Info -->
                        <div>
                            <h3 class="mb-2 px-3">{{ Auth::user()->name }}</h3>
                            <p class="text-muted mb-1">
                                <i class="fas fa-map-marker-alt px-3"></i> AVP PMK PT Petrokimia Gresik
                            </p>
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar-alt px-3"></i> 27 Maret 1991
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>


    <div class="nav">
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profil.personel', $personel->id) }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sertifikasi.personel', $personel->user_id) }}">Sertifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('pelatihan.personel') }}">Pelatihan</a>
            </li>
        </ul>
    </div>
    <hr>


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
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
@endsection
