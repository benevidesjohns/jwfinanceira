@extends('layouts.app')

@section('navbar', 'Editar tipo de conta')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="mb-0">Dados do tipo de conta</h4>
            <a href="{{ route('types/account') }}" class="btn btn-secondary ml-auto">
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
            <form method="POST" action="types/account/{{ $account_type['id'] }}" id="edit-account_type">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <div>
                        <strong>Nome <a class="text-danger">*</a></strong>
                        <input type="text" name="nome" autocomplete="off" value="{{ $account_type['type'] }}">
                    </div>
                </div>
                <button type="submit" form="edit-account_type" class="btn btn-secondary ml-auto">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
