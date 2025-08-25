@extends('layouts.app')

@section('title', 'Resume - Kelly Bootstrap Template')
@section('body-class', 'resume-page')

@section('content')

  <!-- Resume Section -->
  <section id="resume" class="resume section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Resume</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row">

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <h3 class="resume-title">Summary</h3>

          <div class="resume-item pb-0">
            <h4>Brandon Johnson</h4>
            <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final deliverable.</em></p>
            <ul>
              <li>Portland par 127, Orlando, FL</li>
              <li>(123) 456-7891</li>
              <li>alice.barkley@example.com</li>
            </ul>
          </div><!-- End Resume Item -->

          <h3 class="resume-title">Education</h3>
          <div class="resume-item">
            <h4>Master of Fine Arts &amp; Graphic Design</h4>
            <h5>2015 - 2016</h5>
            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
            <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit.</p>
          </div><!-- End Resume Item -->

          <div class="resume-item">
            <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
            <h5>2010 - 2014</h5>
            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
            <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis.</p>
          </div><!-- End Resume Item -->

        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <h3 class="resume-title">Professional Experience</h3>

          <div class="resume-item">
            <h4>Senior Graphic Design Specialist</h4>
            <h5>2019 - Present</h5>
            <p><em>Experion, New York, NY</em></p>
            <ul>
              <li>Lead in the design, development, and implementation of communication materials</li>
              <li>Delegate tasks and supervise a design team of 7 people</li>
              <li>Ensure quality and accuracy of design outputs</li>
              <li>Manage project budgets ranging from $2,000 - $25,000</li>
            </ul>
          </div><!-- End Resume Item -->

          <div class="resume-item">
            <h4>Graphic Design Specialist</h4>
            <h5>2017 - 2018</h5>
            <p><em>Stepping Stone Advertising, New York, NY</em></p>
            <ul>
              <li>Developed marketing materials (logos, brochures, infographics, etc.)</li>
              <li>Handled multiple tasks and deadlines simultaneously</li>
              <li>Advised clients on best design practices</li>
              <li>Prepared 4+ presentations and proposals per month</li>
            </ul>
          </div><!-- End Resume Item -->

        </div>

      </div>

    </div>

  </section><!-- /Resume Section -->

@endsection
