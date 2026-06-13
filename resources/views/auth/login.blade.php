<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Gabriela Salazar Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="admin-system">
    <div class="site-shell auth-shell">
        <main class="auth-card reveal">
            <div class="auth-brand">
                <div class="brand-mark auth-mark">G</div>
                <p class="section-kicker mb-2">Sistema privado</p>
                <h1 class="serif-title">Ingreso administrativo</h1>
                <p>Accede para gestionar imagenes, videos, categorias y productos del inicio.</p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="auth-form">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger border-0">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label" for="email">Correo</label>
                    <input
                        id="email"
                        class="form-control admin-control"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        autofocus
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Contrasena</label>
                    <input
                        id="password"
                        class="form-control admin-control"
                        type="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <div class="form-check admin-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Mantener sesion iniciada</label>
                </div>

                <button class="btn btn-gold w-100 py-3" type="submit">Ingresar al sistema</button>
                <a class="btn btn-outline-gold w-100 py-3 mt-3" href="{{ url('/') }}">Volver al inicio</a>
            </form>
        </main>
    </div>
</body>
</html>
