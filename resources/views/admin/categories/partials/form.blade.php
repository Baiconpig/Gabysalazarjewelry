@csrf
@include('admin.categories.partials.fields')
<div class="d-flex gap-2 mt-4">
    <button class="btn btn-gold px-4" type="submit">Guardar</button>
    <a class="btn btn-outline-gold px-4" href="{{ route('admin.categories.index') }}">Cancelar</a>
</div>
