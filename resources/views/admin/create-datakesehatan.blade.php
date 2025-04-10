@extends('layouts.app')

@section('title', 'Add User')
@section('css')

@endsection
@section('content')
    <div class="card shadow">
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

        <div class="card-header py-3 red text-white text-center">
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
                                <option value="">--Pilih Nama Lengkap--</option>
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
                                <option value="">--Pilih Tahun--</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
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
                            <input class="form-control mb-4" type="file" name="surat_keterangan">
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
                                <option value="">--Pilih Hasil Cek Kesehatan--</option>
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
                            <input type="text" class="form-control" name="catatan_kesehatan"
                                placeholder="Catatan . . .">
                        </div>
                    </div>
                    <hr>
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
