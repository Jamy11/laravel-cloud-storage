@extends('layouts.adminDashboard')

@section('title')
    Add New Role
@endsection

@section('sidebar_content')
    <div class="container max-w-sm mb-12 mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Add New Role</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="role"
                    placeholder="User Role" value="{{old('role')}}"/>

                @error('role')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror


                <div class="mx-auto mt-2">
                    @error('error')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="text-green-500 mb-4 mt-2 text-sm">
                        {{ session('success') }}
                    </div>
                </div>

                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Add Role
                </button>
            </form>
        </div>
    </div>
@endsection
