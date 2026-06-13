@extends('layouts.public')

@section('title', 'Contacto')
@section('kicker', 'Contacto')
@section('heading', 'Hablemos de la joya, regalo o momento que quieres crear.')
@section('intro', 'Envia tus datos y el equipo de Gabriela Salazar Jewelry te dara seguimiento.')

@section('content')
    @php($asideBlock = $pageBlocks->get('contact-aside'))
    <section class="section-block reveal">
        <div class="row g-4">
            <div class="col-lg-7">
                <form class="content-card public-form" method="POST" action="{{ route('public.contact.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Nombre</label>
                            <input class="form-control admin-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone">Telefono</label>
                            <input class="form-control admin-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Correo</label>
                            <input class="form-control admin-control" id="email" type="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="message">Mensaje</label>
                            <textarea class="form-control admin-control" id="message" name="message" rows="6">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-gold px-4 py-3 mt-4" type="submit">Enviar mensaje</button>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="content-card">
                    @if ($asideBlock?->image_path)
                        <img class="cms-public-block-image" src="{{ asset($asideBlock->image_path) }}" alt="{{ $asideBlock->title }}">
                    @endif
                    <p class="section-kicker">{{ $asideBlock?->eyebrow ?? 'Guatemala' }}</p>
                    <h3>{{ $asideBlock?->title ?? 'Atencion cercana y especializada.' }}</h3>
                    <p>{{ $asideBlock?->body ?? 'Usa este canal para consultas generales, seguimiento de piezas, anillos de compromiso, restauraciones o regalos especiales.' }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
