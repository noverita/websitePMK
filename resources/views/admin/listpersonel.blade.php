@extends('layouts.app')

@section('title', 'Daftar Personel')

@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    {{-- <h1 class="h4 mb-2 text-gray-800">Laporan</h1> --}}
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    <a href="{{ route('datapersonel.create') }}" class="btn navy btn-icon-split text-white mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Personel</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 text-center ">Daftar Personel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped" width="100%" cellspacing="0"  style="text-align: center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Grade</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($dataPersonels as $p)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->grade }}</td>
                                <td>{{$p->status_akun}}</td>
                                <td>
                                    <a href="{{ route('profil.personel', $p->user_id) }}"
                                        class="btn navy text-white btn-circle btn-sm">
                                        <span class="icon text-white-300">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        {{-- <span class="text">Lihat</span> --}}
                                    </a>
                                    <form action="{{ route('datapersonel.destroy', $p->user_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                        data-id="{{ $p->user_id}}"
                                        data-action="{{ route('datapersonel.destroy', $p->user_id) }}">
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
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var action = button.data('action')

            var modal = $(this)
            modal.find('#deleteForm').attr('action', action)
        })
    </script>
@endsection
