@extends('master.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="scheduling-index">
        <div class="side-menu">
            @include('components.sidebar')
        </div>
        <div class="scheduling-index-container">
            <div class="scheduling-index-title">
                <h1>cadastro de agendamentos</h1>
            </div>
            <div class="scheduling-create-quest">
                <div class="scheduling-quest">
                    <p>Deseja cadastrar um novo agendamento ?</p>
                </div>
                <div class="btn-scheduling-create">
                    <a href="{{ route('agendamentos.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <span class="create-desc">
                            Criar Agendamento
                        </span>
                    </a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Funcionário</th>
                        <th class="text-center">Serviço</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Forma de Pagamento</th>
                        <th class="text-center">Valor do serviço</th>
                        <th class="text-center" colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedulings as $scheduling)
                        <tr>
                            <th scope="row">{{$scheduling->id}}</th>
                            <td class="text-center">{{$scheduling->clients->name}}</td>
                            <td class="text-center">{{$scheduling->employees->name}}</td>
                            <td class="text-center">{{$scheduling->services->service}}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse($scheduling->date)->format('d/m/Y')}}</td>
                            <td class="text-center">{{$scheduling->payments->formpay}}</td>
                            <td class="text-center">{{$scheduling->services->value}}</td>
                            <td class="text-center">
                                <a href="" class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
