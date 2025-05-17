<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

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

    return view('admin.dashboard', compact('kesehatanStats', 'fitnessStats'));
}


}
