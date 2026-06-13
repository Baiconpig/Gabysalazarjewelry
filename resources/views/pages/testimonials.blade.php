@extends('layouts.public')

@section('title', 'Testimonios')
@section('kicker', 'Testimonios')
@section('heading', 'Historias de clientes que confiaron en una pieza especial.')
@section('intro', 'Cada testimonio refleja una experiencia de atencion, significado y joyeria hecha para permanecer.')

@section('content')
    @php($emptyBlock = $pageBlocks->get('testimonials-empty'))
    <section class="section-block reveal">
        <div class="row g-4">
            @forelse ($testimonials as $testimonial)
                <div class="col-md-6 col-lg-4">
                    <article class="content-card testimonial-card">
                        <p class="section-kicker">{{ $testimonial->occasion ?: 'Cliente' }}</p>
                        <h3>{{ $testimonial->client_name }}</h3>
                        <p>"{{ $testimonial->quote }}"</p>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="content-card">
                        @if ($emptyBlock?->image_path)
                            <img class="cms-public-block-image" src="{{ asset($emptyBlock->image_path) }}" alt="{{ $emptyBlock->title }}">
                        @endif
                        <p class="section-kicker">{{ $emptyBlock?->eyebrow ?? 'Pendiente' }}</p>
                        <h3>{{ $emptyBlock?->title ?? 'Aun no hay testimonios publicados.' }}</h3>
                        <p>{{ $emptyBlock?->body ?? 'Cuando se carguen testimonios activos apareceran en esta pagina.' }}</p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
