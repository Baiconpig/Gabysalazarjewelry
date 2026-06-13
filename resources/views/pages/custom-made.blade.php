@extends('layouts.public')

@section('title', 'Custom Made')
@section('kicker', 'Custom Made')
@section('heading', 'Joyas hechas a la medida de una historia.')
@section('intro', 'Diseñamos piezas personalizadas desde la idea inicial hasta la fabricacion final, cuidando proporcion, significado y calidad.')

@section('content')
    @php
        $steps = collect([
            $pageBlocks->get('custom-made-step-1'),
            $pageBlocks->get('custom-made-step-2'),
            $pageBlocks->get('custom-made-step-3'),
        ])->filter();
    @endphp
    <section class="section-block reveal">
        <div class="row g-4">
            @foreach ($steps as $step)
                <div class="col-md-4">
                    <div class="content-card">
                        @if ($step->image_path)
                            <img class="cms-public-block-image" src="{{ asset($step->image_path) }}" alt="{{ $step->title }}">
                        @endif
                        <p class="section-kicker">{{ $step->eyebrow ?: $loop->iteration }}</p>
                        <h3>{{ $step->title }}</h3>
                        <p>{{ $step->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a class="btn btn-gold px-4 py-3" href="{{ route('public.custom-request') }}">Solicitar pieza personalizada</a>
        </div>
    </section>
@endsection
