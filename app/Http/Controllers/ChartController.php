<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function getByShift(Request $request)
    {
        $shift = $request->query('shift');
        $query = DB::table('hasil_kuisioners')
            ->join('users', 'hasil_kuisioners.user_id', '=', 'users.id')
            ->whereDate('hasil_kuisioners.date', now());

        if ($shift && $shift !== 'all') {
            $query->where('hasil_kuisioners.shift', $shift);
        }

        $results = $query->select('users.name', 'hasil_kuisioners.tingkat_kebugaran')
            ->orderBy('hasil_kuisioners.created_at', 'desc')
            ->get();

        return response()->json($results);

    }

    public function getReportYear(){
        $report = DB::table('hasil_kuisioners')
        ->select(DB::raw('YEAR(date) as year'), DB::raw('COUNT(*) as total'))
        ->groupBy('year')
        ->orderBy('year')
        ->get();

        $labels = $report->pluck('year');
        $data = $report->pluck('total');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
    public function getFitnessReport(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $excellent = [];
        $good = [];
        $kurangFit = [];

        foreach (range(1, 12) as $bulan) {
            $excellent[] = DB::table('hasil_kuisioners')
                ->whereYear('date', $tahun)
                ->whereMonth('date', $bulan)
                ->where('tingkat_kebugaran', 'Excellent')
                ->count();

            $good[] = DB::table('hasil_kuisioners')
                ->whereYear('date', $tahun)
                ->whereMonth('date', $bulan)
                ->where('tingkat_kebugaran', 'Good')
                ->count();

            $kurangFit[] = DB::table('hasil_kuisioners')
                ->whereYear('date', $tahun)
                ->whereMonth('date', $bulan)
                ->where('tingkat_kebugaran', 'Kurang Fit')
                ->count();
        }

        return response()->json([
            'labels' => $labels,
            'excellent' => $excellent,
            'good' => $good,
            'kurang_fit' => $kurangFit
        ]);
    }

}
