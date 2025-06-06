<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KuesionerController extends Controller
{
    // Validasi input
    public function index(){
        $sideEffects = [
            ['label' => 'a. Sedatif', 'name' => 'sideeffect1', 'id' => 'sedatif'],
            ['label' => 'b. Kepala Berputar (Dizziness)', 'name' => 'sideeffect2', 'id' => 'dizziness'],
            ['label' => 'c. Mual', 'name' => 'sideeffect3', 'id' => 'mual'],
            ['label' => 'd. Hilang Konsentrasi', 'name' => 'sideeffect4', 'id' => 'konsentrasi'],
            ['label' => 'e. Tidak Ada Efek Samping', 'name' => 'sideeffect5', 'id' => 'tidakefek'],
        ];
        $keluhan = [
            ['key' => 'pusing', 'label' => 'a. Pusing', 'ya_value' => 1],
            ['key' => 'mengantuk', 'label' => 'b. Mengantuk', 'ya_value' => 1],
            ['key' => 'lemas', 'label' => 'c. Lemas', 'ya_value' => 1],
            ['key' => 'mual', 'label' => 'd. Mual Muntah', 'ya_value' => 2],
            ['key' => 'flu', 'label' => 'e. Flu dan Meriang', 'ya_value' => 1],
        ];
        $watQuestions = [
            'A1' => 'Berjalan keluar garis',
            'A2' => 'Tidak seimbang / sempoyongan',
            'A3' => 'Berhenti untuk menyeimbangkan diri',
            'A4' => 'Tidak seimbang ketika ada stimulus suara perintah',
            'A5' => 'Tumit & ujung kaki tidak rapat saat berjalan',
            'A6' => 'Merentangkan tangan untuk menjaga keseimbangan',
            'A7' => 'Tidak mampu memutar pada satu kaki',
            'A8' => 'Tidak mampu menghitung/salah hitungan langkah saat jalan',
        ];
        $olsQuestions = [
            'B1' => 'Selalu bergoyang / tidak seimbang',
            'B2' => 'Merentangkan tangan untuk menjaga keseimbangan',
            'B3' => 'Kaki tumpuan bergerak secara tidak teratur',
            'B4' => 'Kaki yang diangkat jatuh sebelum 20 detik',
        ];
        return view('personnel.kuesioner', compact('sideEffects','keluhan','watQuestions','olsQuestions'));
    }

    public function storeKuesioner(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'shift' => 'required|string',
            'tidur24' => 'required|numeric',
            'tidur48' => 'required|numeric',
            'obat' => 'required|numeric',
            'keterangan_obat' => 'nullable|string',
            'sideeffect1' => 'nullable|numeric',
            'sideeffect2' => 'nullable|numeric',
            'sideeffect3' => 'nullable|numeric',
            'sideeffect4' => 'nullable|numeric',
            'sideeffect5' => 'nullable|numeric',
            'waspada' => 'required|numeric',
            'stress1' => 'required|numeric',
            'jamkerja' => 'required|numeric',
            'keluhan1' => 'required|numeric',
            'keluhan2' => 'required|numeric',
            'keluhan3' => 'required|numeric',
            'keluhan4' => 'required|numeric',
            'keluhan5' => 'required|numeric',
            'wat1' => 'required|numeric',
            'wat2' => 'required|numeric',
            'wat3' => 'required|numeric',
            'wat4' => 'required|numeric',
            'wat5' => 'required|numeric',
            'wat6' => 'required|numeric',
            'wat7' => 'required|numeric',
            'wat8' => 'required|numeric',
            'ols1' => 'required|numeric',
            'ols2' => 'required|numeric',
            'ols3' => 'required|numeric',
            'ols4' => 'required|numeric',
        ]);

        // Default value 3 untuk side effect yang tidak diisi
        $sideEffects = ['sideeffect1', 'sideeffect2', 'sideeffect3', 'sideeffect4', 'sideeffect5'];
        foreach ($sideEffects as $field) {
            if (!isset($validatedData[$field])) {
                $validatedData[$field] = 3;
            }
        }

        // Hitung total skor
        $fieldsToSum = [
            'tidur24','tidur48','obat',
            'sideeffect1','sideeffect2','sideeffect3','sideeffect4','sideeffect5',
            'waspada','stress1','jamkerja',
            'keluhan1','keluhan2','keluhan3','keluhan4','keluhan5'
        ];

        $score = 0;
        foreach ($fieldsToSum as $field) {
            $score += (int) $validatedData[$field];
        }

        // Klasifikasi tingkat kebugaran berdasarkan skor
        if ($score >= 35) {
            $tingkatKebugaran = 'Excellent';
        } elseif ($score >= 20) {
            $tingkatKebugaran = 'Good';
        } else {
            $tingkatKebugaran = 'Kurang fit';
        }

        try {
            DB::table('hasil_kuisioners')->insert(array_merge($validatedData, [
                'user_id' => Auth::id(),
                'tingkat_kebugaran' => $tingkatKebugaran,
                'created_at' => now(),
                'updated_at' => now(),
            ]));

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


}
