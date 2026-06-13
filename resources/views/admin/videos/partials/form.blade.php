@csrf
<div class="row g-4">
    <div class="col-md-6">
        <label class="form-label">Titulo</label>
        <input class="form-control admin-control" name="title" value="{{ old('title', $video->title) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Categoria</label>
        <input class="form-control admin-control" name="category" value="{{ old('category', $video->category) }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">URL del video</label>
        <input class="form-control admin-control" name="video_url" value="{{ old('video_url', $video->video_url) }}" placeholder="https://..." required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Subir thumbnail</label>
        <input class="form-control admin-control" type="file" name="thumbnail_file" accept="image/*">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ruta o URL del thumbnail</label>
        <input class="form-control admin-control" name="thumbnail_path" value="{{ old('thumbnail_path', $video->thumbnail_path) }}" placeholder="/storage/video-thumbnails/archivo.jpg">
    </div>
    <div class="col-md-4">
        <label class="form-label">Duracion</label>
        <input class="form-control admin-control" name="duration" value="{{ old('duration', $video->duration) }}" placeholder="02:45">
    </div>
    <div class="col-md-4">
        <label class="form-label">Orden</label>
        <input class="form-control admin-control" type="number" min="0" name="sort_order" value="{{ old('sort_order', $video->sort_order ?? 0) }}">
    </div>
    <div class="col-md-4 d-flex align-items-end">
        <label class="form-check form-switch admin-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $video->is_active))>
            <span class="form-check-label">Activo en inicio</span>
        </label>
    </div>
    <div class="col-12">
        <label class="form-label">Descripcion</label>
        <textarea class="form-control admin-control" name="description" rows="4">{{ old('description', $video->description) }}</textarea>
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button class="btn btn-gold px-4" type="submit">Guardar</button>
    <a class="btn btn-outline-gold px-4" href="{{ route('admin.videos.index') }}">Cancelar</a>
</div>
