@extends('layouts.app')

@section('navbar', 'Addresses')

@php
    $title = 'endereço';
    $columns = ['ID', 'Cidade', 'Estado', 'CEP', 'Endereço', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAddresses.js') }}"></script>
@endsection
