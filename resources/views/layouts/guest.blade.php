{{-- resources/views/layouts/guest.blade.php --}}
@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Selamat Datang!')

@section('auth_body')
    {{ $slot }}
@endsection