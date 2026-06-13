@php
    $navLogo = 'images/brand/logo-gjewelry-12.png';
    $leftLinks = [
        ['label' => 'Inicio', 'route' => 'home'],
        ['label' => 'Historia', 'route' => 'public.history'],
        ['label' => 'Catalogo', 'route' => 'public.catalog'],
        ['label' => 'Galerias', 'route' => 'public.collections'],
        ['label' => 'Custom Made', 'route' => 'public.custom-made'],
    ];
    $rightLinks = [
        ['label' => 'Testimonios', 'route' => 'public.testimonials'],
        ['label' => 'Contacto', 'route' => 'public.contact'],
    ];
@endphp

<nav class="public-nav-shell">
    <div class="public-nav-inner">
        <div class="public-nav-links public-nav-links-left" aria-label="Navegacion principal izquierda">
            @foreach ($leftLinks as $link)
                <a
                    class="public-nav-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
                    href="{{ route($link['route']) }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <a class="public-nav-logo" href="{{ route('home') }}" aria-label="Gabriela Salazar Jewelry">
            @if ($navLogo)
                <img src="{{ asset($navLogo) }}" alt="Gabriela Salazar Jewelry">
            @else
                <span class="public-nav-logo-mark">G</span>
            @endif
        </a>

        <div class="public-nav-right">
            <div class="public-nav-links public-nav-links-right" aria-label="Navegacion principal derecha">
                @foreach ($rightLinks as $link)
                    <a
                        class="public-nav-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
                        href="{{ route($link['route']) }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="public-nav-actions" aria-label="Acciones">
                <a class="public-action-link {{ request()->routeIs('public.instagram') ? 'is-active' : '' }}" href="{{ route('public.instagram') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-width="1.8" d="M7.5 2.75h9A4.75 4.75 0 0 1 21.25 7.5v9a4.75 4.75 0 0 1-4.75 4.75h-9A4.75 4.75 0 0 1 2.75 16.5v-9A4.75 4.75 0 0 1 7.5 2.75Z"/>
                        <path fill="none" stroke="currentColor" stroke-width="1.8" d="M8.4 12a3.6 3.6 0 1 0 7.2 0a3.6 3.6 0 0 0-7.2 0Z"/>
                        <path fill="currentColor" d="M17.3 6.6a1.05 1.05 0 1 1-2.1 0a1.05 1.05 0 0 1 2.1 0Z"/>
                    </svg>
                    <span>Instagram</span>
                </a>
                <a class="public-action-link" href="{{ route('public.catalog') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-width="1.8" d="m20.5 20.5-4.7-4.7m2.2-5.3a7.5 7.5 0 1 1-15 0a7.5 7.5 0 0 1 15 0Z"/>
                    </svg>
                    <span>Buscar</span>
                </a>
                <a class="public-action-link" href="{{ route('admin.dashboard') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-width="1.8" d="M12 12.25a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm8 9a8 8 0 0 0-16 0"/>
                    </svg>
                    <span>Ingresar</span>
                </a>
                <a class="public-action-link" href="{{ route('public.catalog') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-width="1.8" d="M6.5 8.25h11l-.7 12H7.2l-.7-12Zm3-2.15a2.5 2.5 0 0 1 5 0v2.15h-5V6.1Z"/>
                    </svg>
                    <span>Carrito</span>
                </a>
            </div>
        </div>
    </div>
</nav>
