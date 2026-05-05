@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">Panel de administración</h2>

    <div class="row g-4">

        @include('admin.cards.edificios-card')

        @include('admin.cards.incidencias-card')
        
        @include('admin.cards.usuarios-card')

    </div>

</div>

@endsection