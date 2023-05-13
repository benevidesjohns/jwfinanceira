@extends('layouts.app')

@section('navbar', 'Usuários')

@php
    $title = 'conta';
    $route_create = 'users/create';
    $columns = ['CPF', 'Nome', 'Email', 'Telefone', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableUsers.js') }}"></script>
@endsection
