@extends('layouts.app')

@section('navbar', 'Tipos de conta')

@php
    $title = 'tipo de conta';
    $route_create = 'account/create';
    $columns = ['Tipo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns', 'route_create'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAccountTypes.js') }}"></script>
@endsection
