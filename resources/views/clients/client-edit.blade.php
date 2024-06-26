@extends('master.layout')

@section('content')
    <section class="client-edit">
        <div class="side-menu">
            @include('components.sidebar')
        </div>
        <div class="client-edit-container">
            <div class="client-edit-title">
                <h1>editar cliente</h1>
            </div>
            <form action="{{ route('clientes.update', ['cliente' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $client->name) }}" required>
                    </div>
                    <div class="col-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf"
                            value="{{ old('cpf', $client->cpf) }}" required>
                    </div>
                    <div class="col-4">
                        <label for="birthdate" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate"
                            value="{{ old('birthdate', $client->birthdate ? $client->birthdate->format('Y-m-d') : '') }}"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $client->address) }}" required>
                    </div>
                    <div class="col-6">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $client->phone) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email', $client->email) }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <a class="btn btn-danger" href="{{ route('clientes.index') }}" role="button">Cancelar</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
