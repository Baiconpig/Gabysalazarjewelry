<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistema') | Gabriela Salazar Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="admin-system">
    <div class="site-shell">
        <nav class="navbar navbar-expand-lg glass-nav px-3 px-lg-4">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Sistema GSJ</a>
            <a class="nav-link admin-icon-link ms-auto me-2" href="{{ route('admin.home-blocks.index') }}" aria-label="Abrir CMS Web" title="CMS Web">
                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor" d="M4 3h16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm0 2v4h16V5H4Zm0 6v8h6v-8H4Zm8 0v3h8v-3h-8Zm0 5v3h8v-3h-8Z"/>
                </svg>
            </a>
            <a class="nav-link admin-icon-link me-2" href="{{ route('admin.catalog') }}" aria-label="Abrir catalogo" title="Catalogo">
                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor" d="M4 4.5A2.5 2.5 0 0 1 6.5 2h11A2.5 2.5 0 0 1 20 4.5v15a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 19.5v-15Zm3 1.75v3.5h10v-3.5H7Zm0 6v1.5h10v-1.5H7Zm0 4v1.5h6v-1.5H7Z"/>
                </svg>
            </a>
            <form class="nav-logout-form me-2" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn nav-logout-btn" type="submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M10 3a2 2 0 0 0-2 2v3h2V5h8v14h-8v-3H8v3a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-8Zm-3.3 5.3L2 13l4.7 4.7l1.4-1.4L5.8 14H14v-2H5.8l2.3-2.3l-1.4-1.4Z"/>
                    </svg>
                    <span>Cerrar sesion</span>
                </button>
            </form>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav ms-auto gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.home-blocks.index') }}">CMS Web</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.images.index') }}">Imagenes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.videos.index') }}">Videos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.reports.requests') }}">Reportes</a></li>
                </ul>
            </div>
        </nav>

        <main class="admin-page">
            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                <div>
                    <p class="section-kicker mb-2">@yield('kicker', 'Panel administrativo')</p>
                    <h1 class="section-title serif-title mb-0">@yield('heading', 'Sistema')</h1>
                    <p class="admin-session mb-0">
                        {{ auth()->user()->email }} · {{ auth()->user()->role?->name ?? 'Sin rol' }}
                    </p>
                </div>
                <div>@yield('actions')</div>
            </div>

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
    </div>
</body>
</html>
