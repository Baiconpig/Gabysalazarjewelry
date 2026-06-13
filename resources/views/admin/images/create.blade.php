@extends('admin.layout')

@section('title', 'Crear imagen')
@section('heading', 'Crear imagen')
@section('kicker', 'Archivo visual')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data">
        @include('admin.images.partials.form')
    </form>
@endsection
