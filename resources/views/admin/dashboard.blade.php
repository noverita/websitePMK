<!DOCTYPE html>
@extends('layouts.admin-app')

@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
<h2 class="text-center font-weight-bold">Dashboard Kesiapan Kerja</h2><br>

    <div class="row">
        <!-- Welcome Card -->
        <div class="col-md-6">
            <div class="text-center card shadow bg-primary-gradient mb-4 p-3">
                <h5 class="greetings">Selamat Datang, Hartin Alfina 🎉</h5>
                <p class="status-excellent">Excellent</p>
                <button class="btn btn-light btn-sm">Lihat Laporan</button>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-md-6">
            <div class="text-center card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4"><strong>20</strong><br> Laporan Terkumpul</div>
                        <div class="col-4"><strong>12</strong><br> Good</div>
                        <div class="col-4"><strong>9</strong><br> Kurang Fit</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Health & Reports -->
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card border-left-primary shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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
                <div class="card border-left-info shadow mb-4 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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
                <div class="card border-left-success shadow mb-4 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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
            <div class="text-center card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Shift Pegawai</h6>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Pagi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Siang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Malam</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <ul class="shift">
                    <li>Hartin Alfina - <span class="status-excellent">Excellent</span></li><hr>
                    <li>Arvi Arinal Khaqqo - <span class="status-excellent">Excellent</span></li><hr>
                    <li>M. Rizky Awaludin - <span class="status-good">Good</span></li><hr>
                    <li>Kasamuna Tedi R. - <span class="status-unfit">Kurang Fit</span></li><hr>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Pegawai Available</h6>
                </div><br>
                <ul class="available">
                    <li>Hartin Alfina - <span class="status-excellent">Excellent</span></li><hr>
                    <li>Arvi Arinal Khaqqo - <span class="status-excellent">Excellent</span></li><hr>
                    <li>Ryan Priyatna - <span class="status-good">Good</span></li><hr>
                    <li>Kasamuna Tedi R. - <span class="status-unfit">Kurang Fit</span></li><hr>
                </ul>
            </div><br>
        </div>
    </div>
@endsection
@section('js')
@endsection
