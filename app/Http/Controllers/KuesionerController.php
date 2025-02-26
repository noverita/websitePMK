<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function kuesioner(){
		return view('personnel.kuesioner');
	}
}
