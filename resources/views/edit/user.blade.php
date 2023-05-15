@extends('layouts.app')

@section('navbar', 'Criar novo usuário')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo usuário</h4>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="/users/{{ $user['id'] }}" id="create-user">
                @csrf
                <div class="">
                    <div>
                        <strong>Nome</strong>
                        <input type="text" name="name" autocomplete="off" class="w-25 mb-4 mr-5"
                            value="{{ $user['name'] }}">
                        <strong>Email</strong>
                        <input type="text" name="email" autocomplete="off" class="w-25" value="{{ $user['email'] }}">
                    </div>
                    <div>
                        <strong>Telefone</strong>
                        <input type="text" name="phone_number" autocomplete="off" class="mr-5"
                            value="{{ $user['phone_number'] }}">
                        <strong>CPF</strong>
                        <input type="text" name="cpf" autocomplete="off" class="mb-5" value="{{ $user['cpf'] }}">
                    </div>
                </div>
                <button type="submit" form="create-user" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
