@csrf
<div class="row g-4">
    <div class="col-md-6">
        <label class="form-label">Titulo</label>
        <input class="form-control admin-control" name="title" value="{{ old('title', $image->title) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Categoria</label>
        <input class="form-control admin-control" name="category" value="{{ old('category', $image->category) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Subir imagen</label>
        <input class="form-control admin-control" type="file" name="image_file" accept="image/*">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ruta o URL de imagen</label>
        <input class="form-control admin-control" name="image_path" value="{{ old('image_path', $image->image_path) }}" placeholder="/storage/brand-images/archivo.jpg">
    </div>
    <div class="col-md-6">
        <label class="form-label">Alt text</label>
        <input class="form-control admin-control" name="alt_text" value="{{ old('alt_text', $image->alt_text) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Fuente</label>
        <input class="form-control admin-control" name="source" value="{{ old('source', $image->source) }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Orden</label>
        <input class="form-control admin-control" type="number" min="0" name="sort_order" value="{{ old('sort_order', $image->sort_order ?? 0) }}">
    </div>
    <div class="col-md-4 d-flex align-items-end">
        <label class="form-check form-switch admin-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $image->is_active))>
            <span class="form-check-label">Activa en inicio</span>
        </label>
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button class="btn btn-gold px-4" type="submit">Guardar</button>
    <a class="btn btn-outline-gold px-4" href="{{ route('admin.images.index') }}">Cancelar</a>
</div>
