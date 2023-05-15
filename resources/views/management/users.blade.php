@extends('layouts.app')

@section('navbar', 'Usuários')

@php
    $title = 'usuário';
    $association = 'contas';
    $route_create = 'users/create';
    $columns = ['CPF', 'Nome', 'Email', 'Telefone', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create', 'association'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableUsers.js') }}"></script>
@endsection
