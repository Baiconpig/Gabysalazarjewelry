<div class="row g-4">
    <div class="col-md-5">
        <label class="form-label">Nombre</label>
        <input class="form-control admin-control" name="name" value="{{ old('name', $product->name) }}" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio</label>
        <input class="form-control admin-control" type="number" min="0" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Categoria</label>
        <select class="form-select admin-control" name="category_id" required>
            <option value="">Seleccionar categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((int) old('category_id', $product->category_id) === $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @if ($categories->isEmpty())
            <p class="mt-2 mb-0 text-warning">Primero crea una categoria.</p>
        @endif
    </div>
    <div class="col-md-6">
        <label class="form-label">Subir imagen</label>
        <input class="form-control admin-control" type="file" name="image_file" accept="image/*">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ruta o URL de imagen</label>
        <input class="form-control admin-control" name="image_path" value="{{ old('image_path', $product->image_path) }}" placeholder="/storage/product-images/archivo.jpg">
    </div>
    @if ($product->image_path)
        <div class="col-12">
            <p class="form-label mb-2">Imagen actual</p>
            <img class="product-preview" src="{{ $product->image_path }}" alt="{{ $product->name }}">
        </div>
    @endif
</div>
