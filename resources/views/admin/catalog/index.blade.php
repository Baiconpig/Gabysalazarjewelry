@extends('admin.layout')

@section('title', 'Catalogo')
@section('heading', 'Catalogo')
@section('kicker', 'Productos y categorias')

@section('actions')
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-gold px-4" type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Crear categoria</button>
        <button class="btn btn-gold px-4" type="button" data-bs-toggle="modal" data-bs-target="#createProductModal">Crear producto</button>
    </div>
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="content-card">
                <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                    <div>
                        <p class="section-kicker mb-2">Tabla 1</p>
                        <h3 class="mb-0">Categorias</h3>
                    </div>
                    <button class="btn btn-sm btn-outline-gold align-self-start" type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Nueva categoria</button>
                </div>
                <div class="image-table-wrap table-responsive">
                    <table class="table table-brand align-middle js-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Productos</th>
                                <th class="text-end no-sort">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description ?: '-' }}</td>
                                    <td>{{ $category->products_count }}</td>
                                    <td>
                                        @include('admin.partials.actions', [
                                            'showRoute' => route('admin.categories.show', $category),
                                            'editModalId' => 'editCategoryModal'.$category->id,
                                            'deleteModalId' => 'deleteCategoryModal'.$category->id,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="content-card">
                <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                    <div>
                        <p class="section-kicker mb-2">Tabla 2</p>
                        <h3 class="mb-0">Productos</h3>
                    </div>
                    <button class="btn btn-sm btn-outline-gold align-self-start" type="button" data-bs-toggle="modal" data-bs-target="#createProductModal">Nuevo producto</button>
                </div>
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
            </div>
        </div>
    </div>

    @include('admin.categories.partials.modal-form', [
        'modalId' => 'createCategoryModal',
        'title' => 'Crear categoria',
        'action' => route('admin.categories.store'),
        'method' => 'POST',
        'category' => new \App\Models\Category(),
    ])
    @include('admin.products.partials.modal-form', [
        'modalId' => 'createProductModal',
        'title' => 'Crear producto',
        'action' => route('admin.products.store'),
        'method' => 'POST',
        'product' => new \App\Models\Product(),
        'categories' => $categories,
    ])

    @foreach ($categories as $category)
        @include('admin.categories.partials.modal-form', [
            'modalId' => 'editCategoryModal'.$category->id,
            'title' => 'Editar categoria',
            'action' => route('admin.categories.update', $category),
            'method' => 'PUT',
            'category' => $category,
        ])
        @include('admin.partials.delete-modal', [
            'modalId' => 'deleteCategoryModal'.$category->id,
            'title' => 'Eliminar categoria',
            'action' => route('admin.categories.destroy', $category),
            'message' => '¿Seguro que deseas eliminar la categoria "'.$category->name.'"?',
        ])
    @endforeach

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
