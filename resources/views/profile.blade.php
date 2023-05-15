@extends('layouts.app')

@section('navbar', 'Perfil')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados do usuário</h4>
        </div>
        <span class="card-header"><a class="text-danger">*</a> Campo obrigatório</span>
        <div class="card-body">
            <form method="POST" action="/profile/{{ $user['id'] }}" id="edit-user">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <div>
                        <strong>Nome <a class="text-danger">*</a></strong>
                        <input type="text" name="nome" value="{{ $user['name'] }}" autocomplete="off"
                            class="w-25 mb-4 mr-5">
                        <strong>Telefone <a class="text-danger">*</a></strong>
                        <input type="text" name="telefone" value="{{ $user['phone_number'] }}" autocomplete="off"
                            class="mr-5">
                        <strong>CPF <a class="text-danger">*</a></strong>
                        <input type="text" name="cpf" value="{{ $user['cpf'] }}" autocomplete="off" class="mb-4">
                    </div>
                    <div>
                        <strong>Email <a class="text-danger">*</a></strong>
                        <input type="text" name="email" value="{{ $user['email'] }}" autocomplete="off"
                            class="w-25 mr-5">
                        <strong>Senha <a class="text-danger">*</a></strong>
                        <input type="text" name="senha" placeholder="*********" autocomplete="off" class="w-25">
                    </div>
                </div>
                <div class="mb-3">
                    <h5>Endereço</h5>
                </div>
                <div>
                    <strong>CEP <a class="text-danger">*</a></strong>
                    <input type="text" name="cep" value="{{ $address['cep'] }}" autocomplete="off" class="mr-5">
                    <strong>Cidade <a class="text-danger">*</a></strong>
                    <input type="text" name="cidade" value="{{ $address['city'] }}" autocomplete="off" class="mr-5">
                    <strong>Estado <a class="text-danger">*</a></strong>
                    <input type="text" name="estado" value="{{ $address['state'] }}" autocomplete="off" class="mr-5">
                </div>
                <div class="mt-3 mb-4">
                    <strong>Logradouro <a class="text-danger">*</a></strong>
                    <input type="text" name="logradouro" value="{{ $address['address'] }}" autocomplete="off"
                        class="mr-5 w-50">
                </div>
                <button type="submit" form="edit-user" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
