@extends('layouts.app')

@section('title', 'Dashboard Personel')
@section('css')

@endsection
@section('content')
{{-- s --}}
<a href="{{route ('personnel.kuesioner')}}" class="btn btn-primary btn-icon-split mb-4">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Isi Kuesioner</span>
</a>

    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-primary-gradient">
            <h6 class="m-0 font-weight-bold text-white">DASHBOARD PERSONEL</h6>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Laporan</th>
                        <th>Shift</th>
                        <th>Hasil</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
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
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endsection
