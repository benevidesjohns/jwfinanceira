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
            <form method="POST" action="users/store" id="create-user">
                @csrf
                <div class="">
                    <div>
                        <strong>Nome</strong>
                        <input type="text" name="name" placeholder="John Cena" autocomplete="off"
                            class="w-25 mb-4 mr-5">
                        <strong>Email</strong>
                        <input type="text" name="email" placeholder="johncena@email.com" autocomplete="off"
                            class="w-25">
                    </div>
                    <div>
                        <strong>Telefone</strong>
                        <input type="text" name="phone_number" placeholder="(00) 00000-0000" autocomplete="off"
                            class="mr-5">
                        <strong>CPF</strong>
                        <input type="text" name="cpf" placeholder="000.000.000-00" autocomplete="off" class="mb-5">
                    </div>
                </div>
                <button type="submit" form="create-user" class="btn btn-secondary ml-auto">
                    <i class="fas fa-solid fa-plus"></i>
                    Criar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
