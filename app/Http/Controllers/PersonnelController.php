<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
    public function index()
    {
        $rows = DB::table('hasil_kuisioners')->where('user_id',Auth::id())->get()->map(function ($row) {
            $row->tanggal_indonesia = Carbon::parse($row->date)->locale('id')->translatedFormat('d F Y');

            $warningKeys = ['wat1', 'wat2', 'wat3', 'wat4', 'wat5', 'wat6', 'wat7', 'wat8',
                    'ols1', 'ols2', 'ols3', 'ols4'];

            $firetruck = collect($warningKeys)->contains(function ($key) use ($row) {
                return (int) $row->$key === 1;
            });

            $row->rekomendasi_firetruck = $firetruck ? 'Tidak Disarankan Mengendarai Firetruck' : 'Dapat Mengendarai Firetruck';

            return $row;
        });
        $no = 1;
        return view('personnel.dashboard', compact('rows', 'no'));
    }

    public function profile(){
        return view('personnel.profile');
    }
}
