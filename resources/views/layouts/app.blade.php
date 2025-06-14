{{-- resources/views/layouts/app.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $header }}</h1>
@stop

@section('content')
    {{ $slot }}
@stop