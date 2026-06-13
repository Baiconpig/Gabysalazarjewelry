@extends('admin.layout')

@section('title', 'Ver producto')
@section('heading', $product->name)
@section('kicker', 'Detalle de producto')

@section('actions')
    <div class="d-flex gap-2">
        <a class="btn btn-outline-gold px-4" href="{{ route('admin.products.edit', $product) }}">Editar</a>
        <a class="btn btn-gold px-4" href="{{ route('admin.catalog') }}">Volver</a>
    </div>
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="content-card">
                @if ($product->image_path)
                    <img class="product-detail-image" src="{{ $product->image_path }}" alt="{{ $product->name }}">
                @else
                    <div class="product-detail-empty">Sin imagen</div>
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="content-card">
                <p class="section-kicker">Informacion</p>
                <h3>{{ $product->name }}</h3>
                <p class="mb-2">Precio: <strong>Q {{ number_format((float) $product->price, 2) }}</strong></p>
                <p class="mb-0">Categoria: <strong>{{ $product->category?->name }}</strong></p>
            </div>
        </div>
    </div>
@endsection
