@extends('admin.layout')

@section('title', 'Categorias')
@section('heading', 'Categorias')
@section('kicker', 'CRUD de productos')

@section('actions')
    <button class="btn btn-gold px-4" type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Crear categoria</button>
@endsection

@section('content')
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

    @include('admin.categories.partials.modal-form', [
        'modalId' => 'createCategoryModal',
        'title' => 'Crear categoria',
        'action' => route('admin.categories.store'),
        'method' => 'POST',
        'category' => new \App\Models\Category(),
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
@endsection
