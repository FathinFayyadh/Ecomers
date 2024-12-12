 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid px-3 px-lg-5">
        <a class="navbar-brand  fw-bold" href="#!">Shoes Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Authentication Section -->
            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center p-1" id="userDropdown" href="{{route('profile.user')}}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-gray-600 p-2">{{ Auth::user()->name }}</span>
                            <img class="rounded-circle me-2" src="{{ asset('assets/img/undraw_profile.svg') }}"
                                alt="Profile Image" width="40" height="40">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i
                                        class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <div class="d-flex ms-auto">
                    <a class="btn btn-outline-dark mx-2" href="{{ route('login.create') }}">Login</a>
                    <a class="btn btn-outline-dark" href="{{ route('register.create') }}">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>