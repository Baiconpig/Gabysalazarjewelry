@csrf
@include('admin.products.partials.fields')
<div class="d-flex gap-2 mt-4">
    <button class="btn btn-gold px-4" type="submit" @disabled($categories->isEmpty())>Guardar</button>
    <a class="btn btn-outline-gold px-4" href="{{ route('admin.products.index') }}">Cancelar</a>
</div>
