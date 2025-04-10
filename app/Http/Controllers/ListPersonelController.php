<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ListPersonelController extends Controller
{
    public function listPersonel()
    {
    	// Mengambil data dari tabel data_personnels
        $dataPersonels = DB::table('data_personnels')->get();

        return view('admin.listpersonel', ['dataPersonels' => $dataPersonels]);

    }
}
