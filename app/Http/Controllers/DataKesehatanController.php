<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'year' => 'required|string',
            'hasil_kesehatan' => 'required|string',
            'catatan_kesehatan' => 'nullable|string',
            'surat_keterangan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        if ($request->hasFile('surat_keterangan')) {
            $user = DB::table('users')->where('id', $validatedData['user_id'])->first();
            $namaUser = $user ? str_replace(' ', '_', strtolower($user->name)) : 'user';

            $fileExtension = $request->file('surat_keterangan')->getClientOriginalExtension();
            $fileName = $namaUser . '_' . $validatedData['year'] . '.' . $fileExtension;

            $filePath = $request->file('surat_keterangan')->storeAs('surat_keterangan', $fileName, 'public');
        }

        try {
            DB::beginTransaction();
            DB::table('kesehatans')->insert([
                'user_id' => $validatedData['user_id'],
                'year' => $validatedData['year'],
                'hasil_kesehatan' => $validatedData['hasil_kesehatan'],
                'catatan_kesehatan' => $validatedData['catatan_kesehatan'],
                'surat_keterangan' => $filePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan data user dan personnel: ' . $e->getMessage());

            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data'], 500);
        }

    }
    public function destroyDataKesehatan($id)
    {
        try {
            DB::beginTransaction();
            $data = DB::table('kesehatans')->where('id', $id)->first();

            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            if ($data->surat_keterangan && Storage::disk('public')->exists($data->surat_keterangan)) {
                Storage::disk('public')->delete($data->surat_keterangan);
            }

            DB::table('kesehatans')->where('id', $id)->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menghapus data kesehatan: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

}
