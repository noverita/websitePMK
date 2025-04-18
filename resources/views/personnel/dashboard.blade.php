@extends('layouts.app')

@section('title', 'Dashboard Personel')
@section('css')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    {{-- s --}}
    <a href="{{ route('personnel.kuesioner') }}" class="btn teal btn-icon-split text-white mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Isi Survei</span>
    </a>

    <div class="card shadow mb-4">
        <div class="card-header red">
            <h6 class="m-0 font-weight-bold text-white text-center">DASHBOARD LAPORAN SAYA</h6>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Laporan</th>
                        <th>Shift</th>
                        <th>Hasil</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
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
