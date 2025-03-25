
@extends('layouts.app')

@section('title', 'Laporan Personel')
@section('css')

@endsection
@section('content')
    <div class="card border-bottom-primary shadow mb-4">
        <div class="card-header bg-primary-gradient py-3">
            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PERSONEL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Laporan</th>
                            <th>Hasil</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Noverita</td>
                            <td>25 Maret 2025</td>
                            <td>Good</td>
                            <td>Terkonfirmasi</td>
                            <td>
                                <a href="" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a> --}}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
 <!-- Page level plugins -->
 <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endsection
