@extends('admin.layout')

@section('title', 'Videos')
@section('heading', 'Videos')
@section('kicker', 'CRUD de inicio')

@section('actions')
    <a class="btn btn-gold px-4" href="{{ route('admin.videos.create') }}">Crear video</a>
@endsection

@section('content')
    <div class="image-table-wrap table-responsive">
        <table class="table table-brand align-middle">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>URL</th>
                    <th>Duracion</th>
                    <th>Orden</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($videos as $video)
                    <tr>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->category }}</td>
                        <td class="admin-path">{{ $video->video_url }}</td>
                        <td>{{ $video->duration ?: '-' }}</td>
                        <td>{{ $video->sort_order }}</td>
                        <td>{{ $video->is_active ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-gold" href="{{ route('admin.videos.edit', $video) }}">Editar</a>
                                <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" onsubmit="return confirm('¿Eliminar este video?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No hay videos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $videos->links() }}</div>
@endsection
