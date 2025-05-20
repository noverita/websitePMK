@extends('layouts.app')

@section('title', 'Laporan Personel')
@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 text-center">Laporan Hasil Kesiapan Personel</h6>
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
                                <button type="button" class="btn blue btn-sm btn-circle text-white" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <span class="icon text-white">
                                        <i class="fas fa-eye"></i>
                                    </span>

                                </button>
                                &nbsp;&nbsp;<a href="#" class="btn btn-danger btn-circle text-white btn-sm">
                                    <span class="icon text-white">
                                        <i class="fas fa-trash"></i>
                                    </span>

                                </a>
            </div>
        </div>
    </div>
    </td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">Detail Hasil Survei</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row ml-4">
                        <ul class="list-unstyled">
                            <li style="font-size: 13px"><strong>Tanggal Pengisian:</strong></li>
                            <li>12 Mei 2025</li>
                        </ul>
                    </div>
                    <div class="row ml-4">
                        <ul class="list-unstyled">
                            <li style="font-size: 13px"><strong>Shift Kerja:</strong></li>
                            <li>pagi</li>
                        </ul>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center mb-3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-kondisiumum-tab" data-toggle="pill"
                                    href="#pills-kondisiumum" role="tab" aria-controls="pills-kondisiumum"
                                    aria-selected="true">Kondisi Umum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-jamkerja-tab" data-toggle="pill" href="#pills-jamkerja"
                                    role="tab" aria-controls="pills-jamkerja" aria-selected="false">Jam Kerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-kesehatan-tab" data-toggle="pill" href="#pills-kesehatan"
                                    role="tab" aria-controls="pills-kesehatan" aria-selected="false">Kesehatan</a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-kondisiumum" role="tabpanel"
                            aria-labelledby="pills-kondisiumum-tab">
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Berapa lama anda tidur dalam 24 jam terakhir?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>

                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Berapa lama anda tidur dalam 48 jam terakhir?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Apakah Anda mengkonsumsi obat tertentu?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Jika Ya, Sebutkan obat yang Anda minum!</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Efek Samping Obat:</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Apakah Anda Waspada?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2 mb-4">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Apakah Anda memiliki stres, masalah kesehatan atau masalah pribadi lainnya
                                            yang secara
                                            signifikan mempengaruhi konsentrasi dan / atau tidur Anda?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="pills-jamkerja" role="tabpanel" aria-labelledby="pills-jamkerja-tab">
                            <div class="row ml-2 mr-2 mb-4">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Berapa lama Anda bekerja hari sebelumnya?</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-kesehatan" role="tabpanel"
                            aria-labelledby="pills-kesehatan-tab">
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>Keluhan yang Dirasakan Saat ini:</strong></li>
                                    <li>Kurang dari 4 jam</li>
                                </ul>
                            </div>
                            <hr>
                            <br>

                            <div class="row ml-2 mr-2 py-2">
                                <h6 style="font-size: 12px">Tes WAT</h6>
                            </div>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A1: Berjalan keluar garis</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A2: Tidak seimbang / sempoyongan</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A3: Berhenti untuk menyeimbangkan diri</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A4: Tidak seimbang ketika ada stimulus suara perintah</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A5: Tumit & ujung kaki tidak rapat saat berjalan</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A6: Merentangkan tangan untuk menjaga keseimbangan</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A7: Tidak mampu memutar pada satu kaki</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>A8 : Tidak mampu menghitung/salah hitungan langkah saat jalan</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <br>

                            <div class="row ml-2 mr-2 py-2">
                                <h6 style="font-size: 12px">Tes OLS</h6>
                            </div>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>B1: Selalu bergoyang / tidak seimbang</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>B2: Merentangkan tangan untuk menjaga keseimbangan</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>B3: Kaki tumpuan bergerak secara tidak teratur</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row ml-2 mr-2 mb-4">
                                <ul style="list-style-type: none; padding:0%">
                                    <li><strong>B4: Kaki yang di angkat jatuh sebelum 20 detik</strong></li>
                                    <li>Tidak</li>
                                </ul>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn navy text-white" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                    </tbody>
                    </table>
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
