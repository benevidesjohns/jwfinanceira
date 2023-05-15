@extends('layouts.app')

@section('navbar', 'Tipos de transação')

@php
    $title = 'tipo de transação';
    $association = 'transações';
    $route_create = 'transaction/create';
    $columns = ['Tipo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create', 'association'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableTransactionTypes.js') }}"></script>
@endsection
