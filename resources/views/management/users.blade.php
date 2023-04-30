@extends('layouts.app')

@section('navbar', 'Users')

@php
    $title = 'conta';
    $columns = ['ID', 'Nome', 'Email', 'Telefone', 'CPF', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableUsers.js') }}"></script>
@endsection
