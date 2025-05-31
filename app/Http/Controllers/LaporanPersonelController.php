<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class LaporanPersonelController extends Controller
{
    public function laporanPersonel()
    {
        $rows = DB::table('hasil_kuisioners')
            ->join('users', 'hasil_kuisioners.user_id', '=', 'users.id')
            ->select('hasil_kuisioners.*', 'users.name as user_name')
            ->get()
            ->map(function ($row) {

                // Format tanggal ke format Indonesia
                $row->tanggal_indonesia = Carbon::parse($row->date)->locale('id')->translatedFormat('d F Y');

                $warningKeys = [
                    'wat1',
                    'wat2',
                    'wat3',
                    'wat4',
                    'wat5',
                    'wat6',
                    'wat7',
                    'wat8',
                    'ols1',
                    'ols2',
                    'ols3',
                    'ols4'
                ];

                $firetruck = collect($warningKeys)->contains(function ($key) use ($row) {
                    return (int) $row->$key === 1;
                });

                $row->rekomendasi_firetruck = $firetruck ? 'Tidak Disarankan Mengendarai Firetruck' : 'Dapat Mengendarai Firetruck';

                return $row;
            });
        $no = 1;
        return view('admin.laporan-personel', compact('rows', 'no'));
    }

    public function destroy($id)
    {
        try {
            DB::table('hasil_kuisioners')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
