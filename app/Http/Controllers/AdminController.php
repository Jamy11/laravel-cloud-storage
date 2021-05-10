<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile')->with('user', $user);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc|unique:users,email,'.$user->id,
            'password' => 'required|confirmed|min:5|max:20',
            'password_confirmation' => 'required|min:5|max:20',
            'address' => 'required',
            'phone' => 'required|numeric',
            'image' => 'file|image|max:2048'
        ]);

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;

        if($request->hasFile('image')) {
            if($user->image) {
                File::delete('uploads/images/'.$user->image);
            }
            $file_name = date('y-m-d').time().'.'.$request->file('image')
                    ->getClientOriginalExtension();
            $user->image = $file_name;
            $request->file('image')->move('uploads/images', $file_name);
        }

        if($user->save()) {
            session()->flash('success', 'Account information updated successfully');
            return redirect()->route('admin.profile');
        }

        return back()->withError([
            'error' => 'Operation failed!'
        ]);
    }
}
