<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Gabriela Salazar Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body>
    <div class="site-shell">
        @include('partials.public-nav')

        <main>
            @php($pageHeroBlock = $pageHero ?? null)
            <section class="page-hero reveal">
                <div>
                    <p class="section-kicker">{{ $pageHeroBlock?->eyebrow ?? trim($__env->yieldContent('kicker')) }}</p>
                    <h1 class="serif-title">{{ $pageHeroBlock?->title ?? trim($__env->yieldContent('heading')) }}</h1>
                    <p>{{ $pageHeroBlock?->body ?? trim($__env->yieldContent('intro')) }}</p>
                </div>
                @if ($pageHeroBlock?->image_path)
                    <img class="page-hero-media" src="{{ asset($pageHeroBlock->image_path) }}" alt="{{ $pageHeroBlock->title }}">
                @endif
            </section>

            @if (session('status'))
                <div class="alert alert-success border-0">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger border-0">
                    <strong>Revisa los campos:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="footer-line text-center reveal">
            Creando recuerdos desde 1994.
        </footer>
    </div>
</body>
</html>
