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
        // Fetch personnel data based on user_id
        $personel = DB::table('data_personnels')->where('user_id', $user_id)->first();

        if (!$personel) {
            return redirect()->back()->with('error', 'Personnel data not found.');
        }

        // Fetch all certifications linked to the user_id
        $sertifikasis = DB::table('sertifikasis')
            ->where('user_id', $user_id)
            ->get()
            ->map(function ($sertifikasi) {
                $today = Carbon::today();
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

    public function storeSertifikasi(Request $request)
    {
        // Validate request
        $request->validate([
            'user_id' => 'required|exists:data_personnels,user_id', // Ensure user_id exists
            'nama_sertifikasi' => 'required|string',
            'jenis_lisensi' => 'required|string',
            'skp_pt' => 'required|integer',
            'expired_date' => 'required|date',
            'file_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // 'status_sertifikat' => 'required|in:Aktif,Tidak Berlaku',
        ]);

        // Get the personnel using the user_id
        $personel = DB::table('data_personnels')->where('user_id', $request->user_id)->first();

        if (!$personel) {
            return back()->with('error', 'Personnel not found.');
        }
        // Upload the file
        $filePath = null;
        if ($request->hasFile('file_sertifikat')) {
            $file = $request->file('file_sertifikat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('sertifikasis', $fileName, 'public');
        }

        // Insert Sertifikasi data linked to user_id
        DB::table('sertifikasis')->insert([
            'user_id' => $personel->user_id,
            'nama_sertifikasi' => $request->nama_sertifikasi,
            'jenis_lisensi' => $request->jenis_lisensi,
            'skp_pt' => $request->skp_pt,
            'expired_date' => $request->expired_date,
            'file_sertifikat' => $filePath,
            // 'status_sertifikat' => $request->status_sertifikat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to this personnel's certification page
        return redirect()->route('sertifikasi.personel', ['user_id' => $personel->user_id])
                         ->with('success', 'Sertifikasi berhasil ditambahkan!');
    }
}
