<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPersonelController extends Controller
{
    public function listPersonel(){
		return view('listpersonel');
	}
}
