@extends('layouts.app')

@section('navbar', 'Criar novo tipo de conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo tipo de conta</h4>
            <a href="../account" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/api/types/account" id="create-account_type">
                @csrf
                <div> </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
