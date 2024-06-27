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
                <h1>Criar Usuário</h1>
            </div>
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="id_employee">Selecione o Funcionário</label>
                        <select class="form-select" name="id_employee" id="id_employee">
                            <option value="">Selecione um funcionário...</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="name">Usuário</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-4">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-4">
                        <label for="role" class="form-label">Permissão</label>
                        <select name="role" id="role" class="form-select">
                            <option value="">Selecione uma permissão...</option>
                            <option value="admin">Administrador</option>
                            <option value="atendente">Atendente</option>
                            <option value="funcionario">Funcionário</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <a class="btn btn-danger" href="{{ route('usuarios.index') }}" role="button">Cancelar</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
