@extends('layouts.app')

@section('navbar', 'Criar nova conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar nova conta</h4>
            <a href="{{ Request::is('accounts/create') ? route('accounts') : route('management/accounts') }}"
                class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
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
        <span class="card-header"><a class="text-danger">*</a> Campo obrigatório</span>
        <div class="card-body d-flex justify-content-between">
            <form method="POST"
                action="{{ Request::is('accounts/create') ? route('accounts/store') : route('management/accounts/store') }}"
                id="create-account">
                @csrf
                <div>
                    <strong>Nome da conta</strong>
                    <input type="text" class="mb-5 mr-5" name="name" placeholder="Minha Conta">
                    <strong>Tipo de conta <a class="text-danger">*</a></strong>
                    <select class="form-select mb-5 mr-5" name='tipo_de_conta'>
                        <option>Selecione</option>
                        @foreach ($account_types as $account_type)
                            <option value='{{ $account_type['id'] }}'>
                                {{ $account_type['type'] }}</option>
                        @endforeach
                    </select>
                    @if (Request::is('management/accounts/create'))
                        <strong>Usuário <a class="text-danger">*</a></strong>
                        <select class="form-select mb-5 mr-5" name='usuario'>
                            <option>Selecione</option>
                            @foreach ($users as $user)
                                <option value='{{ $user['id'] }}'>
                                    {{ $user['name'] }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <button type="submit" form="create-account" class="btn btn-secondary ml-auto">
                    <i class="fas fa-solid fa-plus"></i>
                    Criar
                </button>
            </form>
            {{-- <div>{{ $user_id }}</div> --}}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
