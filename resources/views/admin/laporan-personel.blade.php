@extends('layouts.app')

@section('title', 'Laporan Personel')
@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header yellow py-3">
            <h6 class="m-0 font-weight-bold text-white text-center">LAPORAN KESIAPAN PERSONEL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped" width="100%" cellspacing="0" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Laporan</th>
                            <th>Hasil</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Noverita</td>
                            <td>25 Maret 2025</td>
                            <td>Good</td>
                            <td>
                                <button type="button" class="btn blue btn-sm btn-icon-split text-white" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">Lihat</span>
                                </button>
                                &nbsp;&nbsp;<a href="#" class="btn red btn-icon-split text-white btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header yellow text-white">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><strong>DETAIL
                                                        LAPORAN</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row ml-4">
                                                    <ul>
                                                        <i class="fas fa-chevron-circle-right text-gray-300"></i>
                                                        <a style="font-size: 14px">Tanggal Pengisian:</a>
                                                        <a><strong>12-12-2002</strong></a>
                                                    </ul>
                                                </div>
                                                <div class="row ml-4">
                                                    <ul>
                                                        <i class="fas fa-chevron-circle-right text-gray-300"></i>
                                                        <a style="font-size: 14px">Shift:</a>
                                                        <a><strong>Pagi</strong></a>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                      <li class="nav-item">
                                                        <a class="nav-link active" id="pills-kondisiumum-tab"  style="color: black" data-toggle="pill" href="#pills-kondisiumum" role="tab" aria-controls="pills-kondisiumum" aria-selected="true">Kondisi Umum</a>
                                                      </li>
                                                      <li class="nav-item">
                                                        <a class="nav-link " id="pills-jamkerja-tab"  style="color: black" data-toggle="pill" href="#pills-jamkerja" role="tab" aria-controls="pills-jamkerja" aria-selected="false">Jam Kerja</a>
                                                      </li>
                                                      <li class="nav-item">
                                                        <a class="nav-link " id="pills-kesehatan-tab"  style="color: black" data-toggle="pill" href="#pills-kesehatan" role="tab" aria-controls="pills-kesehatan" aria-selected="false">Kesehatan</a>
                                                      </li>
                                                    </ul>
                                                </div><hr>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-kondisiumum" role="tabpanel" aria-labelledby="pills-kondisiumum-tab">
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Berapa lama anda tidur dalam 24 jam terakhir?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Berapa lama anda tidur dalam 48 jam terakhir?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Apakah Anda mengkonsumsi obat tertentu?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Jika Ya, Sebutkan obat yang Anda minum!</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Efek Samping Obat:</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Apakah Anda Waspada?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Apakah Anda memiliki stres, masalah kesehatan atau masalah pribadi lainnya yang secara signifikan mempengaruhi konsentrasi dan / atau tidur Anda?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>Shift:</a>
                                                            </ul>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="pills-jamkerja" role="tabpanel" aria-labelledby="pills-jamkerja-tab">
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Berapa lama Anda bekerja hari sebelumnya?</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="pills-kesehatan" role="tabpanel" aria-labelledby="pills-kesehatan-tab">
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>Keluhan yang Dirasakan Saat ini:</b></p>
                                                        </div>
                                                        <div class="row border-bottom-yellow">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>

                                                        <div class="row ml-2 mr-2 py-2">
                                                            <p><b>A1 : Berjalan Keluar Garis</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A2 : Tidak seimbang / sempoyongan</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A3 : Berhenti untuk menyeimbangkan diri</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A4 : Tidak seimbang ketika ada stimulus suara perintah</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A5 : Tumit & ujung kaki tidak rapat saat berjalan</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A6 : Merentangkan tangan untuk menjaga keseimbangan</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A7 : Tidak mampu memutar pada satu kaki</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>A8 : Tidak mampu menghitung/salah hitungan langkah saat jalan</b></p>
                                                        </div>
                                                        <div class="row border-bottom-yellow">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2 py-2">
                                                            <p><b>B1 : Selalu bergoyang / tidak seimbang</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>B2 : Merentangkan tangan untuk menjaga keseimbangan</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>B3 : Kaki tumpuan bergerak secara tidak teratur</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                        <div class="row ml-2 mr-2">
                                                            <p><b>B4 : Kaki yang di angkat jatuh sebelum 20 detik</b></p>
                                                        </div>
                                                        <div class="row">
                                                            <ul>
                                                                <i class="fas fa-angle-double-right text-gray-500"></i>
                                                                <a>12 jam</a>
                                                            </ul>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn grey text-white"
                                                        data-dismiss="modal">Kembali</button>
                                                </div>





                                    {{-- <a href="" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a> --}}

                            </div>
                        </div>
                        </div>
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

    </script>
@endsection
