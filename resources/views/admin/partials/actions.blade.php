<div class="d-flex justify-content-end gap-2">
    <a class="btn btn-sm btn-icon btn-view" href="{{ $showRoute }}" aria-label="Ver" title="Ver">
        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M12 5c5.5 0 9.6 5.1 9.8 5.4a2.5 2.5 0 0 1 0 3.2C21.6 13.9 17.5 19 12 19s-9.6-5.1-9.8-5.4a2.5 2.5 0 0 1 0-3.2C2.4 10.1 6.5 5 12 5Zm0 2C7.6 7 4.2 11.1 3.8 12c.4.9 3.8 5 8.2 5s7.8-4.1 8.2-5C19.8 11.1 16.4 7 12 7Zm0 2.25A2.75 2.75 0 1 1 12 14.75A2.75 2.75 0 0 1 12 9.25Z"/>
        </svg>
    </a>
    <button class="btn btn-sm btn-icon btn-edit" type="button" data-bs-toggle="modal" data-bs-target="#{{ $editModalId }}" aria-label="Editar" title="Editar">
        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M4 17.25V20h2.75L17.9 8.85l-2.75-2.75L4 17.25Zm15.65-10.5a1 1 0 0 0 0-1.4l-1-1a1 1 0 0 0-1.4 0l-.8.8l2.75 2.75l.45-.45Z"/>
        </svg>
    </button>
    <button class="btn btn-sm btn-icon btn-delete" type="button" data-bs-toggle="modal" data-bs-target="#{{ $deleteModalId }}" aria-label="Eliminar" title="Eliminar">
        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="currentColor" d="M9 3h6l1 2h4v2H4V5h4l1-2Zm1 6h2v9h-2V9Zm4 0h2v9h-2V9ZM6 9h2l1 11h6l1-11h2l-1.2 12.2A2 2 0 0 1 14.8 23H9.2a2 2 0 0 1-2-1.8L6 9Z"/>
        </svg>
    </button>
</div>
