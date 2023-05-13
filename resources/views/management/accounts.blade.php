@extends('layouts.app')

@section('navbar', 'Contas')

@php
    $title = 'conta';
    $route_create = 'accounts/create';
    $columns = ['Nº Conta', 'Tipo', 'Dono', 'Saldo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAccounts.js') }}"></script>
@endsection
