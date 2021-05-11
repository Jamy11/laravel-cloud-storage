@extends('layouts.adminDashboard')

@section('title')
    Add New User
@endsection

@section('sidebar_content')
    <div class="container max-w-sm mb-12 mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Add User</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="full_name"
                    placeholder="Full Name" value="{{old('full_name')}}"/>

                @error('full_name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    placeholder="Email" value="{{old('email')}}"/>

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password"
                    placeholder="Password" />

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password_confirmation"
                    placeholder="Confirm Password" />

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="address"
                    placeholder="Address" value="{{old('address')}}"/>


                @error('address')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="phone"
                    placeholder="Phone" value="{{old('phone')}}"/>

                @error('phone')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <input
                    type="file"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="image"
                    placeholder="Image" />

                @error('image')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror


                <select class="block border border-grey-light w-full p-3 rounded mb-4" name="roles" id="roles">
                    <optgroup label="User Roles">
                    @foreach($roles as $role)
                    <option class="block border border-grey-light w-full p-3 rounded mb-4" value="{{ $role->id }}" @if($role->roles == 'user') selected @endif>
                        {{ ucfirst($role->roles) }}
                    </option>
                    @endforeach
                    </optgroup>
                </select>

                @error('roles')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <div class="text-green-500 mt-2 mb-4 text-center text-sm">
                    {{ session('success') }}
                </div>

                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Create Account</button>
            </form>
        </div>
    </div>
@endsection
