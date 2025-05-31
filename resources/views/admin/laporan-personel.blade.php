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
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Shift</th>
                            <th>Tanggal Laporan</th>
                            <th>Status Kebugaran</th>
                            <th>Hasil Tes WAT & OLS</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user_name ?? 'Tidak Diketahui' }}</td>
                                <td>{{ $item->shift }}</td>
                                <td>{{ $item->tanggal_indonesia }}</td>
                                <td>
                                    @if ($item->tingkat_kebugaran == 'Excellent')
                                        <span class="badge bg-success text-white">{{ $item->tingkat_kebugaran }}</span>
                                    @elseif ($item->tingkat_kebugaran == 'Good')
                                        <span class="badge bg-warning text-dark">{{ $item->tingkat_kebugaran }}</span>
                                    @else
                                        <span class="badge bg-danger text-white">{{ $item->tingkat_kebugaran }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->rekomendasi_firetruck == 'Dapat Mengendarai Firetruck')
                                        <span class="badge bg-success text-white">{{ $item->rekomendasi_firetruck }}</span>
                                    @else
                                        <span class="badge bg-danger text-white">{{ $item->rekomendasi_firetruck }}</span>
                                    @endif
                                </td>

                                <td>
                                    <button type="button" class="btn blue btn-sm btn-circle text-white" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <span class="icon text-white">
                                            <i class="fas fa-eye"></i>
                                        </span>

                                    </button>

                                    <form action="{{ route('laporan.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                            data-target="#confirmDeleteModal" data-id="{{ $item->id }}"
                                            data-action="{{ route('laporan.destroy', $item->id) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Modal (only include this once on the page) -->
                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST" id="deleteForm">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Tutup">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <li>{{ $item->tanggal_indonesia }}</li>
                                            </ul>
                                        </div>
                                        <div class="row ml-4">
                                            <ul class="list-unstyled">
                                                <li style="font-size: 13px"><strong>Shift Kerja:</strong></li>
                                                <li>{{ $item->shift }}</li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center mb-3">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-kondisiumum-tab" data-toggle="pill"
                                                        href="#pills-kondisiumum" role="tab"
                                                        aria-controls="pills-kondisiumum" aria-selected="true">Kondisi
                                                        Umum</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="pills-jamkerja-tab" data-toggle="pill"
                                                        href="#pills-jamkerja" role="tab"
                                                        aria-controls="pills-jamkerja" aria-selected="false">Jam Kerja</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="pills-kesehatan-tab" data-toggle="pill"
                                                        href="#pills-kesehatan" role="tab"
                                                        aria-controls="pills-kesehatan"
                                                        aria-selected="false">Kesehatan</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-kondisiumum" role="tabpanel"
                                                aria-labelledby="pills-kondisiumum-tab">
                                                @php
                                                    $tidur24Options = [
                                                        3 => '7 jam atau lebih',
                                                        2 => '5-7 jam',
                                                        1 => 'Kurang dari 5 jam',
                                                    ];
                                                @endphp

                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Berapa lama Anda tidur dalam 24 jam terakhir?</strong>
                                                        </li>
                                                        <li>{{ $tidur24Options[$item->tidur24] ?? 'Tidak diketahui' }}</li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                @php
                                                    $tidur48Options = [
                                                        3 => '14 jam atau lebih',
                                                        2 => '12–13 jam',
                                                        1 => 'Kurang dari 12 jam',
                                                    ];
                                                @endphp

                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Berapa lama Anda tidur dalam 48 jam terakhir?</strong>
                                                        </li>
                                                        <li>{{ $tidur48Options[$item->tidur48] ?? 'Tidak diketahui' }}</li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Apakah Anda mengkonsumsi obat tertentu?</strong></li>
                                                        <li>{{ $item->obat == 0 ? 'Ya' : 'Tidak' }}</li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Jika Ya, Sebutkan obat yang Anda minum!</strong></li>
                                                        <li>{{ $item->keterangan_obat ?? '-' }}</li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Efek Samping Obat:</strong></li>
                                                        <li></li>
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
                                                        <li><strong>Apakah Anda memiliki stres, masalah kesehatan atau
                                                                masalah pribadi lainnya
                                                                yang secara
                                                                signifikan mempengaruhi konsentrasi dan / atau tidur
                                                                Anda?</strong></li>
                                                        <li>Kurang dari 4 jam</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-jamkerja" role="tabpanel"
                                                aria-labelledby="pills-jamkerja-tab">
                                                <div class="row ml-2 mr-2 mb-4">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Berapa lama Anda bekerja hari sebelumnya?</strong></li>
                                                        <li>Kurang dari 4 jam</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-kesehatan" role="tabpanel"
                                                aria-labelledby="pills-kesehatan-tab">
                                                @php
                                                    $keluhanLabels = [
                                                        'keluhan1' => 'Pusing',
                                                        'keluhan2' => 'Mengantuk',
                                                        'keluhan3' => 'Lemas',
                                                        'keluhan4' => 'Mual Muntah',
                                                        'keluhan5' => 'Flu dan Meriang',
                                                    ];
                                                @endphp

                                                <div class="row ml-2 mr-2">
                                                    <ul style="list-style-type: none; padding:0%">
                                                        <li><strong>Keluhan yang dirasakan:</strong></li>
                                                        @foreach ($keluhanLabels as $key => $label)
                                                            @if ($item->$key != 3)
                                                                <li>{{ $label }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <hr>
                                                <br>

                                                <div class="row ml-2 mr-2 py-2">
                                                    <h6 style="font-size: 12px">Tes WAT</h6>
                                                </div>
                                                @php
                                                    $watLabels = [
                                                        'wat1' => 'A1: Berjalan keluar garis',
                                                        'wat2' => 'A2: Tidak seimbang / sempoyongan',
                                                        'wat3' => 'A3: Berhenti untuk menyeimbangkan diri',
                                                        'wat4' =>
                                                            'A4: Tidak seimbang ketika ada stimulus suara perintah',
                                                        'wat5' => 'A5: Tumit & ujung kaki tidak rapat saat berjalan',
                                                        'wat6' => 'A6: Merentangkan tangan untuk menjaga keseimbangan',
                                                        'wat7' => 'A7: Tidak mampu memutar pada satu kaki',
                                                        'wat8' =>
                                                            'A8: Tidak mampu menghitung/salah hitungan langkah saat jalan',
                                                    ];
                                                @endphp
                                                @foreach ($watLabels as $key => $label)
                                                    <div class="row ml-2 mr-2">
                                                        <ul style="list-style-type: none; padding:0%">
                                                            <li><strong>{{ $label }}</strong></li>
                                                            <li>{{ $item->$key == 0 ? 'Tidak' : 'Ya' }}</li>
                                                        </ul>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                                <br>

                                                <div class="row ml-2 mr-2 py-2">
                                                    <h6 style="font-size: 12px">Tes OLS</h6>
                                                </div>
                                                @php
                                                    $olsLabels = [
                                                        'ols1' => 'B1: Selalu bergoyang / tidak seimbang',
                                                        'ols2' => 'B2: Merentangkan tangan untuk menjaga keseimbangan',
                                                        'ols3' => 'B3: Kaki tumpuan bergerak tidak teratur',
                                                        'ols4' => 'B4: Kaki yang diangkat jatuh sebelum 20 detik',
                                                    ];
                                                @endphp

                                                @foreach ($olsLabels as $key => $label)
                                                    <div class="row ml-2 mr-2">
                                                        <ul style="list-style-type: none; padding:0%">
                                                            <li><strong>{{ $label }}</strong></li>
                                                            <li>{{ $item->$key == 0 ? 'Tidak' : 'Ya' }}</li>
                                                        </ul>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn navy text-white"
                                                    data-dismiss="modal">Kembali</button>
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
