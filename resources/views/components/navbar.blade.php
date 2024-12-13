<!-- Navbar Start -->
<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="img/logo.jpg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a class="btn" href="/">Home</a></li>
                    <li><a class="btn" href="/blog">Blog</a></li>
                    <li><a class="btn" href="/contact">Contact Us</a></li>

                @if (Route::has('login'))
                @auth
                <li><a class="btn" href="{{ url('myblogposts') }}">My Blog Posts</a></li>
                <li><a class="btn" href="{{ url('createblogpost') }}">New Post</a></li>
                <li class="login_egg">
                    <x-app-layout>
                    </x-app-layout>
                </li>
                @else
                <li>
                    <a class="btn loginbtn" id="login_css" href="{{ route('login') }}" >Login</a>
                </li>
                <li>
                    <a class="btn btn-dark loginregister" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
                @endauth
                @endif
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->