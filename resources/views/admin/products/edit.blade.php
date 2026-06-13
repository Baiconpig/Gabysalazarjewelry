@extends('admin.layout')

@section('title', 'Editar producto')
@section('heading', 'Editar producto')
@section('kicker', 'CRUD de productos')

@section('content')
    <form class="content-card" method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products.partials.form')
    </form>
@endsection
