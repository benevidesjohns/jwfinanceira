@extends('layouts.app')

@section('navbar', 'Criar nova conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados para criar nova conta</h4>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="accounts/store" id="create-account">
                @csrf
                <div>
                    <strong>Valor da conta R$</strong>
                    <input type="text" autocomplete="off" class="mb-5 mr-5" name="balance">
                    <strong>Tipo de conta</strong>
                    <select class="form-select" name='account_types'>
                        <option>Selecione</option>
                        @foreach ($account_types as $account_type)
                            <option value='{{ $account_type['id'] }}'>
                                {{ $account_type['type'] }}</option>
                        @endforeach
                    </select>
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
