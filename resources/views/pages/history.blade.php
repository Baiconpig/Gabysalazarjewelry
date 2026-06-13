@extends('layouts.public')

@section('title', 'Historia de la marca')
@section('kicker', 'Historia de la marca')
@section('heading', 'Una joyeria construida sobre confianza, oficio y legado.')
@section('intro', 'Gabriela Salazar Jewelry nacio en 1994 con la vision de crear joyas que representaran momentos unicos y significativos.')

@section('content')
    @php
        $mainBlock = $pageBlocks->get('history-main');
        $essenceBlock = $pageBlocks->get('history-essence');
        $imageBlocks = collect([
            $pageBlocks->get('history-image-1'),
            $pageBlocks->get('history-image-2'),
            $pageBlocks->get('history-image-3'),
            $pageBlocks->get('history-image-4'),
        ])->filter();
        $contentBlocks = collect([
            $pageBlocks->get('history-business-description'),
            $pageBlocks->get('history-mission'),
            $pageBlocks->get('history-vision'),
            $pageBlocks->get('history-values'),
            $pageBlocks->get('history-excellence'),
            $pageBlocks->get('history-personalization'),
            $pageBlocks->get('history-craftsmanship'),
            $pageBlocks->get('history-trust'),
            $pageBlocks->get('history-timelessness'),
            $pageBlocks->get('history-closeness'),
            $pageBlocks->get('history-legacy'),
            $pageBlocks->get('history-digital-project-objective'),
        ])->filter();
    @endphp
    <section class="section-block reveal">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="content-card">
                    @if ($mainBlock?->image_path)
                        <img class="cms-public-block-image" src="{{ asset($mainBlock->image_path) }}" alt="{{ $mainBlock->title }}">
                    @else
                        <div class="cms-public-image-placeholder">
                            <span>Imagen CMS</span>
                        </div>
                    @endif
                    <p class="section-kicker">{{ $mainBlock?->eyebrow ?? 'Desde 1994' }}</p>
                    <h3>{{ $mainBlock?->title ?? 'Mas de tres decadas acompanando historias.' }}</h3>
                    <p>{{ $mainBlock?->body ?? 'La marca combina tradicion joyera, fabricacion propia y atencion personalizada para crear piezas que pueden trascender generaciones.' }}</p>
                    <p>Su reputacion se basa en integridad, excelencia artesanal y la capacidad de convertir cada encargo en un simbolo personal.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="content-card">
                    @if ($essenceBlock?->image_path)
                        <img class="cms-public-block-image" src="{{ asset($essenceBlock->image_path) }}" alt="{{ $essenceBlock->title }}">
                    @else
                        <div class="cms-public-image-placeholder">
                            <span>Imagen CMS</span>
                        </div>
                    @endif
                    <p class="section-kicker">{{ $essenceBlock?->eyebrow ?? 'Esencia' }}</p>
                    <h3>{{ $essenceBlock?->title ?? 'Mas que joyas, creamos historias.' }}</h3>
                    <p>{{ $essenceBlock?->body ?? 'Disenamos simbolos de amor, exito, compromiso, familia y legado para clientes que valoran significado y calidad.' }}</p>
                </div>
            </div>
        </div>
    </section>

    @if ($imageBlocks->isNotEmpty())
        <section class="section-block reveal">
            <p class="section-kicker">Archivo visual</p>
            <h2 class="section-title serif-title">Momentos que construyen nuestra historia.</h2>
            <div class="history-image-grid mt-4">
                @foreach ($imageBlocks as $imageBlock)
                    <article class="history-image-card">
                        @if ($imageBlock->image_path)
                            <img src="{{ asset($imageBlock->image_path) }}" alt="{{ $imageBlock->title }}">
                        @else
                            <div class="history-image-placeholder">
                                <span>Imagen CMS</span>
                            </div>
                        @endif
                        <div>
                            <p class="section-kicker">{{ $imageBlock->eyebrow }}</p>
                            <h3>{{ $imageBlock->title }}</h3>
                            <p>{{ $imageBlock->body }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    @if ($contentBlocks->isNotEmpty())
        <section class="section-block reveal">
            <p class="section-kicker">Contenido institucional</p>
            <h2 class="section-title serif-title">Fundamentos de Gabriela Salazar Jewelry.</h2>
            <div class="history-content-grid mt-4">
                @foreach ($contentBlocks as $contentBlock)
                    <article class="history-content-card">
                        @if ($contentBlock->image_path)
                            <img class="cms-public-block-image" src="{{ asset($contentBlock->image_path) }}" alt="{{ $contentBlock->title }}">
                        @endif
                        <p class="section-kicker">{{ $contentBlock->eyebrow }}</p>
                        <h3>{{ $contentBlock->title }}</h3>
                        <p>{{ $contentBlock->body }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
