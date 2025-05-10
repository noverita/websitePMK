@extends('layouts.app')

@section('title', 'Tambah Data Kesehatan Personel')
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
        <a href="{{ route('data.kesehatan') }}" class="btn navy text-white btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0">Tambah Data Kesehatan Personel</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{route('datakesehatan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Personel</b></label>
                            <select name="user_id" class="form-control" required>
                                <option value=""disabled selected hidden>Pilih Nama Personel</option>
                                @foreach($personnels as $personnel)
                                    <option value="{{ $personnel->user_id }}">{{ $personnel->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label"><b>Tahun</b></label>
                            <select name="year" class="form-control">
                                <option value="" selected disabled hidden>Pilih Tahun</option>
                                @for ($year = 2023; $year <= now()->year; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                              </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label"><b>Hasil</b></label>
                            <select name="hasil_kesehatan" class="form-control">
                                <option value="" disabled hidden selected>Pilih Hasil Cek Kesehatan</option>
                                <option value="Sehat">Sehat</option>
                                <option value="Tidak Sehat">Tidak Sehat</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label"><b>Surat Keterangan Sehat</b></label>
                            <label style="font-size: 10px">(Ukuran file tidak lebih dari 2 MB, format: .pdf,.jpeg,.jpg,.png)</label>
                            <div class="row">
                            <input type="file" name="surat_keterangan">
                        </div>
                        </div>
                    </div>
                   <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Catatan</b></label>
                            <textarea type="text-area" class="form-control mb-4" name="catatan_kesehatan"
                            placeholder="Masukkan Catatan . . ." style="height: 3cm"></textarea>
                            <div class="col"></div>
                        </div>
                    </div>

                    <div class="submitButton d-flex justify-content-center">
                        <button type="submit" class="btn navy text-white" style="width=10cm">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
