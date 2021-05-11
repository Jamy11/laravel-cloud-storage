<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.userDashboard');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function editProfileView()
    {
        return view('user.profile');
    }
    public function updateProfile(Request $request)
    {



        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc|unique:users,email,'.Auth::user()->id,
            'password' => 'required|confirmed|min:5|max:20',
            'password_confirmation' => 'required|min:5|max:20',
            'address' => 'required',
            'phone' => 'required|numeric',
            'image' => 'file|image|max:2048'
        ]);

        Auth::user()->full_name = $request->full_name;
        Auth::user()->email = $request->email;
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->address = $request->address;
        Auth::user()->phone = $request->phone;

        if($request->hasFile('image')) {
            if(Auth::user()->image) {
                File::delete('uploads/images/'.Auth::user()->image);
            }
            $file_name = date('y-m-d').time().'.'.$request->file('image')
                    ->getClientOriginalExtension();
            Auth::user()->image = $file_name;
            $request->file('image')->move('uploads/images', $file_name);
        }

        if(Auth::user()->save()) {
            session()->flash('success', 'Account information updated successfully');
            return redirect()->route('user.profile');
        }

        return back()->withError([
            'error' => 'Operation failed!'
        ]);
    }


}
