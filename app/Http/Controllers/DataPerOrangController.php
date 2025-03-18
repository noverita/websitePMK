<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPerOrangController extends Controller
{
    public function profilpersonel()
    {
        return view('admin.profil-personel');
    }

    public function sertifikasipersonel()
    {
        return view('admin.sertifikasi-personel');
    }

    public function pelatihanpersonel()
    {
        $pelatihans = DB::table('pelatihans')->get();
        return view('admin.pelatihan-personel', ['pelatihans' => $pelatihans]);
    }
}
