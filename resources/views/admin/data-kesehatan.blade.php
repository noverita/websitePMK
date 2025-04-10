@extends('layouts.app')

@section('title', 'Data Kesehatan Personel')

@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    {{-- <h1 class="h4 mb-2 text-gray-800">Laporan</h1> --}}
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    <a href="{{route('datakesehatan.create')}}" class="btn red btn-icon-split text-white mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header red py-3">
            <h6 class="m-0 font-weight-bold text-white text-center">DATA KESEHATAN PERSONEL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped" width="100%" cellspacing="0"  style="text-align: center">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Tahun</th>
                            <th>Hasil Cek Kesehatan</th>
                            <th>Catatan</th>
                            <th>Surat Keterangan Sehat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $kesehatan)
                            <tr>
                                <td>{{ $kesehatan->nama_lengkap }}</td>
                                <td>{{ $kesehatan->year }}</td>
                                <td>{{ $kesehatan->hasil_kesehatan }}</td>
                                <td>{{ $kesehatan->catatan_kesehatan }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $kesehatan->surat_keterangan) }}"
                                        class="btn red text-white btn-icon-split" download>
                                         <span class="icon text-white-50">
                                             <i class="fas fa-download"></i>
                                         </span>
                                         <span class="text">Download</span>
                                     </a>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('profil.personel', $p->id) }}"
                                        class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                    {{-- <a href="{{ route('datapersonel.edit', $p->id) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    {{-- Delete Form --}}
                <form action="{{ route('datakesehatan.destroy', $kesehatan->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-circle btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection
