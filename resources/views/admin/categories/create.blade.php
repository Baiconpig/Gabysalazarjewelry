@extends('admin.layout')

@section('title', 'Crear categoria')
@section('heading', 'Crear categoria')
@section('kicker', 'CRUD de productos')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.categories.store') }}">
        @include('admin.categories.partials.form')
    </form>
@endsection
