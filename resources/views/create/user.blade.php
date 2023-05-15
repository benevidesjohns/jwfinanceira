@extends('layouts.app')

@section('navbar', 'Criar novo usuário')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar novo usuário</h4>
            <a href="{{ route('management/users') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <span class="card-header"><a class="text-danger">*</a> Campo obrigatório</span>
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
        <div class="card-body">
            <form method="POST" action="{{ route('management/users/store') }}" id="create-user">
                @csrf
                <div class="mb-5">
                    <div class="mb-4">
                        <strong>Tipo de usuário<a class="text-danger">*</a></strong>
                        <select id="user_type" class="form-select" name='tipo_de_usuario'>
                            <option>Selecione</option>
                            @foreach ($roles as $role)
                                <option value='{{ $role->id}}'>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <strong>Nome <a class="text-danger">*</a></strong>
                        <input type="text" name="nome" placeholder="John Cena" autocomplete="off"
                            class="w-25 mb-4 mr-5">
                        <strong>Telefone <a class="text-danger">*</a></strong>
                        <input type="text" name="telefone" placeholder="(00) 00000-0000" autocomplete="off"
                            class="mr-5">
                        <strong>CPF <a class="text-danger">*</a></strong>
                        <input type="text" name="cpf" placeholder="000.000.000-00" autocomplete="off" class="mb-4">
                    </div>
                    <div>
                        <strong>Email <a class="text-danger">*</a></strong>
                        <input type="text" name="email" placeholder="johncena@email.com" autocomplete="off"
                            class="w-25 mr-5">
                        <strong>Senha <a class="text-danger">*</a></strong>
                        <input type="text" name="senha" placeholder="*********" autocomplete="off" class="w-25">
                    </div>
                </div>
                <div class="card mb-3">
                    <h5 >Endereço</h5>
                </div>
                <div>
                    <strong>CEP <a class="text-danger">*</a></strong>
                    <input type="text" name="cep" placeholder="00000-000" autocomplete="off" class="mr-5">
                    <strong>Cidade <a class="text-danger">*</a></strong>
                    <input type="text" name="cidade" placeholder="Cidade" autocomplete="off" class="mr-5">
                    <strong>Estado <a class="text-danger">*</a></strong>
                    <input type="text" name="estado" placeholder="Estado" autocomplete="off" class="mr-5">
                </div>
                <div class="mt-3 mb-4">
                    <strong>Logradouro <a class="text-danger">*</a></strong>
                    <input type="text" name="logradouro" placeholder="Rua A, nº 100" autocomplete="off"
                        class="mr-5 w-50">
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
