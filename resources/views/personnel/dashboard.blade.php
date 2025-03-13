@extends('layouts.personel-app')

@section('title', 'Dashboard Personel')
@section('css')

@endsection
@section('content')
{{-- s --}}
<a href="{{ route('personnel.kuesioner') }}" class="btn btn-primary mb-4">
    <span class="icon text-white">
        <i class="fas fa-add"></i>
    </span>
    <span class="text">Tambah Data</span>
</a>
    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-primary-gradient">
            <h6 class="m-0 font-weight-bold text-white">DASHBOARD PERSONEL</h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
@endsection
