@extends('admin.layout')

@section('title', 'Productos')
@section('heading', 'Productos')
@section('kicker', 'CRUD de productos')

@section('actions')
    <button class="btn btn-gold px-4" type="button" data-bs-toggle="modal" data-bs-target="#createProductModal">Crear producto</button>
@endsection

@section('content')
    <div class="image-table-wrap table-responsive">
        <table class="table table-brand align-middle js-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="no-sort">Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th class="text-end no-sort">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if ($product->image_path)
                                <img class="product-thumb" src="{{ $product->image_path }}" alt="{{ $product->name }}">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>Q {{ number_format((float) $product->price, 2) }}</td>
                        <td>{{ $product->category?->name }}</td>
                        <td>
                            @include('admin.partials.actions', [
                                'showRoute' => route('admin.products.show', $product),
                                'editModalId' => 'editProductModal'.$product->id,
                                'deleteModalId' => 'deleteProductModal'.$product->id,
                            ])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.products.partials.modal-form', [
        'modalId' => 'createProductModal',
        'title' => 'Crear producto',
        'action' => route('admin.products.store'),
        'method' => 'POST',
        'product' => new \App\Models\Product(),
        'categories' => $categories,
    ])

    @foreach ($products as $product)
        @include('admin.products.partials.modal-form', [
            'modalId' => 'editProductModal'.$product->id,
            'title' => 'Editar producto',
            'action' => route('admin.products.update', $product),
            'method' => 'PUT',
            'product' => $product,
            'categories' => $categories,
        ])
        @include('admin.partials.delete-modal', [
            'modalId' => 'deleteProductModal'.$product->id,
            'title' => 'Eliminar producto',
            'action' => route('admin.products.destroy', $product),
            'message' => '¿Seguro que deseas eliminar el producto "'.$product->name.'"?',
        ])
    @endforeach
@endsection
