@extends('layouts.app')

@section('navbar', 'Criar um novo tipo de conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo tipo de conta</h4>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="types/account/store" id="create-account_type">
                @csrf
                <div class="mb-5">
                    <div>
                        <strong>Nome</strong>
                        <input type="text" autocomplete="off" name="type">
                    </div>
                </div>
                <button type="submit" form="create-account_type" class="btn btn-secondary ml-auto">
                    <i class="fas fa-solid fa-plus"></i>
                    Criar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
