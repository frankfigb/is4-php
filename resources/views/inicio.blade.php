@extends('layouts.app')

@section('title', config('app.name'))
@section('body-class', 'index-page')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">
  <img src="{{$imagen_portada_url}}" alt="" data-aos="fade-in">

  <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2>Franco Figueredo</h2>
        <p>Soy Estudiante</p>
        <a href="{{ url('about') }}" class="btn-get-started">About Me</a>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

@endsection