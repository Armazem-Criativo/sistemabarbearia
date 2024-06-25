@extends('master.layout')

@section('content')
<section class="employee-create">
    <div class="side-menu">
        @include('components.sidebar')
    </div>
    <div class="employee-create-container">
        <div class="employee-create-title">
            <h1>cadastro funcionário</h1>
        </div>
        <form action="{{route('funcionarios.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-4">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="col-4">
                    <label for="birthdate" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="position" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <a class="btn btn-danger" href="{{route('funcionarios.index')}}" role="button">Cancelar</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
