
@extends('layouts.admin-app')

@section('title', 'List Data Diri Personel')
@section('css')
    
@endsection
@section('content')
    <h2 class="text-center font-weight-bold">List Data Diri Personel</h2>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('data.personel') }}" class="btn btn-primary mb-2 w-20">+ Create</a>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Role</th>
                        <th>Grade</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Donna Snider</td>
                        <td>0000000000001</td>
                        <td>Personnel</td>
                        <td>-</td>
                        <td>
                            <a href="http://" class="btn btn-warning btn-sm">Edit</a>
                            <a href="http://" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Noverita</td>
                        <td>0000000000001</td>
                        <td>Personnel</td>
                        <td>-</td>
                        <td>
                            <a href="http://" class="btn btn-warning btn-sm">Edit</a>
                            <a href="http://" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
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