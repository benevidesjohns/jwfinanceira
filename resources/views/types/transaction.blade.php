@extends('layouts.app')

@section('navbar', 'Tipos de transação')

@php
    $title = 'tipo de transação';
    $route_create = 'transaction/create';
    $columns = ['Tipo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableTransactionTypes.js') }}"></script>
@endsection
