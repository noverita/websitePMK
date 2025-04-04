@extends('layouts.app')

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

        <div class="card-header py-3 bg-gradient-primary text-white text-center">
            <h6 class="m-0 font-weight-bold">SERTIFIKASI</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('sertifikasi.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Sertifikasi</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_sertifikasi"
                                placeholder="Isikan Nama Sertifikasi . . .">
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
                            <input type="text" class="form-control" name="jenis_lisensi"
                                placeholder="Isikan Jenis Lisensi . . .">
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

                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('js')

@endsection
