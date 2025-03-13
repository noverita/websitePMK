
@extends('layouts.admin-app')

@section('title', 'List Data Diri Personel')
@section('css')

@endsection
@section('content')
<a href="{{ route('data.personel') }}" class="btn btn-primary  mb-4">
    <span class="icon text-white">
        <i class="fas fa-add"></i>
    </span>
    <span class="text">Tambah Data</span>
</a>
    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-primary-gradient py-3">
            <h6 class="m-0 font-weight-bold text-white">DAFTAR PERSONEL</h6>
        </div>
        <div class="card-body">
            {{-- <a href="{{ route('data.personel') }}" class="btn btn-primary mb-2 w-20">+ Create</a> --}}
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
                            <a href="{{ route('profil.personel') }}" class="btn btn-primary btn-circle">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Noverita</td>
                        <td>0000000000001</td>
                        <td>Personnel</td>
                        <td>-</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-circle">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
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
