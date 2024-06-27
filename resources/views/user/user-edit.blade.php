@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/user/user-edit.css') }}">
@endsection

@section('content')
    <section class="user-edit">
        <div class="side-menu">
            @include('components.sidebar')
        </div>
        <div class="user-edit-container">
            <div class="edit-user-title">
                <h1>Editar Usuário</h1>
            </div>
            <form action="{{ route('usuarios.update', ['usuario' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <label for="id_employee">Selecione o Funcionário</label>
                        <select class="form-select" name="id_employee" id="id_employee" required>
                            <option value="">Selecione um funcionário...</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $employee->id == $user->id_employee ? 'selected' : '' }}>{{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="name">Usuário</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $user->name) }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="col-4">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Deixe em branco para manter a mesma">
                    </div>
                    <div class="col-4">
                        <label for="role" class="form-label">Permissão</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="">Selecione uma permissão...</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="atendente" {{ $user->role == 'atendente' ? 'selected' : '' }}>Atendente</option>
                            <option value="funcionario" {{ $user->role == 'funcionario' ? 'selected' : '' }}>Funcionário
                            </option>
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
