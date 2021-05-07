<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //sign in view function
    public function signInIndex()
    {
        # code...
        return view('auth.signIn');
    }

    //sign in check function
    public function signInCheck(Request $req)
    {
        $req->validate([
            'email' => 'required|min:8|max:40|email:rfc',
            'password' => 'required|min:4|max:20',
        ]);

        $credentials = $req->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            //dd(Auth::user());
            return view('admin.dashboard');
        }
        else{
            return back()->withErrors([
                'error'=>'The provided credentials do not match our records.',
            ]);
        }

    }


    //sign up view function
    public function signUpIndex()
    {
        return view('auth.signUp');
    }

    //sign up check function
    public function signUpCheck(Request $req)
    {

        $req->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|email:rfc|unique:users',
            'password'=>'required|min:4|max:20',
            'confirm_password'=>'required_with:password|same:password|min:4|max:20',
            'address'=>'required',
            'phone'=>'',
            'image'=>'image',
        ]);
        $user = new User;

        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password =Hash::make($req->password) ;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->role_id = 2;

        if($req->hasFile('image'))
        {
            $image = $req->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = date('y-m-d').time() . '.' . $extension;
            $image->move('uploads/images',$image_name);
            $user->image = $image_name;
        }
        else{
            $user->image = null;
        }


        $user->save();

        return redirect()->route('signin');
    }
}
