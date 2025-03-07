<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPersonelController extends Controller
{
    public function laporanPersonel(){
		return view('admin.laporan-personel');
	}
}
