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
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            @auth
            <li>
                @if(session('role') == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="p-3">Dashboard</a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="p-3">Dashboard</a>
                @endif
            </li>
            @endauth



        </ul>

        <ul class="flex items-center">
            @guest
            <li>
                <a href="{{route('signin')}}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{route('signup')}}" class="p-3">Register</a>
            </li>
            @endguest

            @auth
            <li>
                <a href="{{route('logout')}}" class="p-3">Logout</a>
            </li>
            @endauth

        </ul>
    </nav>


    @yield('content')

</body>
</html>
