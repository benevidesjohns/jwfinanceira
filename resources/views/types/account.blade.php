@extends('layouts.app')

@section('navbar', 'Tipos de conta')

@php
    $title = 'tipo de conta';
    $columns = ['Tipo', 'Ação'];
@endphp

@section('content')
    @include('components.card', compact('title', 'columns'))
@endsection

@section('scripts')
    <script src="{{ asset('js/datatableAccountTypes.js') }}"></script>
@endsection
