<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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

    public function add_user()
    {
        $roles = Role::all();
        return view('admin.add_user')->withRoles($roles);
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc|unique:users,email',
            'password' => 'required|confirmed|min:5|max:20',
            'password_confirmation' => 'required|min:5|max:20',
            'address' => 'required',
            'phone' => 'required|numeric',
            'image' => 'file|image|max:2048'
        ]);

        $newUser = new User();
        $newUser->full_name = $request->full_name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->address = $request->address;
        $newUser->phone = $request->phone;
        $newUser->role_id = $request->roles;

        if($request->hasFile('image')) {
            if($newUser->image) {
                File::delete('uploads/images/'.$newUser->image);
            }
            $file_name = date('y-m-d').time().'.'.$request->file('image')
                    ->getClientOriginalExtension();
            $newUser->image = $file_name;
            $request->file('image')->move('uploads/images', $file_name);
        }

        if($newUser->save()) {
            session()->flash('success', 'Account created successfully');
            return back();
        }

        return back()->withError([
            'error' => 'Operation Failed!'
        ]);
    }

    public function add_roles()
    {
        return view('admin.add_roles');
    }

    public function store_roles(Request $request)
    {
        $request->validate([
            'role' => 'required|regex:/^([a-zA-Z ]+)$/i'
        ],
        [
            'regex' => 'Role only contain alphabets and spaces'
        ]);

        $role = new Role();
        $data_str = str_replace(' ', '_', strtolower($request->role));
        $role->roles = $data_str;

        if($role->save()) {
            session()->flash('success', 'Role added successfully');
            return back();
        }

        return back()->withError([
            'error' => 'Operation failed!'
        ]);
    }
}
