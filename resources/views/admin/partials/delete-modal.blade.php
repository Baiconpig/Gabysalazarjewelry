<div class="modal fade admin-modal" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ $action }}">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="{{ $modalId }}Label">{{ $title }}</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">{{ $message }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-gold px-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger px-4">Eliminar</button>
            </div>
        </form>
    </div>
</div>
