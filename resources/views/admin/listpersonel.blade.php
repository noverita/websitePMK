@extends('layouts.admin-app')

@section('title', 'List Data Diri Personel')
@section('css')

@endsection
@section('content')
<a href="{{ route('datapersonel.create') }}" class="btn btn-primary  mb-4">
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
                        <th>Grade</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPersonels as $p)
                    <tr>
                        <td>{{ $p->nama_lengkap }}</td>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->grade }}</td>
                        <td>
                            <a href="{{ route('profil.personel') }}" class="btn btn-primary btn-circle">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('datapersonel.edit', $p->id) }}" class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('datapersonel.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
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
