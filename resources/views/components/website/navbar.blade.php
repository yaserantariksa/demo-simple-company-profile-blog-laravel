<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">BLOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
            aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobileMenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-center" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="{{route('home')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="{{route('blog')}}">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="{{route('home')}}">Contact Us</a>
            </li>
          </ul>
        </div>
    </div>
</nav>
