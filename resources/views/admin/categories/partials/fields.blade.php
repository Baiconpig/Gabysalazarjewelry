<div class="row g-4">
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input class="form-control admin-control" name="name" value="{{ old('name', $category->name) }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">Descripcion</label>
        <textarea class="form-control admin-control" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
    </div>
</div>
