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
                <div class="col-lg-4 col-md-6 service-item d-flex align-items-start" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    
                    {{-- Ícono del servicio --}}
                    <div class="icon flex-shrink-0 me-3">
                        @if($servicio->imagen_icono && file_exists(public_path('storage/' . $servicio->imagen_icono)))
                            <img src="{{ asset('storage/' . $servicio->imagen_icono) }}"
                                 alt="Ícono del servicio"
                                 class="img-fluid rounded border border-gray-300 shadow-sm"
                                 style="max-width: 64px; max-height: 64px; object-fit: contain;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-white border border-gray-300 rounded text-muted"
                                 style="width: 64px; height: 64px; font-size: 0.75rem;">
                                Sin ícono
                            </div>
                        @endif
                    </div>

                    {{-- Contenido del servicio --}}
                    <div>
                        <h4 class="title mb-1">
                            <span class="stretched-link">{{ $servicio->titulo }}</span>
                        </h4>
                        <p class="description mb-0">{{ $servicio->descripcion }}</p>
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
