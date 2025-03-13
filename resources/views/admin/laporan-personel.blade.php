
@extends('layouts.admin-app')

@section('title', 'Laporan Personel')
@section('css')

@endsection
@section('content')
    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-primary-gradient">
            <h6 class="m-0 font-weight-bold text-white">LAPORAN PERSONEL</h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal Laporan</th>
                        <th>Hasil</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Donna Snider</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Noverita</td>
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
