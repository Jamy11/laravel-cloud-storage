@extends('layouts.app')

@section('title')
    Sign Up
@endsection

@section('content')


    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
            <input
                type="text"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="fullname"
                placeholder="Full Name" value="{{old('fullname')}}"/>

                @error('fullname')
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
                name="confirm_password"
                placeholder="Confirm Password" />

                @error('confirm_password')
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
                type="number"
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

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                Create Account</button>
            </form>
            <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Terms of Service
                </a> and
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Privacy Policy
                </a>
            </div>
        </div>

        <div class="text-grey-dark mt-6">
            Already have an account?
            <a class="no-underline border-b text-blue" href="{{route('signin')}}">
                Sign in
            </a>.
        </div>
    </div>


@endsection
