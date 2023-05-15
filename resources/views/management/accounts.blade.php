@extends('layouts.app')

@section('navbar', 'Contas')

@php
    $title = 'conta';
    $association = 'transações';
    $route_create = 'accounts/create';
    $columns = ['Nº Conta', 'Tipo', 'Dono', 'Saldo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create', 'association'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAccounts.js') }}"></script>
@endsection
