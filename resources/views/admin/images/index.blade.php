@extends('admin.layout')

@section('title', 'Imagenes')
@section('heading', 'Imagenes')
@section('kicker', 'CRUD de inicio')

@section('actions')
    <a class="btn btn-gold px-4" href="{{ route('admin.images.create') }}">Crear imagen</a>
@endsection

@section('content')
    <div class="image-table-wrap table-responsive">
        <table class="table table-brand align-middle">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Ruta</th>
                    <th>Orden</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($images as $image)
                    <tr>
                        <td>{{ $image->title }}</td>
                        <td>{{ $image->category }}</td>
                        <td class="admin-path">{{ $image->image_path }}</td>
                        <td>{{ $image->sort_order }}</td>
                        <td>{{ $image->is_active ? 'Activa' : 'Inactiva' }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-gold" href="{{ route('admin.images.edit', $image) }}">Editar</a>
                                <form method="POST" action="{{ route('admin.images.destroy', $image) }}" onsubmit="return confirm('¿Eliminar esta imagen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No hay imagenes registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $images->links() }}</div>
@endsection
