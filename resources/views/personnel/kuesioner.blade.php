@extends('layouts.app')

@section('title', 'Dashboard Personel')
@section('css')
<style>
    .title{
        font-weight: bold;
    }
</style>
@endsection
@section('content')
    <!-- Page Heading -->
    {{-- <h3 class="text-center font-weight-bold"></h3> --}}
    {{-- <h1 class="h4 mb-2 text-gray-800">Form Survey</h1> --}}
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

    <a href="{{ route('personnel.dashboard') }}" class="btn navy text-white btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
    <form method="post" action="{{route('personnel.store.kuesioner')}}">
        @csrf
        @method("POST")

            <div class="card border-left-navy border-right-navy shadow mb-4">
                <div class="form-kuesioner mb-3">
                    <div class="row">
                        <div class="col-md">
                            <label class="form-label mr-2 ml-2"><b>Tanggal Pengisian</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="date" class="form-control mr-2 ml-2" name="date">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md">
                            <label class="form-label"><b>Shift</b></label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <select class="form-control mr-2 ml-2" id="shift" name="shift">
                                <option value="" selected disabled hidden>Pilih Shift</option>
                                <option value="Pagi">Pagi</option>
                                <option value="Siang">Siang</option>
                                <option value="Malam">Malam</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header navy py-3">
                    <h6 class="m-0 text-center">KONDISI UMUM</h6>
                </div>
                <div class="form-kuesioner mb-3">
                    <div class="mb-3">
                        <label class="form-label title">Berapa lama Anda tidur dalam 24 jam terakhir?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur24" id="tidur24_1" value="3">
                            <label class="form-check-label" for="tidur24_1">
                                7 jam atau lebih
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur24" id="tidur24_2" value="2">
                            <label class="form-check-label" for="tidur24_2">
                                5-7 jam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur24" id="tidur24_3" value="1">
                            <label class="form-check-label" for="tidur24_3">
                                Kurang dari 5 jam
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label title">Berapa lama Anda tidur dalam 48 jam terakhir?</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur48" id="tidur48_1" value="3">
                            <label class="form-check-label" for="tidur48_1">14 jam atau lebih</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur48" id="tidur48_2" value="2">
                            <label class="form-check-label" for="tidur48_2">12–13 jam</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tidur48" id="tidur48_3" value="1">
                            <label class="form-check-label" for="tidur48_3">Kurang dari 12 jam</label>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label title">Apakah Anda mengkonsumsi obat tertentu?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="obat" id="obat_ya" value="0">
                            <label class="form-check-label" for="obat_ya">Ya</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="obat" id="obat_tidak" value="3">
                            <label class="form-check-label" for="obat_tidak">Tidak</label>
                        </div>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="keterangan_obat" class="form-label title">Jika Ya, sebutkan obat yang Anda minum!</label>
                        <textarea class="form-control" id="keterangan_obat" name="keterangan_obat" rows="3" placeholder="Isikan obat yang Anda minum..."></textarea>
                    </div>
                    <hr>
                    <div class="mb-3" id="efek_samping_section" style="display: none;">
                        <label class="form-label title">Efek Samping Obat:</label>
                        @foreach ($sideEffects as $effect)
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">{{ $effect['label'] }}</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{ $effect['name'] }}"
                                            id="{{ $effect['id'] }}_ya" value="1">
                                        <label class="form-check-label" for="{{ $effect['id'] }}_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{ $effect['name'] }}"
                                            id="{{ $effect['id'] }}_tidak" value="3">
                                        <label class="form-check-label" for="{{ $effect['id'] }}_tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                    </div>

                    <div class="mb-3">
                        <label class="form-label title">Apakah Anda Waspada?</label>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio19" value="3">
                            <label class="form-check-label" for="inlineRadio19">Merasa Aktif dan Waspada</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio20" value="3">
                            <label class="form-check-label" for="inlineRadio20">Berfungsi pada tingkat yang baik, tapi
                                tidak di puncak, bisa berkonsentrasi</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio21" value="2">
                            <label class="form-check-label" for="inlineRadio21">OK, tapi tidak sepenuhnya waspada</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio22" value="1">
                            <label class="form-check-label" for="inlineRadio22">Sedikit grogi, sulit
                                berkonsentrasi</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio23" value="1">
                            <label class="form-check-label" for="inlineRadio23">Mengantuk, grogi, ingin berbaring</label>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                            <label class="form-label title">Apakah Anda memiliki stres, masalah kesehatan atau
                                masalah pribadi lainnya yang secara signifikan mempengaruhi konsentrasi dan / atau tidur Anda?
                            </label>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="stress1" id="inlineRadio24"
                                    value="1">
                                <label class="form-check-label" for="1">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stress1" id="inlineRadio25"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio25">Tidak</label>
                            </div>
                    </div>
                </div>

            </div>

            <div class="card shadow mb-4">
                <div class="card-header navy py-3">
                    <h6 class="m-0 text-center">JAM KERJA</h6>
                </div>
                <div class="form-kuesioner">
                    <div class="mb-3">
                        <label class="form-label title">Berapa lama Anda bekerja hari sebelumnya?</label>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio26" value="1">
                            <label class="form-check-label" for="inlineRadio26">Masuk kerja lebih dari 12 jam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio27" value="2">
                            <label class="form-check-label" for="inlineRadio27">Masuk kerja dari 8 jam - 12
                                jam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio27" value="3">
                            <label class="form-check-label" for="inlineRadio27">Masuk kerja normal 8 jam
                                jam</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header navy py-3">
                    <h6 class="m-0 text-center">KESEHATAN</h6>
                </div>
                <div class="form-kuesioner ">
                    <div class="mb-3">
                    <label class="form-label title">Keluhan yang dirasakan saat ini:</label>

                    @foreach($keluhan as $index => $item)
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <label class="form-label">{{ $item['label'] }}</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="keluhan{{ $index + 1 }}" id="{{ $item['key'] }}_ya" value="{{ $item['ya_value'] }}">
                                <label class="form-check-label" for="{{ $item['key'] }}_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="keluhan{{ $index + 1 }}" id="{{ $item['key'] }}_tidak" value="3">
                                <label class="form-check-label" for="{{ $item['key'] }}_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                    <hr>
                    <div class="mb-4">
                        <label class="form-label title">Tes Kesiapan Berkendara (Tes WAT)</label>
                        @foreach ($watQuestions as $code => $question)
                            @php $inputName = 'wat' . substr($code, 1); @endphp
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="form-label mb-0"><strong>{{ $code }}:</strong> {{ $question }}</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check form-check-inline me-3">
                                        <input class="form-check-input" type="radio" name="{{ $inputName }}" id="{{ $inputName }}_ya" value="1">
                                        <label class="form-check-label" for="{{ $inputName }}_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{ $inputName }}" id="{{ $inputName }}_tidak" value="0">
                                        <label class="form-check-label" for="{{ $inputName }}_tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="mb-4">
                        <label class="form-label title">Tes Kesiapan Berkendara (Tes OLS)</label>
                        @foreach ($olsQuestions as $code => $question)
                            @php $inputName = 'ols' . substr($code, 1); @endphp
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="form-label mb-0"><strong>{{ $code }}:</strong> {{ $question }}</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check form-check-inline me-3">
                                        <input class="form-check-input" type="radio" name="{{ $inputName }}" id="{{ $inputName }}_ya" value="1">
                                        <label class="form-check-label" for="{{ $inputName }}_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{ $inputName }}" id="{{ $inputName }}_tidak" value="0">
                                        <label class="form-check-label" for="{{ $inputName }}_tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr>
                    <div class="submitButton d-flex justify-content-center mb-4">
                        <button type="submit" class="btn grey text-white" style="width: 10cm">Submit</button>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </form>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function toggleEfekSamping() {
                var obatVal = $('input[name="obat"]:checked').val();
                if (obatVal === '0') {
                    $('#efek_samping_section').show();
                } else {
                    $('#efek_samping_section').hide();
                }
            }

            toggleEfekSamping();

            $('input[name="obat"]').on('change', function () {
                toggleEfekSamping();
            });
        });
    </script>
@endsection
