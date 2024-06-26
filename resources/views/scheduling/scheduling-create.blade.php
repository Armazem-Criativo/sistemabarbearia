@extends('master.layout')

@section('content')
    <section class="scheduling-create">
        <div class="side-menu">
            @include('components.sidebar')
        </div>
        <div class="scheduling-create-container">
            <div class="scheduling-create-title">
                <h1>Cadastrar Agendamentos</h1>
            </div>
            <form action="{{route('agendamentos.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="client_id" class="form-label">Selecione o Cliente</label>
                        <select name="client_id" id="client_id" class="form-select" required>
                            <option value="">Selecione um cliente...</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="employee_id" class="form-label">Selecione o Funcionário</label>
                        <select name="employee_id" id="employee_id" class="form-select" required>
                            <option value="">Selecione um funcionário...</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="service_id" class="form-label">Selecione o Serviço</label>
                        <select name="service_id" id="service_id" class="form-select" required>
                            <option value="">Selecione um serviço...</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="payment_id" class="form-label">Selecione o Pagamento</label>
                        <select name="payment_id" id="payment_id" class="form-select" required>
                            <option value="">Selecione um método de pagamento...</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->formpay }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="date" class="form-label">Data do Agendamento</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <a class="btn btn-danger" href="{{ route('agendamentos.index') }}" role="button">Cancelar</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
