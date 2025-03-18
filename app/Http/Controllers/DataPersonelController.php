<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPersonelController extends Controller
{
    public function create()
    {
        return view('admin.datapersonel');
    }

    // STORE PELATIHAN DATA
    public function storePelatihan(Request $request)
    {

        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'penyelanggara' => 'required|string|max:255',
            'date_pelatihan' => 'required|date',
        ]);

        DB::table('pelatihans')->insert([
            'user_id' => auth()->id(),
            'nama_pelatihan' => $request->nama_pelatihan,
            'penyelanggara' => $request->penyelanggara,
            'date_pelatihan' => $request->date_pelatihan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pelatihan.personel')->with('success', 'Data pelatihan berhasil disimpan!');
    }

    // STORE SERTIFIKASI DATA
    public function storeSertifikasi(Request $request)
    {

        $request->validate([
            'nama_sertifikasi' => 'required|string|max:255',
            'jenis_lisensi' => 'required|string|max:255',
            'skp_pt' => 'required|integer',
            'expired_date' => 'required|date',
            'file_sertifikat' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'status_sertifikat' => 'required|in:Aktif,Tidak Berlaku',
        ]);

        // Handle file upload
        if ($request->hasFile('file_sertifikat')) {
            $file = $request->file('file_sertifikat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('sertifikat_files', $fileName, 'public');
        } else {
            $filePath = null;
        }
        $saveData =[
            'user_id' => auth()->id(),
            'nama_sertifikasi' => $request->nama_sertifikasi,
            'jenis_lisensi' => $request->jenis_lisensi,
            'skp_pt' => $request->skp_pt,
            'expired_date' => $request->expired_date,
            'file_sertifikat' => $filePath,
            'status_sertfikat' => $request->status_sertifikat,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('sertifikasis')->insert($saveData);

        return redirect()->route('admin.sertifikasi-personel')->with('success', 'Data sertifikasi berhasil disimpan!');
    }
}
