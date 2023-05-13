@extends('layouts.app')

@section('navbar', 'Criar novo usuário')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo usuário</h4>
            <a href="../users" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/api/users" id="create-user">
                @csrf
                <div> </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
