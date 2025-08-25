@extends('layouts.app')

@section('title', 'About - Kelly Bootstrap Template')
@section('body-class', 'about-page')

@section('content')

  <!-- About Section -->
  <section id="about" class="about section">
    <div class="container">

      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4">
          <img src="{{ asset('assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-5 content">
          <h2>Illustrator &amp; UI/UX Designer</h2>
          <p class="fst-italic py-3">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>San Francisco, USA</span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>email@example.com</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
              </ul>
            </div>
          </div>
          <p class="py-3">
            Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut.
            Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
          </p>
        </div>
      </div>

    </div>
  </section><!-- /About Section -->

@endsection
