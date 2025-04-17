<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DataKesehatanController extends Controller
{
    public function showDataKesehatan(){
        $data = DB::table('kesehatans')
        ->join('data_personnels', 'data_personnels.user_id', '=', 'kesehatans.user_id')
        ->select(
            'kesehatans.*',
            'data_personnels.nama_lengkap'
        )
        ->get();

    return view('admin.data-kesehatan', compact('data'));
	}

    public function createDataKesehatan(){
        $personnels = DB::table('data_personnels')->get();
        return view('admin.create-datakesehatan', compact('personnels'));
    }

    public function storeDataKesehatan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'year' => 'required|string',
            'hasil_kesehatan' => 'required|string',
            'catatan_kesehatan' => 'nullable|string',
            'surat_keterangan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('surat_keterangan')->store('surat_keterangan', 'public');

        DB::table('kesehatans')->insert([
            'user_id' => $request->user_id,
            'year' => $request->year,
            'hasil_kesehatan' => $request->hasil_kesehatan,
            'catatan_kesehatan' => $request->catatan_kesehatan,
            'surat_keterangan' => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kesehatan.create')->with('success', 'Data berhasil ditambahkan!');
    }

}
