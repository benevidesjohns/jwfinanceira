@extends('layouts.app')

@section('navbar', 'Minhas transações')

@php
    $title = 'transação';
    $route_create = 'transactions/create';
    $columns = ['Nº Conta', 'Tipo', 'Valor', 'Data', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableTransactionsSelf.js') }}"></script>
@endsection
