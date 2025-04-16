@extends('layouts.app')

@section('title', 'Add User')
@section('css')

@endsection
@section('content')
<div class="d-flex mb-2">
    <a href="{{ route('data.kesehatan') }}" class="btn teal text-white btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>
    <div class="card border-left-yellow shadow">
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



        <div class="card-header py-3 yellow text-white text-center">
            <h6 class="m-0 font-weight-bold">TAMBAH DATA KESEHATAN PERSONEL</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{route('datakesehatan.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Personel</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="user_id" class="form-control" required>
                                <option value=""disabled selected hidden>Pilih Nama Lengkap</option>
                                @foreach($personnels as $personnel)
                                    <option value="{{ $personnel->id }}">{{ $personnel->nama_lengkap }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tahun</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="year" class="form-control">
                                <option value="" selected disabled hidden>Pilih Tahun</option>
                                @for ($year = 2023; $year <= now()->year; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                              </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Surat Keterangan Sehat</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="file" name="surat_keterangan">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Hasil</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="hasil_kesehatan" class="form-control">
                                <option value="" disabled hidden selected>Pilih Hasil Cek Kesehatan</option>
                                <option value="sehat">Sehat</option>
                                <option value="tidaksehat">Tidak Sehat</option>
                            </select>

                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Catatan</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea type="text-area" class="form-control" name="catatan_kesehatan"
                                placeholder="Masukkan Catatan . . ."></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn grey text-white" style="width=10cm">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('js')

@endsection
