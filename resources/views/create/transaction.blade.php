@extends('layouts.app')

@section('navbar', 'Criar nova transação')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar nova transação</h4>
            <a href="{{ route('transactions') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <span class="card-header"><a class="text-danger">*</a> Campo obrigatório</span>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="{{ route('transactions/store') }}" id="create-transaction">
                @csrf
                <div>
                    <strong>Valor da transação <a class="text-danger">*</a></strong> R$
                    <input placeholder="0,00" type="text" name="valor_da_transacao" autocomplete="off" class="mb-3 mr-5">
                    <strong>Conta <a class="text-danger">*</a></strong>
                    <select class="form-select mr-5" name='conta'>
                        <option>Selecione</option>
                        @foreach ($accounts as $account)
                            <option value='{{ $account['id'] }}'>
                                {{ $account['account_number'] }}</option>
                        @endforeach
                    </select>
                    <strong>Tipo de transação <a class="text-danger">*</a></strong>
                    <select id="fk_transaction_type" class="form-select" name='tipo_de_transacao'>
                        <option>Selecione</option>
                        @foreach ($transaction_types as $transaction_type)
                            <option value='{{ $transaction_type['id'] }}'>
                                {{ $transaction_type['type'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <strong>Mensagem</strong><br>
                    <input type="text" name="mensagem" placeholder="Minha transação" autocomplete="off" class="w-50 mb-5 mr-5">
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
