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
                                    {{-- <button type="button" class="btn blue btn-sm btn-circle text-white" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <span class="icon text-white">
                                            <i class="fas fa-eye"></i>
                                        </span>

                                    </button> --}}
                                    <button type="button" class="btn blue btn-sm btn-circle text-white" data-toggle="modal"
                                        data-target="#detailModal{{ $item->id }}">
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

                                    <!-- Modal Detail Hasil Kuisioner -->
                                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content shadow rounded-lg">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title font-weight-bold">Detail Pemeriksaan {{ $item->user_name }}, Shift {{ $item->shift }}</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body p-4">
                                                    <!-- KONDISI UMUM -->
                                                    @php
                                                        $tidur24Text = [
                                                            1 => 'Kurang dari 5 jam',
                                                            2 => '5–6 jam',
                                                            3 => '7 jam atau lebih',
                                                        ][$item->tidur24] ?? 'Tidak diketahui';

                                                        $tidur48Text = [
                                                            1 => 'Kurang dari 12 jam',
                                                            2 => '12–13 jam',
                                                            3 => '14 jam atau lebih',
                                                        ][$item->tidur48] ?? 'Tidak diketahui';

                                                        $waspadaText = [
                                                            3 => 'Waspada atau cukup fokus',
                                                            2 => 'Kurang waspada',
                                                            1 => 'Sangat kurang waspada atau mengantuk',
                                                        ][$item->waspada] ?? 'Tidak diketahui';

                                                        $jamkerjaText = [
                                                            3 => 'Masuk kerja normal 8 jam',
                                                            2 => 'Masuk kerja dari 8 jam - 12',
                                                            1 => 'Masuk kerja lebih dari 12 jam',
                                                        ][$item->jamkerja] ?? 'Tidak diketahui';
                                                    @endphp

                                                    <div class="mb-4">
                                                        <div class="row">
                                                            <div class="col-md-6 text-left">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h6 class="text-primary font-weight-bold pb-1">Kondisi Umum</h6>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><strong>Jam tidur 24 jam terakhir:</strong> {{ $tidur24Text }}</p>
                                                                        <hr>
                                                                        <p><strong>Jam tidur 48 jam terakhir:</strong> {{ $tidur48Text }}</p>
                                                                        <hr>
                                                                        <p><strong>Mengonsumsi obat:</strong> {{ $item->obat }}</p>
                                                                        <hr>
                                                                        <p><strong>Keterangan Obat:</strong> {{ $item->keterangan_obat }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h6 class="text-primary font-weight-bold pb-1">Pertanyaan Umum</h6>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><strong>Merasa Waspada:</strong> {{ $waspadaText }}</p>
                                                                        <hr>
                                                                        <p><strong>Stres/Kesehatan/Masalah Pribadi:</strong> {{ $item->stress1 }}</p>
                                                                        <hr>
                                                                        <p><strong>Jam kerja sebelumnya:</strong> {{ $jamkerjaText }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- EFEK SAMPING -->
                                                    <div class="mb-4">
                                                        <h6 class="text-primary font-weight-bold pb-1">Efek Samping Obat</h6>
                                                        @php
                                                            $sideeffectLabels = [
                                                                'sideeffect1' => 'Sedatif',
                                                                'sideeffect2' => 'Kepala Berputar',
                                                                'sideeffect3' => 'Mual',
                                                                'sideeffect4' => 'Hilang Konsentrasi',
                                                                'sideeffect5' => 'Tidak Ada Efek Samping',
                                                            ];
                                                        @endphp
                                                        <div class="row text-center">
                                                            @foreach ($sideeffectLabels as $key => $label)
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="p-3 border rounded h-100">
                                                                        <div class="font-weight-bold mb-1">{{ $label }}</div>
                                                                        <div class="{{ $item->$key != 3 ? 'text-danger' : 'text-success' }} font-weight-bold">
                                                                            {{ $item->$key != 3 ? 'Ya' : 'Tidak' }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- KELUHAN -->
                                                    <div class="mb-4">
                                                        <h6 class="text-primary font-weight-bold pb-1">Keluhan</h6>
                                                        @php
                                                            $keluhanLabels = [
                                                                'keluhan1' => 'Pusing',
                                                                'keluhan2' => 'Mengantuk',
                                                                'keluhan3' => 'Lemas',
                                                                'keluhan4' => 'Mual',
                                                                'keluhan5' => 'Flu',
                                                            ];
                                                        @endphp
                                                        <div class="row text-center">
                                                            @foreach ($keluhanLabels as $key => $label)
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="p-3 border rounded h-100">
                                                                        <div class="font-weight-bold mb-1">{{ $label }}</div>
                                                                        <div class="{{ $item->$key != 3 ? 'text-danger' : 'text-success' }} font-weight-bold">
                                                                            {{ $item->$key != 3 ? 'Ya' : 'Tidak' }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- TES WAT -->
                                                    <div class="mb-4">
                                                        <h6 class="text-primary font-weight-bold pb-1">Tes WAT</h6>
                                                        @php
                                                            $watLabels = [
                                                                'wat1' => 'A1: Berjalan keluar garis',
                                                                'wat2' => 'A2: Tidak seimbang / sempoyongan',
                                                                'wat3' => 'A3: Berhenti untuk menyeimbangkan diri',
                                                                'wat4' => 'A4: Tidak seimbang ketika ada stimulus suara',
                                                                'wat5' => 'A5: Tumit & ujung kaki tidak rapat',
                                                                'wat6' => 'A6: Merentangkan tangan',
                                                                'wat7' => 'A7: Tidak mampu memutar satu kaki',
                                                                'wat8' => 'A8: Salah hitungan langkah',
                                                            ];
                                                        @endphp
                                                        <div class="row text-center">
                                                            @foreach ($watLabels as $key => $label)
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="p-3 border rounded h-100">
                                                                        <div class="font-weight-bold mb-1">{{ $label }}</div>
                                                                        <div class="{{ $item->$key ? 'text-danger' : 'text-success' }} font-weight-bold">
                                                                            {{ $item->$key ? 'Ya' : 'Tidak' }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- TES OLS -->
                                                    <div class="mb-4">
                                                        <h6 class="text-primary font-weight-bold pb-1">Tes OLS</h6>
                                                        @php
                                                            $olsLabels = [
                                                                'ols1' => 'B1: Bergoyang / tidak seimbang',
                                                                'ols2' => 'B2: Merentangkan tangan',
                                                                'ols3' => 'B3: Kaki tumpuan bergerak',
                                                                'ols4' => 'B4: Kaki jatuh sebelum 20 detik',
                                                            ];
                                                        @endphp
                                                        <div class="row text-center">
                                                            @foreach ($olsLabels as $key => $label)
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="p-3 border rounded h-100">
                                                                        <div class="font-weight-bold mb-1">{{ $label }}</div>
                                                                        <div class="{{ $item->$key ? 'text-danger' : 'text-success' }} font-weight-bold">
                                                                            {{ $item->$key ? 'Ya' : 'Tidak' }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </td>
                            </tr>
                        @endforeach

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
