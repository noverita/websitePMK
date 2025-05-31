@extends('layouts.app')

@section('title', 'Dashboard Personel')
@section('css')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 text-center">DASHBOARD LAPORAN SAYA</h6>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Laporan</th>
                        <th>Shift</th>
                        {{-- <th>Hasil</th> --}}
                        <th>Status Kebugaran</th>
                        <th>Hasil Tes WAT & OLS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $item->tanggal_indonesia }}</td>
                        <td>{{$item->shift}}</td>
                        {{-- <td>{{$item->tingkat_kebugaran}}</td> --}}
                        <td>
                            @if ($item->tingkat_kebugaran == 'Excellent')
                                <span class="badge bg-success text-white">{{ $item->tingkat_kebugaran }}</span>
                            @elseif ($item->tingkat_kebugaran == 'Good')
                                <span class="badge bg-warning text-dark">{{ $item->tingkat_kebugaran }}</span>
                            @else
                                <span class="badge bg-danger text-white">{{ $item->tingkat_kebugaran }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->rekomendasi_firetruck == 'Dapat Mengendarai Firetruck')
                             <span class="badge bg-success text-white">{{ $item->rekomendasi_firetruck }}</span>
                            @else
                           <span class="badge bg-danger text-white">{{ $item->rekomendasi_firetruck }}</span>
                           @endif
                        </td>

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
