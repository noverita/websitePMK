
@extends('layouts.personel-app')

@section('title', 'Dashboard Personel')
@section('css')

@endsection
@section('content')
<h2 class="text-center font-weight-bold">Dashboard Personel</h2><br>
<a href="{{ route('personnel.kuesioner') }}" class="btn btn-primary  mb-4">
    <span class="icon text-white">
        <i class="fas fa-add"></i>
    </span>
    <span class="text">Tambah Data</span>
</a>
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard Personnel</h6>
        </div> --}}
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
