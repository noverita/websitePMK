@extends('layouts.app')

@section('title', 'Profil Personel')
@section('css')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Adjust column width -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Profile Picture -->
                        <img src="{{ asset('storage/' . $personel->foto_diri) }}" class="rounded-circle me-3 img-fluid"
                            style="width: 100px; height: 100px; object-fit: cover;">

                        <!-- User Info -->
                        <div>
                            <h6 class="mb-2 px-3">{{ $personel->nama_lengkap }}</h6>
                            <p class="text-muted mb-1">
                                <i class="fas fa-map-marker-alt px-3"></i> {{ $personel->grade }}
                            </p>
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar-alt px-3"></i>
                                {{ \Carbon\Carbon::parse($personel->tanggal_lahir)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="nav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profil.personel', $personel->id) }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sertifikasi.personel', $personel->user_id) }}">Sertifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelatihan.personel', $personel->user_id) }}">Pelatihan</a>
                </li>
            </ul>
        </div>
    </div> --}}
    <hr>
    <div class="d-flex justify-content-center mb-4">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="pills-sertfikat-tab" data-toggle="pill" href="#pills-sertifikat" role="tab" aria-controls="pills-sertifikat" aria-selected="false">Sertifikasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="pills-pelatihan-tab" data-toggle="pill" href="#pills-pelatihan" role="tab" aria-controls="pills-pelatihan" aria-selected="false">Pelatihan</a>
          </li>
        </ul>
    </div>
    <hr>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('datapersonel.edit', $personel->user_id) }}" class="btn navy text-white btn-icon-split mb-4">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Edit Profil</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    Nama Lengkap
                                </div>
                                <div class="col">
                                    {{ $personel->nama_lengkap }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    NIK
                                </div>
                                <div class="col">
                                    {{ $personel->nik }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Role
                                </div>
                                <div class="col">
                                    {{ $personel->role }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Grade
                                </div>
                                <div class="col">
                                    {{ $personel->grade }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    No. Whatsapp
                                </div>
                                <div class="col">
                                    {{ $personel->whatsapp }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Email
                                </div>
                                <div class="col">
                                    {{$personel->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Tipe Pegawai
                                </div>
                                <div class="col">
                                    {{$personel->status_pegawai}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                   Status Pegawai
                                </div>
                                <div class="col">
                                    {{$personel->status_akun}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-sertifikat" role="tabpanel" aria-labelledby="pills-sertifikat-tab">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('sertifikasi.create', ['id' => $personel->user_id]) }}" class="btn navy text-white btn-icon-split mb-4">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Sertifikasi</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <table id="dataSertifikat" class="table table-striped text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>Nama Sertifikasi</th>
                                        <th>Jenis Lisensi</th>
                                        <th>Memiliki SKP PT</th>
                                        <th>Berlaku Hingga</th>
                                        <th>Status Sertifikasi</th>
                                        <th>File Sertifikat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1
                                    @endphp
                                    @foreach ($sertifikat as $row)
                                        <tr>

                                            <td>{{ $row->nama_sertifikasi }}</td>
                                            <td>{{ $row->jenis_lisensi }}</td>
                                            <td>{{ $row->skp_pt == 1 ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($row->expired_date)->translatedFormat('d F Y') }}</td>
                                            <td>
                                                <span class="badge
                                                    @if ($row->status === 'Valid') badge-success
                                                    @elseif ($row->status === 'Expiring Soon') badge-warning
                                                    @else badge-danger
                                                    @endif">
                                                    {{ $row->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ asset('storage/' . $row->file_sertifikat) }}" class="btn text-white grey btn-circle btn-sm" download>
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('sertifikasi.destroy', $row->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                                    data-id="{{ $row->user_id}}"
                                                    data-action="{{ route('sertifikasi.destroy', $row->user_id) }}">
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
            </div>
        </div>
        <div class="tab-pane fade" id="pills-pelatihan" role="tabpanel" aria-labelledby="pills-pelatihan-tab">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('pelatihan.create', $personel->user_id) }}" class="btn navy text-white btn-icon-split mb-4">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Pelatihan</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <table id="dataPelatihan" class="table table-striped text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Pelatihan</th>
                                        <th>Penyelenggara</th>
                                        <th>Tanggal Pelatihan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelatihan as $p)
                                        <tr>
                                            <td>{{ $p->nama_pelatihan }}</td>
                                            <td>{{ $p->penyelanggara }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->date_pelatihan)->translatedFormat('d F Y') }}</td>
                                            <td>
                                                <a href="#" class="btn red btn-circle text-white btn-sm">

                                                        <i class="fas fa-trash"></i>


                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script> --}}
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
