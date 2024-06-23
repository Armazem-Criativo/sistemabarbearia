@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/user/user-create.css') }}">
@endsection

@section('content')
    <section class="user-create">
        <div class="side-menu">
            @include('components.sidebar')
        </div>
        <div class="user-create-container">
            <div class="create-user-title">
                <h1>criar usuário</h1>
            </div>
            <form>
                <div class="row">
                    <div class="col-6">
                        <label for="">Selecione o Funcionário</label>
                        <select class="form-select" name="" id="">
                            @for ($i = 0; $i < 7; $i++)
                                <option value="employee">Nome</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="user">Usuário</label>
                        <input type="text" class="form-control" id="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-4">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-4">
                        <label for="password_confirmation" class="form-label">Confimar a Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="role" class="form-label">Permissão</label>
                        <select name="role" id="role" class="form-select">
                            <option value="admin">Administrador</option>
                            <option value="atendente">Atendente</option>
                            <option value="funcionario">Funcionario</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <a class="btn btn-danger" href="{{route('users')}}" role="button">Cancelar</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
