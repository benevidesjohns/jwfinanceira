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
            {{-- @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif --}}
            <form method="POST" action="transactions/store" id="create-transaction">
                @csrf
                <div>
                    <strong>Valor da transação R$</strong>
                    <input placeholder="0" type="text" name="amount" autocomplete="off"
                        class="mb-3 mr-5 @error('amount') is-invalid @enderror">
                    {{-- @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    {{-- <strong>Conta</strong>
                    <select class="form-select mr-5" name='fk_account'>
                        <option>Selecione</option>
                        @foreach ($accounts as $account)
                            <option value='{{ $account['id'] }}'>
                                {{ $account['account_number'] }}</option>
                        @endforeach
                    </select> --}}
                    <strong>Tipo de transação</strong>
                    <select id="fk_transaction_type"
                        class="form-select @error('fk_transaction_type')
                    is-invalid @enderror"
                        name='fk_transaction_type' required>
                        <option>Selecione</option>
                        @foreach ($transaction_types as $transaction_type)
                            <option value='{{ $transaction_type['id'] }}'>
                                {{ $transaction_type['type'] }}</option>
                        @endforeach
                    </select>
                    {{-- @error('fk_transaction_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>

                {{-- <div>
                    <strong>Mensagem</strong><br>
                    <input type="text" name="message" autocomplete="off" class="w-50 mb-5 mr-5">
                </div> --}}

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
