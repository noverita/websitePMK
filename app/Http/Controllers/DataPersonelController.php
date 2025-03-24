<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataPersonelController extends Controller
{
    public function create()
    {
        return view('admin.datapersonel');
    }

    public function storeData(Request $request)
    {
        DB::table('data_personnels')->insert([
            'user_id' => $request->user_id ?? 1, // Default user_id = 1 if not provided
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto_diri' => $request->foto_diri,
            'grade' => $request->grade,
            'whatsapp' => $request->whatsapp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/admin/daftar-personel')->with('success', 'Data personel berhasil disimpan!');
    }

    // Method to show edit form
    public function editData($id)
    {
        // Fetch the personnel record by ID
        $personel = DB::table('data_personnels')->where('id', $id)->first();

        if (!$personel) {
            return redirect('/admin/daftar-personel')->with('error', 'Data personel tidak ditemukan!');
        }

        return view('admin.update-datapersonel', compact('personel'));
    }

    // Method to update personnel data
    public function updateData(Request $request, $id)
    {
        // Fetch the current personnel record
        $personel = DB::table('data_personnels')->where('id', $id)->first();

        // Check if a new file is uploaded
        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');
        } else {
            // If no new file is uploaded, keep the old foto_diri
            $filePath = $personel->foto_diri;
        }

        DB::table('data_personnels')->where('id', $id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'grade' => $request->grade,
            'whatsapp' => $request->whatsapp,
            'foto_diri' => $filePath, // Keeps old file if no new one is uploaded
            'updated_at' => now(),
        ]);

        return redirect('/admin/daftar-personel')->with('success', 'Data personel berhasil diperbarui!');
    }
    public function destroyData($id)
    {
        // Find the personnel record by ID
        $personel = DB::table('data_personnels')->where('id', $id)->first();

        // If personnel not found, return with an error message
        if (!$personel) {
            return redirect('/admin/daftar-personel')->with('error', 'Data personel tidak ditemukan!');
        }

        // Delete the record from the database
        DB::table('data_personnels')->where('id', $id)->delete();

        // Redirect back to the personnel list with a success message
        return redirect('/admin/daftar-personel')->with('success', 'Data personel berhasil dihapus!');
    }
    public function showProfile($id)
    {
        // Fetch personnel data based on ID
        $personel = DB::table('data_personnels')->where('id', $id)->first();

        // Check if personnel exists
        if (!$personel) {
            return redirect()->back()->with('error', 'Personnel data not found.');
        }

        return view('admin.profil-personel', compact('personel'));
    }
}
