@extends('layouts.app')

@section('navbar', 'Editar tipo de transação')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados do tipo de transação</h4>
            <a href="{{ route('types/transaction') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <span class="card-header"><a class="text-danger">*</a> Campo obrigatório</span>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/types/transaction/{{ $transaction_type['id'] }}" id="edit-transaction_type">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <div>
                        <strong>Nome <a class="text-danger">*</a></strong>
                        <input type="text" name="nome" autocomplete="off" value="{{ $transaction_type['type'] }}">
                    </div>
                </div>
                <button type="submit" form="edit-transaction_type" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
