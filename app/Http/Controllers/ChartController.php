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
}
