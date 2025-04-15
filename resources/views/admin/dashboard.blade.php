<!DOCTYPE html>
@extends('layouts.app')

@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
    {{-- <h2 class="text-center font-weight-bold">Dashboard Kesiapan Kerja</h2><br> --}}

    <div class="row">
        <!-- Welcome Card -->
        <div class="col-md-6">
            <div class="text-center card shadow text-white mb-4 p-3 red">
                <h5 class="greetings">Selamat Datang, {{ Auth::user()->name }} <i class="fas fa-smile-wink"></i></h5>
                <p class="text-center">
                    <span class="badge badge-success">
                    Excellent</span>
                </p>
                <a href="{{ route('laporan.personel') }}" class="btn bg-white btn-sm text-red"><strong>Lihat Laporan</strong></a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-md-6">
            <div class="text-center card shadow mb-4">
                <div class="card-header yellow">
                    <h6 class="m-0 font-weight-bold text-white">STATISTIK</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><strong>20</strong><br><i class="fas fa-folder-plus text-gray-400"></i> Laporan
                            Terkumpul</div>
                            <div class="col"><strong>12</strong><br><i class="fas fa-fire-alt text-gray-400"></i> Excellent</div>
                        <div class="col"><strong>12</strong><br><i class="fas fa-thumbs-up text-gray-400"></i> Good</div>
                        <div class="col"><strong>9</strong><br><i class="fas fa-stethoscope text-gray-400"></i> Kurang
                            Fit</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Health & Reports -->
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card border-left-red shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1">
                                Kesehatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">75</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-warning shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1">
                                Laporan Tahunan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">78%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-dark shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1">
                                Laporan Fitness Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">78%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dumbbell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <!-- Employee Shift & Availability -->
    <div class="row mt-3 justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header yellow">
                    <h6 class="m-0 font-weight-bold text-white text-center">SHIFT PEGAWAI</h6>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <select name="shift" class="form-control" style="width: 25%">
                                <option value="">--Pilih Shift--</option>
                                <option value="pagi">Pagi</option>
                                <option value="siang">Siang</option>
                                <option value="malam">Malam</option>
                            </select>
                            <br>
                            <ul>
                                <i class="fas fa-chevron-circle-right text-gray-300"></i>
                                <a>Muhammad John Doe</a>
                                    <span
                                    class="badge badge-success">
                                   Excellent
                                </span>
                            </ul>
                            <hr>
                            <ul>
                            <i class="fas fa-chevron-circle-right text-gray-300"></i>
                            <a>Lorem Ipsum Dolor Sit Amet</a>
                                <span
                                class="badge badge-danger">
                               Kurang Fit
                            </span>
                        </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white text-center">PEGAWAI TERSEDIA</h6>
                </div><br>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <ul class="available">
                                <li>Hartin Alfina - <span class="status-excellent">Excellent</span></li>
                                <hr>
                                <li>Arvi Arinal Khaqqo - <span class="status-excellent">Excellent</span></li>
                                <hr>
                                <li>Ryan Priyatna - <span class="status-good">Good</span></li>
                                <hr>
                                <li>Kasamuna Tedi R. - <span class="status-unfit">Kurang Fit</span></li>
                                <hr>
                            </ul>
                        </div><br>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
@endsection
