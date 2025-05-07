@extends('layouts.app')

@section('title', 'Tambah Data Pelatihan Personel')
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
            <h6 class="m-0">Pelatihan</h6>
        </div>
        <div class="card-body ">
            <div class="form-kuesioner">
                <form action="{{ route('pelatihan.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <input type="hidden" value="{{$id}}" name="user_id">
                        <div class="col">
                            <label class="form-label"><b>Nama Pelatihan</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama_pelatihan"
                                placeholder="Isikan Nama Pelatihan . . ." required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Penyelenggara</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="penyelanggara"
                                placeholder="Isikan Nama Penyelenggara . . ." required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><b>Tanggal Pelatihan</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <input type="date" class="form-control" name="date_pelatihan">
                        </div>
                    </div><br>
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
