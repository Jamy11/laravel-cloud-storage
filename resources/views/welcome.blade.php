@extends('layouts.app')

@section('content')
<center>
    <h1 class="text-6xl">Welcome
    </h1>

    <h1 style="color: red">
    {{Session::get('msg')}}
    </h1>
</center>
@endsection
