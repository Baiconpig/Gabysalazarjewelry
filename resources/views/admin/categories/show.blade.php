@extends('admin.layout')

@section('title', 'Ver categoria')
@section('heading', $category->name)
@section('kicker', 'Detalle de categoria')

@section('actions')
    <div class="d-flex gap-2">
        <a class="btn btn-outline-gold px-4" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
        <a class="btn btn-gold px-4" href="{{ route('admin.catalog') }}">Volver</a>
    </div>
@endsection

@section('content')
    <div class="content-card">
        <p class="section-kicker">Descripcion</p>
        <p>{{ $category->description ?: 'Sin descripcion.' }}</p>
        <hr class="border-secondary-subtle">
        <p class="mb-0">Productos asociados: <strong>{{ $category->products_count }}</strong></p>
    </div>
@endsection
