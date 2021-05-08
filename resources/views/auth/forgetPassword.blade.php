@extends('layouts.app')

@section('title')
    Forget Password
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
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

                @error('error')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <div class="text-green-500 mt-2 mb-2 text-sm">
                    {{ session('success') }}
                </div>

                <div>
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-blue-400 hover:to-green-400 text-white px-4 py-3 rounded font-medium w-full">
                        Request
                    </button>
                </div>


            </form>
            <br>
        </div>
    </div>
@endsection
