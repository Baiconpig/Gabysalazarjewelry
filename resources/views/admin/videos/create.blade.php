@extends('admin.layout')

@section('title', 'Crear video')
@section('heading', 'Crear video')
@section('kicker', 'Inspiracion en video')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
        @include('admin.videos.partials.form')
    </form>
@endsection
