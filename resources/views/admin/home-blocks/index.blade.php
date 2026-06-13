@extends('admin.layout')

@section('title', 'CMS Web')
@section('heading', 'CMS Web')
@section('kicker', 'Paginas y bloques editables')

@section('actions')
    <a class="btn btn-outline-gold px-4" href="{{ url('/') }}" target="_blank" rel="noreferrer">Ver pagina</a>
@endsection

@section('content')
    @foreach ($blocks->groupBy('page_slug') as $pageSlug => $pageBlocks)
        <section class="cms-page-section">
            <div class="cms-page-heading">
                <div>
                    <p class="section-kicker mb-2">{{ $pageSlug }}</p>
                    <h2>{{ $pageLabels[$pageSlug] ?? str($pageSlug)->headline() }}</h2>
                </div>
                @if ($pageSlug === 'home')
                    <a class="btn btn-outline-gold px-4" href="{{ url('/') }}" target="_blank" rel="noreferrer">Ver pagina</a>
                @endif
            </div>

            <div class="cms-editor-grid">
                @foreach ($pageBlocks as $block)
                    <article class="cms-block-card">
                        <div class="cms-block-preview">
                            @if ($block->image_path)
                                <img src="{{ asset($block->image_path) }}" alt="{{ $block->name }}">
                            @else
                                <div class="cms-block-placeholder">
                                    @if ($block->slug === 'hero' && $block->logo_path)
                                        <img src="{{ asset($block->logo_path) }}" alt="Logo {{ $block->name }}">
                                    @elseif ($block->slug === 'hero')
                                        <span>G</span>
                                    @else
                                        <span>{{ str($block->name)->substr(0, 1) }}</span>
                                    @endif
                                </div>
                            @endif
                            <div class="cms-block-overlay">
                                <span>{{ $block->is_active ? 'Activo' : 'Inactivo' }}</span>
                                <strong>{{ $block->name }}</strong>
                            </div>
                        </div>
                        <div class="cms-block-body">
                            <p class="section-kicker">Bloque {{ $block->sort_order }}</p>
                            <h3>{{ $block->title ?: $block->name }}</h3>
                            <p>{{ str($block->body)->limit(130) }}</p>
                            <button class="btn btn-gold w-100" type="button" data-bs-toggle="modal" data-bs-target="#editHomeBlockModal{{ $block->id }}">
                                Editar bloque
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endforeach

    @foreach ($blocks as $block)
        @include('admin.home-blocks.partials.modal-form', [
            'modalId' => 'editHomeBlockModal'.$block->id,
            'block' => $block,
        ])
    @endforeach
@endsection
