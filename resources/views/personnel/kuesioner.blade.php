@extends('layouts.personel-app')

@section('title', 'Dashboard Personel')
@section('css')

@endsection
@section('content')
    <!-- Page Heading -->
    {{-- <h3 class="text-center font-weight-bold"></h3> --}}

    <div class="card border-left-primary shadow mb-4">
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label"><b>Tanggal Pengisian</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="date" class="form-control">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label"><b>Shift</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <select class="form-control" id="shift">
                            <option value="pagi">Pagi</option>
                            <option value="siang">Siang</option>
                            <option value="malam">Malam</option>

                        </select>
                    </div>
                </div><br>
            </form>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card border-left-primary shadow">
        <div class="card-header bg-primary-gradient py-3">
            <h6 class="m-0 font-weight-bold text-white">KONDISI UMUM</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Berapa lama anda tidur dalam 24 jam terakhir?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur24" id="inlineRadio1">
                            <label class="form-check-label" for="inlineRadio1">7 jam atau lebih</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur24" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">5-7 jam</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur24" id="inlineRadio3">
                            <label class="form-check-label" for="inlineRadio3">kurang dari 5 jam</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Berapa lama anda tidur dalam 48 jam terakhir?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur48" id="inlineRadio4">
                            <label class="form-check-label" for="inlineRadio4">14 jam atau lebih</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur48" id="inlineRadio5">
                            <label class="form-check-label" for="inlineRadio5">12-13 jam</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tidur48" id="inlineRadio6">
                            <label class="form-check-label" for="inlineRadio6">kurang dari 12 jam</label>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Apakah Anda mengkonsumsi obat tertentu?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obat" id="inlineRadio7" value="option1">
                            <label class="form-check-label" for="inlineRadio7">Ya</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obat" id="inlineRadio8"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio8">Tidak</label><br>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Jika Ya, Sebutkan obat yang Anda minum!</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Isikan Obat yang Anda Minum...">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label"><b>Efek Samping Obat:</b></label>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label-option"><strong>a.</strong> Sedatif</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect1" id="inlineRadio9"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio9">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect1" id="inlineRadio10"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio10">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label-option"><strong>b.</strong> Kepala Berputar (Dizziness)</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect2" id="inlineRadio11"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio11">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect2" id="inlineRadio12"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio12">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label-option"><strong>c.</strong> Mual</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect3" id="inlineRadio13"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio13">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect3" id="inlineRadio14"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio14">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label-option"><strong>d.</strong> Hilang Konsentrasi</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect4" id="inlineRadio15"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio15">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect4" id="inlineRadio16"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio16">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label-option"><strong>e.</strong> Tidak Ada Efek Samping</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect5" id="inlineRadio17"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio17">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sideeffect5" id="inlineRadio18"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio18">Tidak</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Apakah Anda Waspada?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio19">
                            <label class="form-check-label" for="inlineRadio19">Merasa Aktif dan Waspada</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio20">
                            <label class="form-check-label" for="inlineRadio20">Berfungsi pada tingkat yang baik, tapi
                                tidak di puncak, bisa
                                berkonsentrasi</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio21">
                            <label class="form-check-label" for="inlineRadio21">OK, tapi tidak sepenuhnya waspada</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio22">
                            <label class="form-check-label" for="inlineRadio22">Sedikit grogi, sulit
                                berkonsentrasi</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waspada" id="inlineRadio23">
                            <label class="form-check-label" for="inlineRadio23">Mengantuk, grogi, ingin berbaring</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><b>Apakah Anda memiliki stres, masalah kesehatan atau
                                masalah pribadi lainnya yang secara signifikan mempengaruhi konsentrasi dan
                                / atau tidur Anda?</b>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stress1" id="inlineRadio24"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio24">Ya</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stress1" id="inlineRadio25"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio25">Tidak</label>
                        </div>
                    </div>
                </div><br>

            </form>
        </div>

    </div>
    <div class="card border-left-primary shadow">
        <div class="card-header bg-primary-gradient py-3">
            <h6 class="m-0 font-weight-bold text-white">JAM KERJA</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label"><b>Berapa lama Anda bekerja hari sebelumnya?</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio26">
                            <label class="form-check-label" for="inlineRadio26">Masuk kerja lebih dari 12 jam</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio27">
                            <label class="form-check-label" for="inlineRadio27">Masuk kerja lebih dari 8 jam - 12
                                jam</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jamkerja" id="inlineRadio28">
                            <label class="form-check-label" for="inlineRadio28">Mengantuk, grogi, ingin berbaring</label>
                        </div>
                    </div>
                </div><br>
            </form>
        </div>
    </div>
    <div class="card border-left-primary shadow mb-4">
        <div class="card-header bg-primary-gradient py-3">
            <h6 class="m-0 font-weight-bold text-white"> KESEHATAN</h6>
        </div>
        <div class="form-kuesioner">
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label"><b>Keluhan yang Dirasakan Saat ini:</b></label>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>a.</strong> Pusing</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan1" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan1" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>b.</strong> Mengantuk</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan2" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan2" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>c.</strong> Lemas</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan3" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan3" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>d.</strong> Mual Muntah</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan4" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan4" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>e.</strong> Flu dan Meriang</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan5" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keluhan5" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label"><b>Tes Kesiapan Berkendara (Tes WAT)</b></label><br>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A1 :</strong> Berjalan Keluar Garis</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat1" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat1" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A2 :</strong> Tidak seimbang / sempoyongan</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat2" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat2" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A3 : </strong>Berhenti untuk menyeimbangkan diri</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat3" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat3" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A4 :</strong> Tidak seimbang ketika ada stimulus suara
                            perintah</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat4" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat4" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A5 :</strong> Tumit & ujung kaki tidak rapat saat
                            berjalan</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat5" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat5" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A6 :</strong> Merentangkan tangan untuk menjaga
                            keseimbangan</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat6" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat6" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A7 :</strong> Tidak mampu memutar pada satu kaki</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat7" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat7" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>A8 :</strong> Tidak mampu menghitung/salah hitungan
                            langkah saat
                            jalan</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat8" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wat8" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label"><b>Tes Kesiapan Berkendara (Tes OLS)</b></label><br>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>B1 : </strong>Selalu bergoyang/tidak seimbang</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols1" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols1" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>B2 :</strong> Merentangkan tangan untuk menjaga
                            keseimbangan</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols2" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols2" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>B3 :</strong> Kaki tumpuan bergerak secara tidak
                            teratur</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols3" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols3" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md">
                        <label class="form-label-option"><strong>B4 :</strong> Kaki yang di angkat jatuh sebelum 20
                            detik</label>
                    </div>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols4" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ols4" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                </div><br><hr>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <h5><strong>Tes Kesiapan Berkendara (Tes OLS)</strong></h5>

                        <div class="row mb-2">
                            <div class="col-md-8">
                                <p><strong>B1:</strong> Selalu bergoyang/tidak seimbang</p>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="b1" value="ya"> Ya
                                <input type="radio" name="b1" value="tidak"> Tidak
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-8">
                                <p><strong>B2:</strong> Merentangkan tangan untuk menjaga keseimbangan</p>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="b2" value="ya"> Ya
                                <input type="radio" name="b2" value="tidak"> Tidak
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-8">
                                <p><strong>B3:</strong> Kaki tumpuan bergerak secara tidak teratur</p>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="b3" value="ya"> Ya
                                <input type="radio" name="b3" value="tidak"> Tidak
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form><br>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection
