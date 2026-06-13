<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gabriela Salazar Jewelry | Fine Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body>
    @php
        $heroBlock = $homeBlocks->get('hero');
        $productsBlock = $homeBlocks->get('products');
        $historyBlock = $homeBlocks->get('history');
        $purposeBlock = $homeBlocks->get('purpose');
        $missionBlock = $homeBlocks->get('mission');
        $servicesBlock = $homeBlocks->get('services');
        $videosBlock = $homeBlocks->get('videos');
        $valuesBlock = $homeBlocks->get('values');
        $clientsBlock = $homeBlocks->get('clients');
        $imagesBlock = $homeBlocks->get('images');
    @endphp
    <div class="site-shell">
        @include('partials.public-nav')

        @if ($heroBlock)
        <header class="hero home-split-hero">
            <div class="home-split-background" aria-hidden="true">
                <img src="{{ asset('images/home/g-taller-left.jpg') }}" alt="">
                <img src="{{ asset('images/home/g-taller-right.jpg') }}" alt="">
            </div>
            <div class="home-split-overlay" aria-hidden="true"></div>
            <div class="home-split-content">
                <div class="home-hero-copy reveal">
                    <p class="eyebrow">{{ $heroBlock?->eyebrow ?? 'Fine Jewelry • Est. 1994 • Guatemala' }}</p>
                    <h1 class="serif-title">{{ $heroBlock?->title ?? 'Mas que joyas, creamos historias.' }}</h1>
                    <p class="hero-copy">
                        {{ $heroBlock?->body ?? 'Gabriela Salazar Jewelry es una joyeria premium fundada en 1994, especializada en joyas finas, diseno personalizado y piezas creadas para conservar recuerdos, emociones y legados.' }}
                    </p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        @if ($heroBlock?->button_label)
                            <a href="{{ $heroBlock->button_url ?: '#' }}" class="btn btn-gold px-4 py-3">{{ $heroBlock->button_label }}</a>
                        @endif
                        @if ($heroBlock?->secondary_button_label)
                            <a href="{{ $heroBlock->secondary_button_url ?: '#' }}" class="btn btn-outline-gold px-4 py-3">{{ $heroBlock->secondary_button_label }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        @endif

        @if ($productsBlock)
        <section id="productos" class="section-block products-showcase reveal">
            <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-end">
                <div>
                    <p class="section-kicker">{{ $productsBlock?->eyebrow ?? 'Coleccion destacada' }}</p>
                    <h2 class="section-title serif-title">{{ $productsBlock?->title ?? 'Piezas creadas para momentos que permanecen.' }}</h2>
                </div>
                @if ($productsBlock?->button_label)
                    <a href="{{ $productsBlock->button_url ?: route('admin.products.index') }}" class="btn btn-outline-gold px-4 py-3">{{ $productsBlock->button_label }}</a>
                @endif
            </div>
            <div class="product-showcase-grid mt-4">
                @forelse ($featuredProducts as $product)
                    <article class="home-product-card">
                        <div class="home-product-media">
                            @if ($product->image_path)
                                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                            @else
                                <div class="home-product-empty">
                                    <span>G</span>
                                </div>
                            @endif
                        </div>
                        <div class="home-product-body">
                            <p class="home-product-meta">{{ $product->category?->name ?? 'Sin categoria' }}</p>
                            <h3>{{ $product->name }}</h3>
                            <p class="home-product-price">Q {{ number_format($product->price, 2) }}</p>
                        </div>
                    </article>
                @empty
                    <div class="content-card product-empty-state">
                        <p class="section-kicker">Catalogo pendiente</p>
                        <h3>Aun no hay productos publicados.</h3>
                        <p class="mb-0">
                            Cuando agregues productos desde el sistema, apareceran aqui con su imagen,
                            categoria y precio.
                        </p>
                    </div>
                @endforelse
            </div>
        </section>
        @endif

        @if ($historyBlock)
        <section id="historia" class="section-block reveal">
            <p class="section-kicker">{{ $historyBlock?->eyebrow ?? 'Historia y legado' }}</p>
            <h2 class="section-title serif-title">{{ $historyBlock?->title ?? 'Tres decadas creando simbolos memorables.' }}</h2>
            <p class="section-copy">
                {{ $historyBlock?->body ?? 'Desde 1994, la marca ha construido una reputacion basada en confianza, calidad y excelencia artesanal. Su combinacion de tradicion joyera, atencion personalizada y fabricacion propia mantiene viva una propuesta que trasciende generaciones.' }}
            </p>
            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="metric">
                        <strong data-count="30" data-suffix="+">0+</strong>
                        <span>anos de trayectoria</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <strong data-count="1994">0</strong>
                        <span>fundacion de la marca</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <strong data-count="100" data-suffix="%">0%</strong>
                        <span>enfoque artesanal y personalizado</span>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if ($purposeBlock || $missionBlock)
        <section class="section-block reveal">
            <div class="row g-4">
                @if ($purposeBlock)
                    <div class="col-lg-6">
                        <div class="content-card">
                            <p class="section-kicker">{{ $purposeBlock->eyebrow }}</p>
                            <h3>{{ $purposeBlock->title }}</h3>
                            <p>{{ $purposeBlock->body }}</p>
                        </div>
                    </div>
                @endif
                @if ($missionBlock)
                    <div class="col-lg-6">
                        <div class="content-card">
                            <p class="section-kicker">{{ $missionBlock->eyebrow }}</p>
                            <h3>{{ $missionBlock->title }}</h3>
                            <p>{{ $missionBlock->body }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        @endif

        @if ($servicesBlock)
        <section id="servicios" class="section-block reveal">
            <p class="section-kicker">{{ $servicesBlock?->eyebrow ?? 'Modelo de negocio' }}</p>
            <h2 class="section-title serif-title">{{ $servicesBlock?->title ?? 'Servicios de joyeria fina y alta joyeria.' }}</h2>
            <div class="mt-4">
                <span class="service-pill">Venta de joyeria fina</span>
                <span class="service-pill">Diseno personalizado</span>
                <span class="service-pill">Fabricacion propia</span>
                <span class="service-pill">Reparacion y restauracion</span>
                <span class="service-pill">Anillos de compromiso</span>
                <span class="service-pill">Joyas para ocasiones especiales</span>
                <span class="service-pill">Piezas exclusivas</span>
            </div>
        </section>
        @endif

        @if ($videosBlock)
        <section class="section-block reveal">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <p class="section-kicker">{{ $videosBlock?->eyebrow ?? 'React integrado' }}</p>
                    <h2 class="section-title serif-title">{{ $videosBlock?->title ?? 'Inspiracion en video.' }}</h2>
                    <p class="section-copy">
                        {{ $videosBlock?->body ?? 'Este modulo usa React para buscar entre videos de marca, servicios y contenido educativo. La busqueda actualiza la lista sin recargar la pagina.' }}
                    </p>
                </div>
                <div class="col-lg-7">
                    <div class="react-panel">
                        <script type="application/json" id="home-videos-data">@json($homeVideosPayload)</script>
                        <div id="searchable-video-list"></div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if ($valuesBlock)
        <section id="valores" class="section-block reveal">
            <p class="section-kicker">{{ $valuesBlock?->eyebrow ?? 'Personalidad y valores' }}</p>
            <h2 class="section-title serif-title">{{ $valuesBlock?->title ?? 'Sofisticada, cercana, confiable y atemporal.' }}</h2>
            <div class="row g-4 mt-2">
                @foreach ([
                    ['◇', 'Integridad', 'Honestidad y transparencia en cada relacion y cada pieza.'],
                    ['✦', 'Excelencia', 'Perfeccion y cuidado en cada detalle.'],
                    ['♛', 'Confianza', 'Relaciones duraderas basadas en credibilidad.'],
                    ['◌', 'Artesania', 'Trabajo hecho a mano con precision y experiencia.'],
                    ['✧', 'Innovacion', 'Evolucion constante sin perder la esencia.'],
                    ['♡', 'Legado', 'Joyas pensadas para acompanar generaciones.'],
                ] as [$icon, $title, $copy])
                    <div class="col-md-6 col-lg-4">
                        <div class="content-card">
                            <div class="value-icon">{{ $icon }}</div>
                            <h3>{{ $title }}</h3>
                            <p>{{ $copy }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        @if ($clientsBlock)
        <section class="section-block reveal">
            <p class="section-kicker">{{ $clientsBlock->eyebrow }}</p>
            <h2 class="section-title serif-title">{{ $clientsBlock->title }}</h2>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="content-card">
                        <p class="section-kicker">Cliente ideal</p>
                        <h3>Mujer, 25 a 65 anos</h3>
                        <ul class="mb-0">
                            <li>Busca elegancia, exclusividad y calidad.</li>
                            <li>Valora piezas con significado personal.</li>
                            <li>Prefiere disenos atemporales y memorables.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-card">
                        <p class="section-kicker">Cliente ideal</p>
                        <h3>Hombre, 25 a 65 anos</h3>
                        <ul class="mb-0">
                            <li>Busca anillos de compromiso y regalos especiales.</li>
                            <li>Valora piezas con alto significado sentimental.</li>
                            <li>Necesita asesoria cercana y confiable.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if ($imagesBlock)
        <section id="imagenes" class="section-block reveal">
            <p class="section-kicker">{{ $imagesBlock?->eyebrow ?? 'Archivo visual' }}</p>
            <h2 class="section-title serif-title">{{ $imagesBlock?->title ?? 'Tabla para guardar imagenes de la marca.' }}</h2>
            <p class="section-copy">
                {{ $imagesBlock?->body ?? 'Aqui podremos ir registrando imagenes de productos, campanas, packaging, redes sociales y materiales institucionales.' }}
            </p>
            <div class="image-table-wrap table-responsive mt-4">
                <table class="table table-brand align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Alt text</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brandImages as $image)
                            <tr>
                                <td>{{ $image->title }}</td>
                                <td>{{ $image->category }}</td>
                                <td>{{ $image->image_path }}</td>
                                <td>{{ $image->alt_text ?: 'Pendiente' }}</td>
                                <td>{{ $image->is_active ? 'Activa' : 'Inactiva' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Todavia no hay imagenes registradas. La tabla ya esta lista para comenzar a guardarlas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        @endif

        <footer class="footer-line text-center reveal">
            Creando recuerdos desde 1994.
        </footer>
    </div>
</body>
</html>
