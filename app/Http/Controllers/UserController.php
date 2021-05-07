<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.userDashboard');
    }
    public function privateFolder()
    {
        return view('user.privateFolder');
    }
}
