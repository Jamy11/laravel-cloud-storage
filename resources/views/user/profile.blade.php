@extends('layouts.userDashboard')

@section('title')
    Profile
@endsection

@section('sidebar_content')
    <img class="w-40 h-40 border-4 border-gray-700 mx-auto rounded-full" src="{{ (Auth::user()->image ? asset('uploads/images/' . Auth::user()->image) : asset('assets/images/profile.svg')) }}" alt="Profile Image">
    <h1>Profile</h1>
    <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
            <form method="post" enctype="multipart/form-data" action="#" class="flex flex-col space-y-8">
                @csrf
                <div>
                    <h3 class="text-2xl font-semibold">Basic Information</h3>
                    <hr>
                </div>

                <div class="form-item">
                    <label class="text-xl ">Full Name</label>
                    <input name="full_name" type="text" value="{{ ucfirst(Auth::user()->full_name) }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 @error('full_name') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif >
                    @error('full_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-col md:space-x-0">
                    <div class="form-item w-full">
                        <label class="text-xl ">Email</label>
                        <input name="email" type="text" value="{{ Auth::user()->email }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 @error('email') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                    </div>
                    @error('email')
                    <div class="text-red-500 block mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-col md:space-x-0">
                    @php
                        $link = 'cloud-storage.com/'.Auth::user()->unique_link;
                    @endphp
                    <div class="form-item w-full">
                        <label class="text-xl ">User link</label>
                        @if (url()->current() == route('user.profile'))
                            <input name="unique_link" type="text" value="{{ $link }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25
                            @error('email') border-red-500 @enderror"  disabled >
                        @else
                            <input name="unique_link" type="text" value="{{ Auth::user()->unique_link }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25
                            @error('email') border-red-500 @enderror"  >
                        @endif

                    </div>
                    @error('unique_link')
                    <div class="text-red-500 block mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                @if(url()->current() == route('user.editProfile'))
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-col md:space-x-0">
                    <div class="form-item w-full">
                        <label class="text-xl ">Password</label>
                        <input name="password" type="password" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 @error('password') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                    </div>
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-col md:space-x-0">
                    <div class="form-item w-full">
                        <label class="text-xl ">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 @error('password_confirmation') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                    </div>
                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @endif

                @if(url()->current() == route('user.editProfile'))
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-col md:space-x-0">
                    <div class="form-item w-full">
                        <label class="text-xl block">Profile Image</label>
                        <input name="image" type="file" class="w-50 mt-1 border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 @error('password_confirmation') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                    </div>
                    @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @endif



                <div>
                    <h3 class="text-2xl font-semibold ">More Information</h3>
                    <hr>
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="form-item">
                        <label class="text-xl ">Address</label>
                        <input name="address" type="text" value="{{ Auth::user()->address }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 @error('address') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                        @error('address')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">Phone</label>
                        <input name="phone" type="text" value="{{ Auth::user()->phone }}" class="w-full border-2 appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 @error('phone') border-red-500 @enderror" @if(url()->current() != route('user.editProfile')) disabled @endif>
                        @error('phone')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">User Type</label>
                        <input type="text" value="{{ ucfirst(Auth::user()->role->roles) }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled >
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">Joined At</label>
                        <input type="text" value="{{ Auth::user()->created_at->format('d-M-Y') }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled >
                    </div>
                </div>
                <div class="mx-auto mt-2">
                    @error('error')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="text-green-500 mt-2 text-sm">
                        {{ session('success') }}
                    </div>
                </div>
                @if(url()->current() != route('user.editProfile'))
                <div class="mx-auto">
                    <a class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none" href="{{ route('user.editProfile') }}">Edit
                    </a>
                </div>
                @else
                    <div class="mx-auto space-x-4">
                        <button type="submit" name="submit" class="w-22 text-center inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                            Update
                        </button>
                        <button type="reset" class="w-22 text-center inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                            Reset
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
