@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/home/home.css') }}">
@endsection

@section('content')
<section class="home">
    <div class="side-menu">
        @include('components.sidebar')
    </div>
    <div class="dashboard">
        <div class="title">
            <h1>Dashboard</h1>
        </div>
        <div class="image">
            <img src="{{asset('images/logobarbearia.png')}}" alt="">
        </div>
    </div>
</section>
@endsection
