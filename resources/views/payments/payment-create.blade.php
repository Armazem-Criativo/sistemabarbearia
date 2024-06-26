@extends('master.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/css/payment/payment-create.css') }}">
@endsection

@section('content')
<section class="payment-create">
    <div class="side-menu">
        @include('components.sidebar')
    </div>
    <div class="payment-create-container">
        <div class="payment-create-title">
            <h1>cadastrar forma de pagamento</h1>
        </div>
        <form action="">
            <div class="row">
                <div class="col-4">
                    <label for="formpay" class="form-label">Forma de Pagamento</label>
                    <input type="text" class="form-control" id="formpay" name="formpay" required>
                </div>
                <div class="col-4">
                    <label for="parcel" class="form-label">Parcelas</label>
                    <input type="text" class="form-control" id="parcel" name="parcel" aria-describedby="parcelHelp" required>
                    <div id="parcelHelp" class="form-text">Escreva neste somente se haver alguma forma de pagamento que será parcelada.</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <a class="btn btn-danger" href="{{ route('formas-de-pagamento.index') }}" role="button">Cancelar</a>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
