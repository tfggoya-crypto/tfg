@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')

<link rel="stylesheet" href="{{ asset('css/empleado/dashboard.css') }}">

<div class="container py-4">

    <h2 class="mb-4 fw-bold">
        Bienvenido, {{ auth()->user()->nombre }}
    </h2>

    @if(session('success'))

        <div class="alert alert-success"
             id="success-alert">

            {{ session('success') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="row g-4">

        @include('admin.cards.edificios-card')

        @include('admin.cards.incidencias-card')

        @include('admin.cards.usuarios-card')

    </div>

</div>

<script src="{{ asset('js/empleado/alerts.js') }}"></script>

@endsection