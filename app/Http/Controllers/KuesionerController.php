<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    // Validasi input
    public function index(){
        return view('personnel.kuesioner');
    }
    public function storeKuesioner( Request $request){
        return $request;
        $request->validate([
            'date' => 'required|date',
            'shift' => 'required|string',
        ]);

        // Ambil user ID
        $userId = Auth::id();

        // Mapping data dari request ke kolom tabel
        // $data = [
        //     'user_id' => $userId,
        //     'date' => $request->date,
        //     'shift' => $request->shift,
        //     'Q1' => $request->keluhan1,
        //     'Q2' => $request->keluhan2,
        //     'Q3' => $request->keluhan3,
        //     'Q4' => $request->keluhan4,
        //     'QO1' => $request->keluhan5,
        //     'QO2' => $request->wat1,
        //     'QO3' => $request->wat2,
        //     'QO4' => $request->wat3,
        //     'QO5' => $request->wat4,
        //     'Q5' => $request->wat5,
        //     'Q6' => $request->wat6,
        //     'Q7' => $request->wat7,
        //     'QK1' => $request->wat8,
        //     'QK2' => $request->ols1,
        //     'QK3' => $request->ols2,
        //     'QK4' => $request->ols3,
        //     'QA1' => $request->ols4,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ];

        // Insert ke database
        $insertedId = DB::table('hasil_kuisioners')->insertGetId($data);

        // Ambil data yang baru saja disimpan
        $insertedData = DB::table('hasil_kuisioners')->where('id', $insertedId)->first();

        // Response JSON
        return response()->json([
            'message' => 'Data kuisioner berhasil disimpan.',
            'data' => $insertedData
        ]);

    }
}
