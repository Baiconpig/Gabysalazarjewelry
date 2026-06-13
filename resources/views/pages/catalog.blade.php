@extends('layouts.public')

@section('title', 'Catalogo de joyas')
@section('kicker', 'Catalogo de joyas')
@section('heading', 'Piezas seleccionadas para celebrar momentos importantes.')
@section('intro', 'Explora productos cargados desde el sistema administrativo con imagen, categoria y precio.')

@section('content')
    @php($emptyBlock = $pageBlocks->get('catalog-empty'))
    <section class="section-block reveal">
        <div class="product-showcase-grid">
            @forelse ($products as $product)
                <article class="home-product-card">
                    <div class="home-product-media">
                        @if ($product->image_path)
                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <div class="home-product-empty"><span>G</span></div>
                        @endif
                    </div>
                    <div class="home-product-body">
                        <p class="home-product-meta">{{ $product->category?->name ?? 'Sin categoria' }}</p>
                        <h3>{{ $product->name }}</h3>
                        <p class="home-product-price">Q {{ number_format($product->price, 2) }}</p>
                    </div>
                </article>
            @empty
                <div class="content-card product-empty-state">
                    @if ($emptyBlock?->image_path)
                        <img class="cms-public-block-image" src="{{ asset($emptyBlock->image_path) }}" alt="{{ $emptyBlock->title }}">
                    @endif
                    <p class="section-kicker">{{ $emptyBlock?->eyebrow ?? 'Catalogo pendiente' }}</p>
                    <h3>{{ $emptyBlock?->title ?? 'Aun no hay productos publicados.' }}</h3>
                    <p>{{ $emptyBlock?->body ?? 'Cuando cargues productos desde el sistema apareceran en esta pagina.' }}</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
