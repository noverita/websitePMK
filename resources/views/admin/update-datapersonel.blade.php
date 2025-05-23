@extends('layouts.app')

@section('title', 'Edit Data Personnel')
@section('css')

@endsection
@section('content')
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
    <div class="d-flex mb-2">
        <a href="{{ route('profil.personel', $personel->user_id) }}" class="btn navy text-white btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0"> Edit Data Diri</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('datapersonel.update', $personel->user_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Lengkap</b></label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                value="{{ $personel->nama_lengkap }}" required>
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
                        <div class="col-6">
                            <label class="form-label"><b>Tanggal Lahir</b></label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="{{ $personel->tanggal_lahir }}" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label"><b>Status Pegawai</b></label>
                            <select name="status_akun" id="" class="form-control">
                                <option value="Aktif"
                                    {{ old('status_akun', $personel->status_akun) == 'Aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="Tidak Aktif"
                                    {{ old('status_akun', $personel->status_akun) == 'Tidak Aktif' ? 'selected' : '' }}>
                                    Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label"><b>Tipe Pegawai</b></label>
                            <select name="status_pegawai" id="" class="form-control">
                                <option value="Organik"
                                    {{ old('status_pegawai', $personel->status_pegawai) == 'Organik' ? 'selected' : '' }}>
                                    Organik</option>
                                <option value="Non-Organik"
                                    {{ old('status_pegawai', $personel->status_pegawai) == 'Non-Organik' ? 'selected' : '' }}>
                                    Non-Organik</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label"><b>Role</b></label>
                            <select name="role" class="form-control">
                                <option value="admin" {{ old('role', $personel->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="personnel" {{ old('role', $personel->role ?? '') == 'personnel' ? 'selected' : '' }}>Personnel</option>
                            </select>
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
                            <label style="font-size: 10px">(Ukuran file tidak lebih dari 2 MB, format: .jpeg,.jpg,.png)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                @if (!empty($personel->foto_diri))
                                    <img src="{{ asset('storage/' . $personel->foto_diri) }}" alt="Foto Diri"
                                        class="img-thumbnail" style="max-height: 150px;">
                                @endif
                            </div>
                            <input type="file" class="form-file @error('foto_diri') is-invalid @enderror"
                                name="foto_diri" id="foto_diri">
                            @error('foto_diri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn navy text-white">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
