@extends('layouts.admin-app')

@section('title', 'Data Personnel')
@section('css')

@endsection
@section('content')
    <div class="card border-left-primary shadow">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-header bg-primary-gradient py-3 text-white">
            <h6 class="m-0 font-weight-bold">DATA DIRI</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('datapersonel.update', $personel->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Lengkap</b></label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $personel->nama_lengkap }}" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>NIK</b></label>
                            <input type="text" class="form-control" name="nik" value="{{ $personel->nik }}" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tanggal Lahir</b></label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ $personel->tanggal_lahir }}" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Grade</b></label>
                            <input type="text" class="form-control" name="grade" value="{{ $personel->grade }}" required>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Whatsapp</b></label>
                            <input type="text" class="form-control" name="whatsapp" value="{{ $personel->whatsapp }}" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col">
                            <label class="form-label"><b>Foto Diri</b></label>
                    </div>
                    </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                            <input type="file" class="form-check-input mb-4" name="foto_diri" value="{{ $personel->foto_diri }}">
                            </div>
                        </div>
                    </div>
                    <div class="submitButton mb-4">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
 <div class="card-header bg-primary-gradient py-3 text-white">
            <h6 class="m-0 font-weight-bold">SERTIFIKASI</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('sertifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Ensure the correct user_id is passed -->
                    <input type="hidden" name="user_id" value="{{ $personel->user_id }}">
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Sertifikasi</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_sertifikasi" placeholder="Isikan Nama Sertifikasi . . .">
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Jenis Lisensi</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="jenis_lisensi" placeholder="Isikan Jenis Lisensi . . .">
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Apakah sudah memiliki SKP PT?</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skp_pt" value="1">
                                <label class="form-check-label" for="skp_sudah">Sudah</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skp_pt" value="0">
                                <label class="form-check-label" for="skp_belum">Belum</label>
                            </div>
                        </div>
                    </div> --}}
                    <select name="skp_pt" class="form-control">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <hr>
                </div>
        </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tanggal Expired</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <input type="date" class="form-control" name="expired_date">
                        </div>
                    </div>
                    <hr>

                    {{-- <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Status Sertifikat</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <select name="status_sertifikat" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Berlaku">Tidak Berlaku</option>
                            </select>
                        </div>
                    </div>
                    <hr> --}}

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Masukkan File Sertifikat</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-control mb-4" type="file" name="file_sertifikat">
                        </div>
                    </div>

                    <div class="submitButton mb-4">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-header bg-primary-gradient py-3 text-white">
            <h6 class="m-0 font-weight-bold">PELATIHAN</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Pelatihan</b></label>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_pelatihan"
                                placeholder="Isikan Nama Pelatihan . . ." required>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Penyelenggara</b></label>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="penyelanggara"
                                placeholder="Isikan Nama Penyelenggara . . ." required>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tanggal Pelatihan</b></label>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" name="date_pelatihan">
                        </div>
                    </div><br>
                    <div class="submitButton mb-4">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('js')

@endsection
