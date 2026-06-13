@extends('layouts.public')

@section('title', 'Formulario para piezas personalizadas')
@section('kicker', 'Piezas personalizadas')
@section('heading', 'Cuéntanos la joya que quieres crear.')
@section('intro', 'Completa este formulario y el equipo revisara tu solicitud para iniciar una propuesta personalizada.')

@section('content')
    <section class="section-block reveal">
        <form class="content-card public-form" method="POST" action="{{ route('public.custom-request.store') }}">
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
                <div class="col-md-6">
                    <label class="form-label" for="email">Correo</label>
                    <input class="form-control admin-control" id="email" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="budget">Presupuesto estimado</label>
                    <input class="form-control admin-control" id="budget" name="budget" value="{{ old('budget') }}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="message">Describe la pieza</label>
                    <textarea class="form-control admin-control" id="message" name="message" rows="6">{{ old('message') }}</textarea>
                </div>
            </div>
            <button class="btn btn-gold px-4 py-3 mt-4" type="submit">Enviar solicitud</button>
        </form>
    </section>
@endsection
