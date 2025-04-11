<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $personel = DB::table('data_personnels')->where('user_id', $id)->first();

        if (!$personel) {
            return redirect('/admin/daftar-personel')->with('error', 'Data personel tidak ditemukan!');
        }

        return view('admin.update-datapersonel', compact('personel'));
    }

    public function updateData(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'nik'            => 'string|max:25',
            'tanggal_lahir'  => 'date',
            'grade'          => 'string|max:5',
            'whatsapp'       => 'string|max:20',
            'status_pegawai' => 'in:Organik,Non-Organik',
            'foto_diri'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $personel = DB::table('data_personnels')->where('user_id', $id)->first();

        if (!$personel) {
            return redirect()->back()->with('error', 'Data profil tidak ditemukan.');
        }

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $fileName = date('Ymd') .$validated['nama_lengkap']. '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');

            if ($personel->foto_diri && Storage::disk('public')->exists($personel->foto_diri)) {
                Storage::disk('public')->delete($personel->foto_diri);
            }
        } else {
            $filePath = $personel->foto_diri;
        }

        DB::beginTransaction();

        try {
            $dataUpdate = [
                'nama_lengkap'   => $validated['nama_lengkap'],
                'nik'            => $validated['nik'],
                'tanggal_lahir'  => $validated['tanggal_lahir'],
                'grade'          => $validated['grade'],
                'whatsapp'       => $validated['whatsapp'],
                'status_pegawai' => $validated['status_pegawai'],
                'foto_diri'      => $filePath,
                'updated_at'     => now(),
            ];
            DB::table('data_personnels')->where('user_id', $id)->update($dataUpdate);
            DB::table('users')->where('id', $id)->update(['name'   => $validated['nama_lengkap']]);
            DB::commit();
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();

            if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            Log::error('Gagal memperbarui profil: '.$e->getMessage());
            Log::error('Error File Path: ' . $filePath);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
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

        $personel = DB::table('data_personnels')
            ->join('users', 'data_personnels.user_id', '=', 'users.id')
            ->where('data_personnels.user_id', $id)
            ->select('data_personnels.*', 'users.email', 'users.role') // tambahkan kolom dari users jika perlu
            ->first();


        if (!$personel) {
            return redirect()->back()->with('error', 'Personnel data not found.');
        }
        $sertifikat = DB::table('sertifikasis')
        ->where('user_id', $id)
        ->get()
        ->map(function ($row) {
            if (now()->gt($row->expired_date)) {
                $row->status = 'Expired';
            } elseif (now()->diffInDays($row->expired_date) <= 30) {
                $row->status = 'Expiring Soon';
            } else {
                $row->status = 'Valid';
            }
            return $row;
        });


        $pelatihan = DB::table('pelatihans')
        ->where('user_id', $id)
        ->get();

        return view('admin.profil-personel', compact('personel', 'sertifikat', 'pelatihan'));
    }

    //sertifikasi
    public function showSertifikasi($user_id)
    {
    $personel = DB::table('data_personnels')->where('id', $user_id)->first();
    if (!$personel) {
        return redirect()->back()->with('error', 'Personnel data not found.');
    }
    // return $personel;
    $sertifikasis = DB::table('sertifikasis')
        ->where('user_id', $user_id)
        ->get()
        ->map(function ($sertifikasi) {
            $sertifikasi->status = Carbon::parse($sertifikasi->expired_date)->isFuture() ? 'Berlaku' : 'Tidak Berlaku';
            return $sertifikasi;
        });

    return view('admin.sertifikasi-personel', compact('personel', 'sertifikasis'));
}
    public function createSertifikasi($id)
    {
        return view('admin.create-sertifikasi', compact('id'));
    }

    public function storeSertifikasi(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_sertifikasi' => 'required|string|max:255',
            'jenis_lisensi' => 'required|string|max:50',
            'skp_pt' => 'required',
            'expired_date' => 'required|date|after:today',
            'file_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $userId = $validated['user_id'];
        $user = DB::table('data_personnels')
            ->select('nama_lengkap')
            ->where('user_id', $userId)
            ->first();
        $userName = Str::slug($user->nama_lengkap ?? 'unknown_user');


        DB::beginTransaction();
        try {

            $timestamp = now()->format('Ymd');
            $extension = $request->file('file_sertifikat')->getClientOriginalExtension();

            $filename = "{$timestamp}_{$validated['nama_sertifikasi']}.{$extension}";
            $path = $request->file('file_sertifikat')->storeAs("sertifikat/{$userName}", $filename, 'public');

            DB::table('sertifikasis')->insert([
                'user_id' => $validated['user_id'],
                'nama_sertifikasi' => $validated['nama_sertifikasi'],
                'jenis_lisensi' => $validated['jenis_lisensi'],
                'skp_pt' => $validated['skp_pt'],
                'expired_date' => $validated['expired_date'],
                'file_sertifikat' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();

            return redirect()->back()->with('success', 'Data Sertifikasi berhasil disimpan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            if (isset($path) && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            Log::error('Gagal menyimpan sertifikat: '.$e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    //pelatihan
    public function showPelatihan($user_id)
    {
        $personel = DB::table('data_personnels')->where('user_id', $user_id)->first();

        if (!$personel) {
            return redirect()->back()->with('error', 'Personnel data not found.');
        }

        $pelatihans = DB::table('pelatihans')
            ->where('user_id', $user_id)
            ->get();

        return view('admin.pelatihan-personel', compact('personel', 'pelatihans'));
    }
    public function createPelatihan($id){

        return view('admin.create-pelatihan', compact('id'));
    }

    public function storePelatihan(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_pelatihan' => 'required|string|max:255',
            'penyelanggara' => 'required|string|max:50',
            'date_pelatihan' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
        DB::table('pelatihans')->insert([
                'user_id' => $validated['user_id'],
                'nama_pelatihan' => $validated['nama_pelatihan'],
                'penyelanggara' => $validated['penyelanggara'],
                'date_pelatihan' =>$validated['date_pelatihan'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data Pelatihan berhasil disimpan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }

    }

}
