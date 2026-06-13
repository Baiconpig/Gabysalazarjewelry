@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Bienvenido al sistema')
@section('kicker', 'Panel comercial')

@section('actions')
    <div class="d-flex gap-2">
        <a class="btn btn-outline-gold px-4" href="{{ route('admin.catalog') }}">Gestionar catalogo</a>
        <a class="btn btn-gold px-4" href="{{ route('admin.products.index') }}">Ver productos</a>
    </div>
@endsection

@section('content')
    <section class="dashboard-welcome reveal mb-4">
        <div>
            <p class="section-kicker">Gabriela Salazar Jewelry</p>
            <h2 class="serif-title">Cada cliente que entra busca una joya, pero tambien una historia que recordar.</h2>
            <p>
                Escucha con atencion, asesora con confianza y presenta cada pieza como un simbolo
                de amor, logro, familia o legado. La venta empieza cuando el cliente se siente entendido.
            </p>
            <div class="d-flex flex-wrap gap-3 mt-4">
                <a class="btn btn-gold px-4 py-3" href="{{ route('admin.products.index') }}">Preparar venta</a>
                <a class="btn btn-outline-gold px-4 py-3" href="{{ url('/') }}">Ver pagina de inicio</a>
            </div>
        </div>
        <div class="seller-note">
            <span>Frase del dia</span>
            <strong>"No vendemos joyas; ayudamos a elegir recuerdos que permanecen."</strong>
        </div>
    </section>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="content-card seller-tip">
                <p class="section-kicker">1. Escuchar</p>
                <h3>Pregunta por el momento.</h3>
                <p>Una joya se vende mejor cuando entiendes para quien es, que celebra y que emocion debe guardar.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content-card seller-tip">
                <p class="section-kicker">2. Guiar</p>
                <h3>Convierte dudas en confianza.</h3>
                <p>Explica materiales, diseno y cuidado con palabras sencillas. La claridad aumenta seguridad.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content-card seller-tip">
                <p class="section-kicker">3. Cerrar</p>
                <h3>Haz facil decidir.</h3>
                <p>Resume la mejor opcion y conecta la pieza con el significado que el cliente quiere regalar.</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Imagenes</p>
                <h3>{{ $imageCount }}</h3>
                <p>Total guardadas.</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Imagenes activas</p>
                <h3>{{ $activeImageCount }}</h3>
                <p>Visibles en inicio.</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Videos</p>
                <h3>{{ $videoCount }}</h3>
                <p>Total guardados.</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Videos activos</p>
                <h3>{{ $activeVideoCount }}</h3>
                <p>Visibles en inicio.</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Categorias</p>
                <h3>{{ $categoryCount }}</h3>
                <p>Clasificacion de productos.</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="content-card">
                <p class="section-kicker">Productos</p>
                <h3>{{ $productCount }}</h3>
                <p>Inventario comercial.</p>
            </div>
        </div>
    </div>
@endsection
