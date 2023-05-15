@extends('layouts.app')

@section('navbar', 'Editar conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados da conta</h4>
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
        <div class="card-body d-flex justify-content-between">
            <form method="POST" action="{{ route('accounts/{id}/update', ['id' => $account["id"]]) }}" id="edit-account">
                @csrf
                @method('PUT')
                <div>
                    <strong>Nome da conta </strong>
                    <input type="text" name="nome" autocomplete="off" class="mb-5 mr-5"
                        value="{{ $account['name'] }}">
                    <strong>Tipo de conta </strong>
                    <select id="account_types" disabled class="form-select" name='tipo_de_conta'>
                        <option>{{ $type }}</option>
                        @foreach ($account_types as $account_type)
                            <option value='{{ $account_type['id'] }}'>
                                {{ $account_type['type'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" form="edit-account" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
