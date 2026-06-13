@extends('admin.layout')

@section('title', 'Reportes de solicitudes')
@section('heading', 'Reportes de solicitudes')
@section('kicker', 'Seguimiento comercial')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="content-card"><p class="section-kicker">Total</p><h3>{{ $totalCount }}</h3><p>Solicitudes registradas.</p></div>
        </div>
        <div class="col-md-3">
            <div class="content-card"><p class="section-kicker">Custom Made</p><h3>{{ $customCount }}</h3><p>Piezas personalizadas.</p></div>
        </div>
        <div class="col-md-3">
            <div class="content-card"><p class="section-kicker">Citas</p><h3>{{ $appointmentCount }}</h3><p>Agenda solicitada.</p></div>
        </div>
        <div class="col-md-3">
            <div class="content-card"><p class="section-kicker">Contacto</p><h3>{{ $contactCount }}</h3><p>Mensajes generales.</p></div>
        </div>
    </div>

    <div class="image-table-wrap table-responsive">
        <table class="table table-brand align-middle js-data-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Fecha preferida</th>
                    <th>Estado</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ str($request->type)->replace('_', ' ')->title() }}</td>
                        <td>{{ $request->name }}</td>
                        <td>
                            {{ $request->email ?: 'Sin correo' }}<br>
                            <span class="admin-session">{{ $request->phone ?: 'Sin telefono' }}</span>
                        </td>
                        <td>{{ $request->preferred_date?->format('d/m/Y H:i') ?: 'Sin fecha' }}</td>
                        <td>{{ $request->status }}</td>
                        <td class="admin-path">{{ $request->message ?: 'Sin mensaje' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
