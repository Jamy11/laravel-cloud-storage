@extends('layouts.adminDashboard')

@section('title')
    Profile
@endsection

@section('sidebar_content')
    <img class="w-40 h-40 border-4 border-gray-700 mx-auto rounded-full" src="{{ ($user->image ? asset('uploads/images/' . $user->image) : asset('assets/images/profile.svg')) }}" alt="Profile Image">
    <h1>Profile</h1>
    <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
            <form action="#" class="flex flex-col space-y-8">

                <div>
                    <h3 class="text-2xl font-semibold">Basic Information</h3>
                    <hr>
                </div>

                <div class="form-item">
                    <label class="text-xl ">Full Name</label>
                    <input type="text" value="{{ ucfirst($user->full_name) }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="form-item w-full">
                        <label class="text-xl ">Email</label>
                        <input type="text" value="{{ $user->email }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-semibold ">More Information</h3>
                    <hr>
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="form-item">
                        <label class="text-xl ">Address</label>
                        <input type="text" value="{{ $user->address }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">Phone</label>
                        <input type="text" value="{{ $user->phone }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">User Type</label>
                        <input type="text" value="{{ ucfirst($user->role->roles) }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                    </div>

                    <div class="form-item">
                        <label class="text-xl ">Joined At</label>
                        <input type="text" value="{{ $user->created_at->format('d-M-Y') }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
