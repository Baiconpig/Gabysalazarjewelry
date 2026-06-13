@extends('layouts.public')

@section('title', 'Instagram')
@section('kicker', 'Instagram')
@section('heading', 'Conecta con nuestras piezas, colecciones y momentos recientes.')
@section('intro', 'Esta sección queda lista para conectar un feed oficial de Instagram o dirigir a la cuenta de la marca.')

@section('content')
    @php($instagramBlock = $pageBlocks->get('instagram-main'))
    <section class="section-block reveal">
        <div class="instagram-panel">
            <div>
                @if ($instagramBlock?->image_path)
                    <img class="cms-public-block-image" src="{{ asset($instagramBlock->image_path) }}" alt="{{ $instagramBlock->title }}">
                @endif
                <p class="section-kicker">{{ $instagramBlock?->eyebrow ?? 'Redes sociales' }}</p>
                <h3>{{ $instagramBlock?->title ?? 'Gabriela Salazar Jewelry' }}</h3>
                <p>{{ $instagramBlock?->body ?? 'Comparte lanzamientos, piezas personalizadas, anillos de compromiso, restauraciones y detalles del taller.' }}</p>
                <a class="btn btn-gold px-4 py-3" href="{{ $instagramBlock?->button_url ?: 'https://www.instagram.com/' }}" target="_blank" rel="noreferrer">{{ $instagramBlock?->button_label ?: 'Abrir Instagram' }}</a>
            </div>
            <div class="instagram-mock">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </section>
@endsection
