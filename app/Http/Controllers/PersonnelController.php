<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PersonnelController extends Controller
{
    public function index()
    {
        $rows = DB::table('hasil_kuisioners')->get()->map(function ($row) {
            $keys = [
                'tidur24', 'tidur48', 'obat',
                'sideeffect1', 'sideeffect2', 'sideeffect3', 'sideeffect4', 'sideeffect5',
                'waspada', 'stress1', 'jamkerja',
                'keluhan1', 'keluhan2', 'keluhan3', 'keluhan4', 'keluhan5'
            ];

            $total = collect($keys)->sum(function ($key) use ($row) {
                return (int) $row->$key;
            });

            $row->tingkat_kebugaran = $total;

            // Klasifikasi status kebugaran
            if ($total > 35) {
                $row->status_kebugaran = 'Dapat Bekerja';
            } elseif ($total >= 20) {
                $row->status_kebugaran = 'Dapat Bekerja Dalam Pengawasan';
            } else {
                $row->status_kebugaran = 'Tidak Dapat Bekerja';
            }

            // Format tanggal ke format Indonesia
            $row->tanggal_indonesia = Carbon::parse($row->date)->locale('id')->translatedFormat('d F Y');

            $warningKeys = ['wat1', 'wat2', 'wat3', 'wat4', 'wat5', 'wat6', 'wat7', 'wat8',
                    'ols1', 'ols2', 'ols3', 'ols4'];

            $firetruck = collect($warningKeys)->contains(function ($key) use ($row) {
                return (int) $row->$key === 1;
            });

            $row->rekomendasi_firetruck = $firetruck ? 'Tidak Disarankan Mengendarai Firetruck' : 'Aman';

            return $row;
        });
        $no = 1;
        return view('personnel.dashboard', compact('rows', 'no'));
    }

    public function profile(){
        return view('personnel.profile');
    }
}
