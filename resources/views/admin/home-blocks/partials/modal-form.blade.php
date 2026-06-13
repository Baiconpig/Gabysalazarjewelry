<div class="modal fade admin-modal" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('admin.home-blocks.update', $block) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="page_slug" value="{{ $block->page_slug }}">

                <div class="modal-header">
                    <div>
                        <p class="section-kicker mb-1">{{ \App\Models\HomeBlock::PAGE_LABELS[$block->page_slug] ?? str($block->page_slug)->headline() }}</p>
                        <h2 class="modal-title" id="{{ $modalId }}Label">{{ $block->name }}</h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="cms-modal-preview">
                                <p class="section-kicker">Vista previa</p>
                                @if ($block->logo_path)
                                    <img class="cms-preview-logo" src="{{ asset($block->logo_path) }}" alt="Logo {{ $block->name }}">
                                @elseif ($block->slug === 'hero')
                                    <div class="cms-preview-logo-mark">G</div>
                                @endif

                                @if ($block->image_path)
                                    <img class="cms-preview-image" src="{{ asset($block->image_path) }}" alt="{{ $block->name }}">
                                @else
                                    <div class="cms-preview-image-empty">Imagen del bloque</div>
                                @endif

                                <span>{{ $block->eyebrow }}</span>
                                <strong>{{ $block->title }}</strong>
                                <p>{{ $block->body }}</p>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label" for="{{ $modalId }}Name">Nombre interno</label>
                                    <input id="{{ $modalId }}Name" class="form-control admin-control" type="text" name="name" value="{{ old('name', $block->name) }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="{{ $modalId }}Sort">Orden</label>
                                    <input id="{{ $modalId }}Sort" class="form-control admin-control" type="number" min="0" name="sort_order" value="{{ old('sort_order', $block->sort_order) }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="{{ $modalId }}Eyebrow">Texto pequeño / etiqueta</label>
                                    <input id="{{ $modalId }}Eyebrow" class="form-control admin-control" type="text" name="eyebrow" value="{{ old('eyebrow', $block->eyebrow) }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="{{ $modalId }}Title">Titulo</label>
                                    <input id="{{ $modalId }}Title" class="form-control admin-control" type="text" name="title" value="{{ old('title', $block->title) }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="{{ $modalId }}Body">Texto</label>
                                    <textarea id="{{ $modalId }}Body" class="form-control admin-control" name="body" rows="5">{{ old('body', $block->body) }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}ButtonLabel">Boton principal</label>
                                    <input id="{{ $modalId }}ButtonLabel" class="form-control admin-control" type="text" name="button_label" value="{{ old('button_label', $block->button_label) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}ButtonUrl">URL boton principal</label>
                                    <input id="{{ $modalId }}ButtonUrl" class="form-control admin-control" type="text" name="button_url" value="{{ old('button_url', $block->button_url) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}SecondaryLabel">Boton secundario</label>
                                    <input id="{{ $modalId }}SecondaryLabel" class="form-control admin-control" type="text" name="secondary_button_label" value="{{ old('secondary_button_label', $block->secondary_button_label) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}SecondaryUrl">URL boton secundario</label>
                                    <input id="{{ $modalId }}SecondaryUrl" class="form-control admin-control" type="text" name="secondary_button_url" value="{{ old('secondary_button_url', $block->secondary_button_url) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}ImagePath">Ruta imagen actual</label>
                                    <input id="{{ $modalId }}ImagePath" class="form-control admin-control" type="text" name="image_path" value="{{ old('image_path', $block->image_path) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="{{ $modalId }}ImageFile">Subir nueva imagen</label>
                                    <input id="{{ $modalId }}ImageFile" class="form-control admin-control" type="file" name="image_file" accept="image/*">
                                </div>

                                @if ($block->slug === 'hero')
                                    <div class="col-md-6">
                                        <label class="form-label" for="{{ $modalId }}LogoPath">Ruta logo actual</label>
                                        <input id="{{ $modalId }}LogoPath" class="form-control admin-control" type="text" name="logo_path" value="{{ old('logo_path', $block->logo_path) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="{{ $modalId }}LogoFile">Subir logo</label>
                                        <input id="{{ $modalId }}LogoFile" class="form-control admin-control" type="file" name="logo_file" accept="image/*">
                                    </div>
                                @else
                                    <input type="hidden" name="logo_path" value="{{ $block->logo_path }}">
                                @endif

                                <div class="col-12">
                                    <div class="form-check form-switch admin-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" id="{{ $modalId }}Active" @checked(old('is_active', $block->is_active))>
                                        <label class="form-check-label" for="{{ $modalId }}Active">Bloque activo en la pagina</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gold" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-gold">Guardar cambios</button>
                </div>
        </form>
    </div>
</div>
