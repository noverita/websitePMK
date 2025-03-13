<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPerOrangController extends Controller
{
    public function profilpersonel(){
		return view('admin.profil-personel');
	}
    public function sertifikasipersonel(){
		return view('admin.sertifikasi-personel');
	}
    public function pelatihanpersonel(){
		return view('admin.pelatihan-personel');
	}
}
