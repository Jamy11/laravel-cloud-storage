@extends('layouts.userDashboard')

@section('title')
    Private Folder
@endsection

@section('sidebar_content')
    <h1 class="text-5xl text-green-900" >Private Folder</h1>
<br>
<br>
    <div class="container">
        <h1 class="mb-8">
        Click To View Folder.
      </h1>

        <table class="text-left w-full">
            <thead class="bg-black flex text-white w-full">
                <tr class="flex w-full mb-4">
                    <th class="p-4 w-1/4">Folder Name</th>
                    <th class="p-4 w-1/4"></th>
                    <th class="p-4 w-1/4"></th>
                    <th class="p-4 w-1/4">Number of Item</th>
                </tr>
            </thead>
        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
            <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                <tr class="flex w-full mb-4">
                    <td class="p-4 w-1/4">Dogs</td>
                    <td class="p-4 w-1/4"></td>
                    <td class="p-4 w-1/4"></td>
                    <td class="p-4 w-1/4">2</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
