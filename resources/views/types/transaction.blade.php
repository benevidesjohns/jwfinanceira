@extends('layouts.app')

@section('navbar', 'Transaction Types')

@php
    $title = 'tipo de transação';
    $columns = ['Tipo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableTransactionTypes.js') }}"></script>
@endsection
