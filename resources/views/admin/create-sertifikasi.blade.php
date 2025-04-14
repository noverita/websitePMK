@extends('layouts.app')

@section('title', 'Data Personnel')
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
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('profil.personel', $id) }}" class="btn red text-white btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card border-left-red shadow">
        <div class="card-header py-3 red text-white text-center">
            <h6 class="m-0 font-weight-bold">SERTIFIKASI</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('sertifikasi.store')}}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <input type="hidden" value="{{$id}}" name="user_id">
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
                            <select name="skp_pt" class="form-control">
                                <option value=""selected>Pilih Salah Satu</option>
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
                        <button type="submit" class="btn red text-white">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('js')

@endsection
