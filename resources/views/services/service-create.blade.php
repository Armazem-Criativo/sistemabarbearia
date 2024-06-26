@extends('master.layout')

@section('content')
<section class="service-create">
    <div class="side-menu">
        @include('components.sidebar')
    </div>
    <div class="service-create-container">
        <div class="service-create-title">
            <h1>cadastrar serviço</h1>
        </div>
        <form action="{{route('servicos.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="service" class="form-label">Serviço</label>
                    <input type="text" class="form-control" id="service" name="service" required>
                </div>
                <div class="col-4">
                    <label for="value" class="form-label">Valor</label>
                    <input type="text" class="form-control" id="value" name="value" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <a class="btn btn-danger" href="{{ route('servicos.index') }}" role="button">Cancelar</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
