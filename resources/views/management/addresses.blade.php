@extends('layouts.app')

@section('navbar', 'Endereços')

@php
    $title = 'endereço';
    $columns = ['CEP', 'Logradouro', 'Cidade', 'Estado', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAddresses.js') }}"></script>
@endsection
