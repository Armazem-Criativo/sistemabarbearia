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
        <form action="">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <a class="btn btn-danger" href="{{route('employees')}}" role="button">Cancelar</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
