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
            <h6 class="m-0 font-weight-bold">Tambah Data Kesehatan Personel</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Personel</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="namapersonil" class="form-control">
                                <option value=""></option>
                                <option value=""></option>
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
                            <select name="tahun" class="form-control">
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            {{-- bagaimana cara nulis biar data tahun e banyak --}}

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
                            <input class="form-control mb-4" type="file" name="">
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
                            <select name="hasil" class="form-control">
                                <option value=""></option>
                                <option value=""></option>
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
                            <input type="text" class="form-control" name="password_user"
                                placeholder="Isikan Password Anda . . .">
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Role</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="personnel">Personel</option>
                            </select>

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
