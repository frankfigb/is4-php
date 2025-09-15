<div class="header-social-links">
    @auth
        <div>{{ Auth::user()->name }}</div>
    @else
        <a href="{{ route('login') }}" class="login-btn">Login</a>
    @endauth

    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
</div>