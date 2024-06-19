@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/home/home.css') }}">
@endsection

@section('content')
<div class="side-menu">
    @include('components.sidebar')
</div>
@endsection
