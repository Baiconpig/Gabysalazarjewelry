@extends('admin.layout')

@section('title', 'Editar video')
@section('heading', 'Editar video')
@section('kicker', 'Inspiracion en video')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.videos.update', $video) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.videos.partials.form')
    </form>
@endsection
