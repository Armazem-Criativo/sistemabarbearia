@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/login/login.css') }}">
@endsection

@section('content')
<div class="container-login">
    <div class="card">
        <h1 class="title">Área de Acesso</h1>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="label-float">
                <label for="email">Usuário</label>
                <input type="text" id="name" name="name" placeholder="" required>
            </div>
            <div class="label-float">
                <label for="senha">Senha</label>
                <input type="password" id="password" name="password" placeholder="" required>
            </div>
            <div class="btn-float">
                <button type="submit" class="btn-login">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
