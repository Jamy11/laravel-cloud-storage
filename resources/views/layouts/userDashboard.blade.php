<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>

</head>
<body class="bg-gray-200 leading-normal tracking-normal">
    <nav class="p-7 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{route('home')}}" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
        </ul>

        <ul class="flex items-center">
            <li>
                <a href="" class="p-3">@auth
                    {{Auth::user()->full_name}}
                @endauth</a>
            </li>
            <li>
                <a href="{{route('logout')}}" class="p-3">Logout</a>
            </li>
        </ul>
    </nav>
{{-- sidebar start--}}
    <div class="flex md:flex-row-reverse flex-wrap">

        <!--Main Content-->
        <div class="w-full md:w-5/6 bg-gray-100 md:h-screen">
        <div class="container bg-gray-100 pt-16 px-6">
            @yield('sidebar_content')
        </div>
        </div>

        <!--Sidebar-->
        <div class="mt-20 w-full md:w-1/6 bg-gray-900 md:bg-gray-900 px-2 text-center fixed bottom-0 md:pt-8 md:top-0 md:left-0 h-16 md:h-screen md:border-r-4 md:border-gray-600">
        <div class="md:relative mx-auto lg:float-right lg:px-6">
            <ul class="list-reset flex flex-row md:flex-col text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{route('user.dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                    <i class="fas fa-link pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Dashboard</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                    <i class="fas fa-link pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Edit Profile</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-pink-600">
                    <i class="fas fa-link pr-0 md:pr-3 text-pink-500"></i><span class="pb-1 md:pb-0s text-xs md:text-base text-white md:font-bold block md:inline-block">Change Password</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('user.privateFolder')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                    <i class="fas fa-link pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Private Folder</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                    <i class="fas fa-link pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Public Folder</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                    <i class="fas fa-link pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Link</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
{{-- sidebar end --}}

    {{-- @yield('content') --}}

</body>
</html>
