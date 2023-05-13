@extends('layouts.app')

@section('navbar', 'Minhas contas')

@php
    $title = 'conta';
    $route_create = 'accounts/create';
    $columns = ['Nº Conta', 'Tipo', 'Saldo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAccountsSelf.js') }}"></script>
@endsection
