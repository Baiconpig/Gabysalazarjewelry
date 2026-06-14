<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vista previa | Gabriela Salazar Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="preview-gate-page">
    <main class="preview-gate-shell">
        <section class="preview-gate-card reveal">
            <div class="preview-gate-brand">
                <img
                    src="{{ asset('images/brand/logo-gjewelry-12.png') }}"
                    alt="Gabriela Salazar Jewelry"
                    class="preview-gate-logo"
                >
                <p class="preview-gate-kicker">Vista previa privada</p>
                <h1>Estamos trabajando en la pagina.</h1>
                <p class="preview-gate-copy">
                    Bienvenido a Gabriela Salazar Jewelry. Ingresa tus credenciales para ver el avance del sitio.
                </p>
            </div>

            <form method="POST" action="{{ route('public.preview.store') }}" class="preview-gate-form">
                @csrf

                @if ($errors->any())
                    <div class="preview-gate-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <label for="username">Usuario</label>
                <input
                    id="username"
                    name="username"
                    type="text"
                    value="{{ old('username') }}"
                    autocomplete="username"
                    required
                    autofocus
                >

                <label for="password">Contrasena</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                >

                <button type="submit">Ingresar</button>
                <a href="{{ route('login') }}">Ingresar al sistema administrativo</a>
            </form>
        </section>
    </main>
</body>
</html>
