<div>
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm rounded mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ url('/assets/image/logo.png') }}" alt="Logo" width="36" height="36" class="me-2">
                <span class="fw-bold text-primary">NgajiYuk</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ route_has_active('home') ? 'active text-primary' : '' }} "
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold  {{ route_has_active('schedule') ? 'active text-primary' : '' }} "
                            href="{{ route('schedule') }}">Kelas & Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold  {{ route_has_active('gallery') ? 'active text-primary' : '' }} "
                            href="{{ route('gallery') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold  {{ route_has_active('contact') ? 'active text-primary' : '' }} "
                            href="{{ route('contact') }}">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold  {{ route_has_active('info') ? 'active text-primary' : '' }} "
                            href="{{ route('info') }}">Tentang Kami</a>
                    </li>
                    @guest
                        <li class="nav-item d-lg-none">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary px-3">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item d-lg-none dropdown">
                            <a class="nav-link fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
            <div class="align-items-center gap-2 d-none d-lg-flex">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-3">Login</a>
                @endguest
                @auth
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>
