@extends('layouts.app')

@section('navbar', 'Criar nova transação')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar nova transação</h4>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/api/transactions" id="create-transaction">
                @csrf
                <div>
                    <strong>Valor da transação R$</strong>
                    <input type="text" autocomplete="off" class="mb-5 mr-5">
                    <strong>Conta</strong>
                    <select id="transaction_types" class="form-select mr-5" name='transaction_types'>
                        <option>Selecione</option>
                        @foreach ($accounts as $account)
                            <option value='{{ $account['id'] }}'>
                                {{ $account['account_number'] }}</option>
                        @endforeach
                    </select>
                    <strong>Tipo de transação</strong>
                    <select id="transaction_types" class="form-select" name='transaction_types'>
                        <option>Selecione</option>
                        @foreach ($transaction_types as $transaction_type)
                            <option value='{{ $transaction_type['id'] }}'>
                                {{ $transaction_type['type'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" form="create-transaction" class="btn btn-secondary ml-auto">
                    <i class="fas fa-solid fa-plus"></i>
                    Criar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
