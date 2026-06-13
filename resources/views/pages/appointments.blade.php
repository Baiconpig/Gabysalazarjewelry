@extends('layouts.public')

@section('title', 'Agenda de citas')
@section('kicker', 'Agenda de citas')
@section('heading', 'Reserva un espacio para recibir asesoria personalizada.')
@section('intro', 'Solicita una fecha y el equipo confirmara disponibilidad para atenderte con calma y detalle.')

@section('content')
    <section class="section-block reveal">
        <form class="content-card public-form" method="POST" action="{{ route('public.appointments.store') }}">
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
                    <label class="form-label" for="preferred_date">Fecha preferida</label>
                    <input class="form-control admin-control" id="preferred_date" type="datetime-local" name="preferred_date" value="{{ old('preferred_date') }}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="message">Motivo de la cita</label>
                    <textarea class="form-control admin-control" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                </div>
            </div>
            <button class="btn btn-gold px-4 py-3 mt-4" type="submit">Solicitar cita</button>
        </form>
    </section>
@endsection
