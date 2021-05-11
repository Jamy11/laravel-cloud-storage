@extends('layouts.app')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            {{-- @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif --}}

            <form action="" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @error('error')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                @enderror


                <div>
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-blue-400 hover:to-green-400 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>


            </form>
            <br>
            <div>
                <button type="submit" class="bg-gradient-to-r from-indigo-400 to-blue-500 hover:from-blue-400 hover:to-green-400 text-white px-4 py-3 rounded font-medium w-full">
                    <a href="{{ route('forgetpass') }}">Forget Password</a>
                </button>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('google.login') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
            </div>
        </div>
    </div>
@endsection
