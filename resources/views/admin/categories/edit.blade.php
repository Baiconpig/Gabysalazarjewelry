@extends('admin.layout')

@section('title', 'Editar categoria')
@section('heading', 'Editar categoria')
@section('kicker', 'CRUD de productos')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.categories.update', $category) }}">
        @method('PUT')
        @include('admin.categories.partials.form')
    </form>
@endsection
