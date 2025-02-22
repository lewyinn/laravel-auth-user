@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    @if (session('success'))
        <div class="text-xl font-semibold text-center text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <h2>Selamat datang, {{ Auth::user()->name }}</h2>

@endsection
