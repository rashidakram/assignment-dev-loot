<!-- Navbar Starts -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="/">
        <img class="navbar-logo" src="{!! url('images/devloot_logo.png') !!}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                @auth
                    {{auth()->user()->name}}
                    <li class="nav-item"><a href="{{ route('dashboard.index') }}" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                @endauth

                @guest
                <li class="nav-item"><a href="{{ route('view.login') }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('view.register') }}" class="nav-link">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar Ends -->

