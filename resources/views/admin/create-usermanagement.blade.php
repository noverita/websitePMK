@extends('layouts.app')

@section('title', 'Tambah Data User Management')
@section('css')

@endsection
@section('content')
<div class="d-flex mb-2">
    <a href="{{ route('user.management') }}" class="btn teal text-white btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>
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

        <div class="card-header py-3 yellow text-white text-center">
            <h6 class="m-0 font-weight-bold">TAMBAH USER</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Nama Lengkap</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_panjang"
                                placeholder="Isikan Nama Lengkap . . .">
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Email</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control" name="email_user"
                                placeholder="Isikan Alamat Email . . .">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Password</b></label>
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
                            <hr>
                        </div>
                    </div>


                    <hr>
                    <div class="submitButton mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn grey text-white">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('js')

@endsection
