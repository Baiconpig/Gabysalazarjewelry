@extends('layouts.public')

@section('title', 'Galerias de colecciones')
@section('kicker', 'Galerias de colecciones')
@section('heading', 'Archivo visual de piezas, campanas y detalles de marca.')
@section('intro', 'Una galeria alimentada desde la tabla de imagenes del sistema.')

@section('content')
    @php($emptyBlock = $pageBlocks->get('collections-empty'))
    <section class="section-block reveal">
        <div class="public-gallery-grid">
            @forelse ($images as $image)
                <article class="gallery-card">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->alt_text ?: $image->title }}">
                    <div>
                        <p class="section-kicker">{{ $image->category }}</p>
                        <h3>{{ $image->title }}</h3>
                    </div>
                </article>
            @empty
                <div class="content-card">
                    @if ($emptyBlock?->image_path)
                        <img class="cms-public-block-image" src="{{ asset($emptyBlock->image_path) }}" alt="{{ $emptyBlock->title }}">
                    @endif
                    <p class="section-kicker">{{ $emptyBlock?->eyebrow ?? 'Galeria pendiente' }}</p>
                    <h3>{{ $emptyBlock?->title ?? 'Aun no hay imagenes activas.' }}</h3>
                    <p>{{ $emptyBlock?->body ?? 'Sube imagenes desde el sistema para alimentar esta galeria.' }}</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
