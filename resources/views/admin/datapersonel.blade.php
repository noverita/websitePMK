@extends('layouts.admin-app')

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
        <div class="card-header bg-primary-gradient py-3 text-white">
            <h6 class="m-0 font-weight-bold">DATA DIRI</h6>
        </div>
        <div class="card-body">
        <div class="form-kuesioner">
            <form action="{{ route('datapersonel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>NIK</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nik"
                            placeholder="Isikan NIK . . ." required>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Tanggal Lahir</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-8">
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>
                </div><hr>
                {{-- <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Role</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role">
                        <label class="form-check-label" for="role">Administrator</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role">
                        <label class="form-check-label" for="role">Personnel</label>
                    </div>
                </div>
                </div><hr> --}}
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Grade</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="grade"
                            placeholder="Isikan Grade . . ." required>
                    </div>
                </div><hr>
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
                </div><hr>
                <div class="row ">
                    <div class="col">
                        <label class="form-label"><b>Foto Diri</b></label>
                </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                        <input type="file" class="form-check-input mb-4" name="foto_diri" required>
                        </div>
                    </div>
                </div>
                <div class="submitButton mb-4">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
