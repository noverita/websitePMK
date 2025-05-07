<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function index()
    {
        return view('personnel.dashboard');
    }
    public function profile(){
        return view('personnel.profile');
    }
}
