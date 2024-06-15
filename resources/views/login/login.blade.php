@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/login/login.css') }}">
@endsection

@section('content')
<div class="container-login">
    <div class="card">
        <h1 class="title">Área de Acesso</h1>
        <div class="label-float">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="">
        </div>
        <div class="label-float">
            <label for="senha">Senha</label>
            <input type="password" id="senha" placeholder="">
        </div>
        <div class="btn-float">
            <a href="{{route('home')}}" class="btn-login">
                Entrar
            </a>
        </div>
    </div>
</div>
@endsection
