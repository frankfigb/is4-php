@extends('layouts.app')

@section('title', 'Resume - Kelly Bootstrap Template')
@section('body-class', 'resume-page')

@section('content')

<!-- Resume Section -->
<section id="resume" class="resume section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Resumen</h2>
    <p>Explorá mi trayectoria laboral, educativa y profesional a lo largo del tiempo.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row">

      {{-- Columna izquierda: Laboral + Educativo --}}
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

        {{-- Experiencia Laboral --}}
        @foreach($laboral as $tipo)
          <h3 class="resume-title">{{ ucfirst($tipo->nombre) }}</h3>
          @foreach($tipo->experiencias as $exp)
            <div class="resume-item pb-0">
              <h4>{{ $exp->titulo ?? 'Sin título' }}</h4>
              <p><em>{{ $exp->descripcion ?? 'Sin descripción disponible' }}</em></p>
              <ul>
                <li>{{ $exp->desde ?? 'Fecha inicio no disponible' }} - {{ $exp->hasta ?? 'Fecha fin no disponible' }}</li>
              </ul>
            </div>
          @endforeach
        @endforeach

        {{-- Experiencia Educativa --}}
        @foreach($educativo as $tipo)
          <h3 class="resume-title">{{ ucfirst($tipo->nombre) }}</h3>
          @foreach($tipo->experiencias as $exp)
            <div class="resume-item">
              <h4>{{ $exp->titulo ?? 'Sin título' }}</h4>
              <h5>{{ $exp->desde ?? 'Inicio no disponible' }} - {{ $exp->hasta ?? 'Fin no disponible' }}</h5>
              <p><em>{{ $exp->institucion ?? 'Institución no especificada' }}</em></p>
              <p>{{ $exp->descripcion ?? 'Sin descripción' }}</p>
            </div>
          @endforeach
        @endforeach

      </div>

      {{-- Columna derecha: Profesional --}}
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        @foreach($profesional as $tipo)
          <h3 class="resume-title">{{ ucfirst($tipo->nombre) }}</h3>
          @foreach($tipo->experiencias as $exp)
            <div class="resume-item">
              <h4>{{ $exp->titulo ?? 'Sin título' }}</h4>
              <h5>{{ $exp->desde ?? 'Inicio no disponible' }} - {{ $exp->hasta ?? 'Fin no disponible' }}</h5>
              <p><em>{{ $exp->empresa ?? 'Empresa no especificada' }}</em></p>
              <ul>
                <li>{{ $exp->descripcion ?? 'Sin descripción' }}</li>
              </ul>
            </div>
          @endforeach
        @endforeach
      </div>

    </div>
  </div>

</section><!-- /Resume Section -->

@endsection
