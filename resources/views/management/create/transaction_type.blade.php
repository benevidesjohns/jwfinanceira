@extends('layouts.app')

@section('navbar', 'Criar novo tipo de transação')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo tipo de transação</h4>
            <a href="../transaction" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/api/types/transaction" id="create-transaction_type">
                @csrf
                <div> </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
