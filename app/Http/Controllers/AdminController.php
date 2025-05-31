<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $results = DB::table('kesehatans')
            ->select('year', 'hasil_kesehatan', DB::raw('COUNT(*) as total'))
            ->groupBy('year', 'hasil_kesehatan')
            ->get();

        $kesehatanStats = [];
        foreach ($results as $item) {
            $kesehatanStats[$item->year][] = $item;
        }

        // --- Tingkat Kebugaran Chart ---
        $fitnessResults = DB::table('hasil_kuisioners')
            ->select(
                DB::raw('YEAR(date) as year'),
                DB::raw('MONTH(date) as month'),
                'tingkat_kebugaran',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('tingkat_kebugaran')
            ->groupBy(DB::raw('YEAR(date)'), DB::raw('MONTH(date)'), 'tingkat_kebugaran')
            ->get();

        $fitnessStats = [];
        foreach ($fitnessResults as $row) {
            $fitnessStats[$row->year][$row->tingkat_kebugaran][$row->month] = $row->total;
        }
         $today = Carbon::today();
        //menampilkan statistik
        $laporanCount = DB::table('hasil_kuisioners')
        ->whereDate('date', $today)
        ->count();

        // Kategori + atribut visual
        $categories = [
            'Excellent'    => ['icon' => 'fa-fire-alt', 'label' => 'Excellent'],
            'Good'         => ['icon' => 'fa-thumbs-up', 'label' => 'Good'],
            'Kurang fit'   => ['icon' => 'fa-stethoscope', 'label' => 'Kurang Fit'],
        ];

        // Hitung per kategori
        $kategoriCounts = DB::table('hasil_kuisioners')
            ->select('tingkat_kebugaran', DB::raw('count(*) as total'))
            ->whereDate('date', $today)
            ->groupBy('tingkat_kebugaran')
            ->pluck('total', 'tingkat_kebugaran');

        // Gabungkan data
        $statistik = [];
        foreach ($categories as $key => $config) {
            $statistik[] = [
                'count' => $kategoriCounts[$key] ?? 0,
                'icon' => $config['icon'],
                'label' => $config['label'],
            ];
        }

        //menampilkan shift all
        $shiftAll = DB::table('hasil_kuisioners')
            ->join('users', 'hasil_kuisioners.user_id', '=', 'users.id')
            ->whereDate('hasil_kuisioners.date', Carbon::today())
            ->select('users.name', 'hasil_kuisioners.shift', 'hasil_kuisioners.tingkat_kebugaran')
            ->orderBy('hasil_kuisioners.created_at', 'desc')
            ->get();

        $years = DB::table('hasil_kuisioners')
            ->selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('admin.dashboard', compact(
                'kesehatanStats',
                'fitnessStats',
                'laporanCount',
                'statistik',
                'shiftAll',
                'years'
            ));
    }
}
