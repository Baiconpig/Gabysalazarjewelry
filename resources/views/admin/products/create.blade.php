@extends('admin.layout')

@section('title', 'Crear producto')
@section('heading', 'Crear producto')
@section('kicker', 'CRUD de productos')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @include('admin.products.partials.form')
    </form>
@endsection
