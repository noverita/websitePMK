<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SertifikasiController extends Controller
{
    public function showSertifikasi($user_id)
    {
    $personel = DB::table('data_personnels')->where('user_id', $user_id)->first();

    if (!$personel) {
        return redirect()->back()->with('error', 'Personnel data not found.');
    }

    $sertifikasis = DB::table('sertifikasis')
        ->where('user_id', $user_id)
        ->get()
        ->map(function ($sertifikasi) {
            $sertifikasi->status = Carbon::parse($sertifikasi->expired_date)->isFuture() ? 'Berlaku' : 'Tidak Berlaku';
            return $sertifikasi;
        });

    return view('admin.sertifikasi-personel', compact('personel', 'sertifikasis'));
}


    public function store(Request $request)
    {
        // Ensure the sertifikasi record is linked to the correct user_id
        DB::table('sertifikasis')->insert([
            'user_id' => $request->user_id, // Ensures sertifikasi is linked to the correct personnel
            'nama_sertifikasi' => $request->nama_sertifikasi,
            'jenis_lisensi' => $request->jenis_lisensi,
            'skp_pt' => $request->skp_pt,
            'expired_date' => $request->expired_date,
            'file_sertifikat' => $request->file_sertifikat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    public function storeSertifikasi(Request $request, $user_id)
    {
        // Ensure a valid user_id is provided
        $request->validate([
            'user_id' => 'required|exists:data_personnels,user_id',
            'nama_sertifikasi' => 'required|string',
            'jenis_lisensi' => 'required|string',
            'date_expired' => 'required|date',
        ]);

        // Insert certification data for the selected personnel
        DB::table('sertifikasis')->insert([
            'user_id' => $request->user_id, // Ensure it's stored under the right person
            'nama_sertifikasi' => $request->nama_sertifikasi,
            'jenis_lisensi' => $request->jenis_lisensi,
            'date_expired' => $request->date_expired,
            'created_at' => now(),
        ]);

        return redirect()->route('sertifikasi.store', ['user_id' => $request->user_id])
                         ->with('success', 'Sertifikasi berhasil ditambahkan!');
    }
}
