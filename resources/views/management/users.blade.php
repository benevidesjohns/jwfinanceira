@extends('layouts.app')

@section('navbar', 'Usuários')

@php
    $title = 'conta';
    $columns = ['CPF', 'Nome', 'Email', 'Telefone', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableUsers.js') }}"></script>
@endsection
