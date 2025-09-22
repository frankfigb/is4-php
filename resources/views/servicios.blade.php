@extends('layouts.format')

@section('app.name', 'Servicios')
@section('body_class', 'services-page')

@section('content')

<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
        <p>Estos son los servicios disponibles actualmente. Cada uno está diseñado para ofrecer soluciones claras, funcionales y personalizadas.</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @forelse ($servicios as $servicio)
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="icon flex-shrink-0">
                        <i class="{{ $servicio->icono }}"></i>
                    </div>
                    <div>
                        <h4 class="title">
                            <span class="stretched-link">{{ $servicio->titulo }}</span>
                        </h4>
                        <p class="description">{{ $servicio->descripcion }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No hay servicios registrados por el momento.</p>
                </div>
            @endforelse
        </div>
    </div>

</section><!-- /Services Section -->

@endsection
