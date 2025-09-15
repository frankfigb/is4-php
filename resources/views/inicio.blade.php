@extends('layouts.format')

@section('app.name')

@section('body_class', 'index-page')

@section('content')

    <section id="hero" class="hero section">
    <img src="{{$imagen_portada_url}}" alt="" data-aos="fade-in">

    <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <h2>Franco Figueredo</h2>
        <p>Soy Estudiante</p>
        <a href="{{ url('acerca-de') }}" class="btn-get-started">Conocer mas</a>
        </div>
    </div>
    </div>
</section><!-- /Hero Section -->
@endsection