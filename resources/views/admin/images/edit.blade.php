@extends('admin.layout')

@section('title', 'Editar imagen')
@section('heading', 'Editar imagen')
@section('kicker', 'Archivo visual')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.images.update', $image) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.images.partials.form')
    </form>
@endsection
