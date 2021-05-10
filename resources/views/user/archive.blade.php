@extends('layouts.userDashboard')

@section('title')
    Archive Folder
@endsection

@section('sidebar_content')
    <center><h1 class="text-5xl text-green-900" >Archive Folder</h1></center>
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


        <br>
        @if (count($folders)==0)
        <h1 class="text-5xl text-green-900" >No Archive Folder</h1>
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

                        <td class="p-4 w-1/4">{{$folder->folder_name}} </td>
                        <td class="p-4 w-1/4"></td>
                        <td class="p-4 w-1/4"></td>
                        <td class="p-4 w-1/4"><a href="{{route('user.unmakeArchiveFolder',[Crypt::encrypt($folder->id)] )}}" class="text-red-500 hover:text-red-700">I want it back.</a></td>
                    </tr>

                @endforeach
            </tbody>

        </table>
        @endif

    </div>


    {{-- files --}}

<br>

    @if (count($files)==0)
    <h1 class="text-5xl text-green-900" >No Archive File</h1>
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
                    <td class="p-4 w-1/4"><a href="{{route('user.unmakeArchiveFile',[$file->id])}}" class="text-red-500 hover:text-red-700">I want it back.</a></td>
                </tr>

            @endforeach
        </tbody>

    </table>
    @endif


    @if (Route::current()->getName() =='user.privateSubFolder')
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

