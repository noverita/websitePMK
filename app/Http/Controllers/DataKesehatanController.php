<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKesehatanController extends Controller
{
    public function showDataKesehatan(){
		return view('admin.data-kesehatan');
	}

    public function createDataKesehatan(){
        return view('admin.create-datakesehatan');
    }
}
