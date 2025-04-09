<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function showUserManagement(){
		return view('admin.user-management');
	}

    public function createUserManagement(){
        return view('admin.create-usermanagement');
    }
}
