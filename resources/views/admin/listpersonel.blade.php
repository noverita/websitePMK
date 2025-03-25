@extends('layouts.app')

@section('title', 'List Data Diri Personel')

@section('css')

@endsection

@section('content')
    <!-- Page Heading -->
    {{-- <h1 class="h4 mb-2 text-gray-800">Laporan</h1> --}}
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
                            <a href="{{route ('datapersonel.create')}}" class="btn btn-primary btn-icon-split mb-4">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-gradient-primary py-3">
            <h6 class="m-0 font-weight-bold text-white text-center">DAFTAR PERSONEL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped">
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
                                <a href="{{ route('profil.personel', $p->id) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('datapersonel.edit', $p->id) }}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('datapersonel.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                {{-- <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
