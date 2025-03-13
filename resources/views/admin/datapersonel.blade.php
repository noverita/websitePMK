@extends('layouts.admin-app')

@section('title', 'Data Personnel')
@section('css')

@endsection
@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Nama Lengkap</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Nama Lengkap...">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>NIK</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan NIK...">
                    </div>
                </div><hr>
                <div class="row">
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
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Grade</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Grade...">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Whatsapp</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan No. Whatsapp...">
                    </div>
                </div><hr>
                <div class="row ">
                    <div class="col">
                        <label class="form-label"><b>Email</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control mb-4"
                            placeholder="Isikan Alamat Email...">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SERTIFIKASI</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Nama Sertifikasi</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Nama Sertifikasi...">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Jenis Lisensi</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Jenis Lisensi...">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Apakah sudah memiliki SKP PT?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="skp" id="skp">
                        <label class="form-check-label" for="skp">Sudah</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="skp" id="skp">
                        <label class="form-check-label" for="skp">Belum</label>
                    </div>
                </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Tanggal Expired</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-8">
                        <input type="date" class="form-control">
                    </div>
                </div><hr>
                {{-- <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Status</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status">
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status">
                        <label class="form-check-label" for="status">Expired</label>
                    </div>
                </div>
                </div><hr> --}}
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Masukkan File Sertifikat</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mb-4" type="file">
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PELATIHAN</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Nama Pelatihan</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Nama Pelatihan...">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Penyelenggara</b></label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"
                            placeholder="Isikan Nama Penyelenggara...">
                    </div>
                </div><br>
                <div class="submitButton mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')

@endsection
