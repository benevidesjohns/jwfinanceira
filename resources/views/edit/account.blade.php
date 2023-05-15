@extends('layouts.app')

@section('navbar', 'Editar conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados da conta</h4>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="/accounts/{{ $account['id'] }}" id="create-account">
                @csrf
                @method('PUT')
                <div>
                    <strong>Valor da conta R$</strong>
                    <input type="text" autocomplete="off" class="mb-5 mr-5" value="{{ $account['balance'] }}">
                    <strong>Tipo de conta</strong>
                    <select id="account_types" class="form-select" name='account_types'>
                        <option>{{ $type }}</option>
                        @foreach ($account_types as $account_type)
                            <option value='{{ $account_type['id'] }}'>
                                {{ $account_type['type'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" form="create-account" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
            {{-- <div>{{ $user_id }}</div> --}}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
