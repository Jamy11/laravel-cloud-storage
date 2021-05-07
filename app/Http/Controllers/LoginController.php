<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function verify(Request $req)
    {
        $req->validate([
            'email' => 'required|min:8|max:40|email:rfc',
            'password' => 'required|min:4|max:20',
        ]);

        $credentials = $req->only('email', 'password');

        $user = User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])->first();

        if($user)
        {
            //Auth::login($user);
            return view('admin.dashboard')->with('user',$user);
        }
        else{
            return back()->withErrors([
                'error'=>'The provided credentials do not match our records.',
            ]);
        }
    }
}
