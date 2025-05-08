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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <a href="{{route('datakesehatan.create')}}" class="btn navy btn-icon-split text-white mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 text-center">Data Kesehatan Personel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Tahun</th>
                            <th>Hasil Cek Kesehatan</th>
                            <th>Catatan</th>
                            <th>Surat Keterangan Sehat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data as $kesehatan)
                            <tr>
                                <td>
                                    {{$no++}}
                                </td>
                                <td>{{ $kesehatan->nama_lengkap }}</td>
                                <td>{{ $kesehatan->year }}</td>
                                <td>{{ $kesehatan->hasil_kesehatan }}</td>
                                <td>{{ $kesehatan->catatan_kesehatan }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $kesehatan->surat_keterangan) }}"
                                        class="btn grey btn-circle btn-sm text-white" download>

                                             <i class="fas fa-download"></i>


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
                                        <button type="button" class="btn btn-danger btn-circle btn-sm"
                                            data-toggle="modal" data-target="#confirmDeleteModal"
                                            data-id="{{ $kesehatan->id }}"
                                            data-action="{{ route('datakesehatan.destroy', $kesehatan->id) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <form method="POST" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah data ini yakin dihapus ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('#dataSertifikat').DataTable({
                paging: true,
                searching: true
            });
            $('#dataPelatihan').DataTable({
                paging: true,
                searching: true
            });
        });
    </script>
    <script>
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var action = button.data('action')

            var modal = $(this)
            modal.find('#deleteForm').attr('action', action)
        })
    </script>
@endsection
