@extends('layouts.app')

@section('navbar', 'Criar nova transação')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar nova transação</h4>
            <a href="/transactions" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/api/transactions" id="create-transaction">
                @csrf
                <div> </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
