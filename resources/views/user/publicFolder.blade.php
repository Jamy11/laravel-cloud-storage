@extends('layouts.userDashboard')

@section('title')
    Private Folder
@endsection

@section('sidebar_content')
    <center><h1 class="text-5xl text-green-900" >Public Folder</h1></center>
<br>

<br>
@if (!empty($f_name))
    <h1 class="text-5xl text-green-400" >Folder Name : {{$f_name->folder_name}}</h1>
@endif
<br>
    <div class="container">
        {{-- <h1 class="mb-8">
        Click To View Folder.
        </h1> --}}
        <center>
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                {{-- <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full"> --}}
                    <form action="" method="post">
                        @csrf
                        <input
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            name="folder_name"
                            placeholder="File Name" />

                            @error('folder_name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                        <button type='submit' class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Folder</button>

                    </form>
                {{-- </div> --}}
            </div>
        </center>

        <br>
        @if (count($folders)==0)
        <h1 class="text-5xl text-green-900" >Please Add Folder</h1>
        @else

        <table class="text-left w-full">
            <thead class="bg-black flex text-white w-full">
                <tr class="flex w-full mb-4">
                    <th class="p-4 w-1/4">Folder Name</th>
                    <th class="p-4 w-1/4"></th>
                    <th class="p-4 w-1/4"></th>
                    <th class="p-4 w-1/4">Archive</th>
                </tr>
            </thead>
        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->



            <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" >
                @foreach ($folders as $folder)
                <tr class="flex w-full mb-4">

                        <td class="p-4 w-1/4"><a href="{{route('user.publicSubFolder',[Crypt::encrypt($folder->id)])}}" class="text-purple-700 text-opacity-100 hover:text-green-900" >{{$folder->folder_name}}</a> </td>
                        <td class="p-4 w-1/4"></td>
                        <td class="p-4 w-1/4"></td>
                        <td class="p-4 w-1/4"><a href="{{route('archiveFolder',[Crypt::encrypt($folder->id)] )}}" class="text-red-500 hover:text-red-700">Yes</a></td>
                    </tr>

                @endforeach
            </tbody>

        </table>
        @endif

    </div>


    {{-- files --}}
    <center>
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            @if (Route::current()->getName() =='user.publicFolder')
                <a href="{{route('user.publicFolderUpload')}}">
                    <button type='submit' class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Add Files
                    </button>
                </a>
            @elseif (Route::current()->getName() =='user.publicSubFolder')
                <a href="{{route('user.publicSubFolderUpload',[Crypt::encrypt($id)])}}">
                    <button type='submit' class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Add Files
                    </button>
                </a>
            @endif

        </div>
    </center>
<br>

    @if (count($files)==0)
    <h1 class="text-5xl text-green-900" >Please Add File</h1>
    @else

    <table class="text-left w-full">
        <thead class="bg-black flex text-white w-full">
            <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">File Name</th>
                <th class="p-4 w-1/4"></th>
                <th class="p-4 w-1/4"></th>
                <th class="p-4 w-1/4">Archive</th>
            </tr>
        </thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->



        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" >
            @foreach ($files as $file)
            <tr class="flex w-full mb-4">

                    <td class="p-4 w-1/4"><a href="{{route('download',[$file->file_uniquename])}}" class="text-purple-700 text-opacity-100 hover:text-green-900" >{{$file->file_name}}</a> </td>
                    <td class="p-4 w-1/4"></td>
                    <td class="p-4 w-1/4"></td>
                    <td class="p-4 w-1/4"><a href="{{route('archiveFile',[$file->id])}}" class="text-red-500 hover:text-red-700">Yes</a></td>
                </tr>

            @endforeach
        </tbody>

    </table>
    @endif


    @if (Route::current()->getName() =='user.publicSubFolder')
        <center>
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <a href="{{ url()->previous() }}">
                    <button type='submit' class="bg-green-500 text-white px-4 py-3 rounded font-medium w-full">
                    Back To Previous Page
                    </button>
                </a>
            </div>
        </center>
    @endif
<br>
<br>
<br>
@endsection

