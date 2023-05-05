@extends('layouts.app')

@section('navbar', 'Minhas transações')

@php
    $title = 'transação';
    $columns = ['Nº Conta', 'Tipo', 'Valor', 'Data', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableTransactionsSelf.js') }}"></script>
@endsection
