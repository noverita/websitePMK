@extends('layouts.app')

@section('title', 'Tambah Data Sertifikasi Personnel')
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
        <a href="{{ route('profil.personel', $id) }}" class="btn navy text-white btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow">
        <div class="card-header py-3 text-center">
            <h6 class="m-0">Sertifikasi</h6>
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
                    <br>

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
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label"><b>Memiliki SKP PT?</b></label>
                            <select name="skp_pt" class="form-control">
                                <option value=""selected>Pilih Salah Satu</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label"><b>Tanggal Expired</b></label>
                            <input type="date" class="form-control" name="expired_date">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Masukkan File Sertifikat</b></label>
                            <label style="font-size: 10px">(Ukuran file tidak lebih dari 2 MB, bentuk .jpeg, .jpg, .png)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="mb-4" type="file" name="file_sertifikat">
                        </div>
                    </div>

                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn navy text-white">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
