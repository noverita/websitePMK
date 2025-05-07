@extends('layouts.app')

@section('title', 'Tambah Data Personnel')
@section('css')

@endsection
@section('content')

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
    <div class="d-flex mb-2">
        <a href="{{ route('list.personel') }}" class="btn navy text-white btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 text-center">Data Diri</h6>
        </div>
        <div class="card-body">
            <div class="form-kuesioner">
                <form action="{{ route('datapersonel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Lengkap</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_lengkap"
                                placeholder="Isikan Nama Lengkap . . ." required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Email</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control" name="email" placeholder="Isikan email . . ."
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>NIK</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nik" placeholder="Isikan NIK . . ."
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tanggal Lahir</b></label>
                        </div>
                        <div class="col">
                            <label class="form-label"><b>Status Pegawai</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                        <div class="col">
                            <select name="status_akun" class="form-control">
                                <option value="" disabled selected hidden>Pilih Salah Satu</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tipe Pegawai</b></label>
                        </div>
                        <div class="col">
                            <label class="form-label"><b>Role</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="status_pegawai" class="form-control" id="">
                                <option value="" disabled selected hidden>Pilih Salah Satu</option>
                                <option value="Organik">Organik</option>
                                <option value="Non-Organik">Non-Organik</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="role" class="form-control" id="">
                                <option value="" disabled selected hidden>Pilih Salah Satu</option>
                                <option value="admin">Admin</option>
                                <option value="personnel">Personel</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Grade</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="grade" placeholder="Isikan Grade . . ."
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Whatsapp</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="whatsapp"
                                placeholder="Isikan No. Whatsapp . . ." required>
                        </div>
                    </div>
                    <br>

                    <div class="row ">
                        <div class="col">
                            <label class="form-label"><b>Foto Diri</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input type="file" class="form-check-input mb-4" name="foto_diri">
                            </div>
                        </div>
                    </div>
                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn navy btn-grey:hover text-white">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
