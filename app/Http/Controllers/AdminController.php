<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminDashboard');
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.profile')->with('user', $user);
    }
}
