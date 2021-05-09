@extends('layouts.userDashboard')

@section('title')
    Upload Files
@endsection

@section('sidebar_content')
    <h1 class="text-5xl text-green-900" >Upload Files</h1>

    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        {{-- <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full"> --}}
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input
                    type="file"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="files[]" multiple/>

                    @error('files')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                <button type='submit' class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Files</button>

            </form>
        {{-- </div> --}}
    </div>
</center>
<br>
<h1 class="text-5xl text-green-900">
    {{Session::get('status')}}
</h1>
<br>
    <center>
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <a href="{{ url()->previous() }}">
                <button type='submit' class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                Back To Previous Page
                </button>
            </a>
        </div>
    </center>
@endsection
