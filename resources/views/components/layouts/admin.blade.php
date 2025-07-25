<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NgajiYuk Admin</title>
    <link rel="icon" href="{{ url('/assets/image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    @livewireStyles
</head>

<body class="antialiased">
    <div class="container-fluid">
        <div class="row flex-nowrap min-vh-100">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white border-end shadow-sm">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-4 min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <img src="{{ url('/assets/image/logo.png') }}" alt="Logo" width="36" height="36"
                            class="me-2">
                        <span class="fs-5 fw-bold d-none d-sm-inline text-primary">NgajiYuk</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-auto w-100 mt-4">
                        <li class="nav-item">
                            <a href="{{ route('admin') }}"
                                class="nav-link {{ route_has_active_admin('') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-house-door me-2"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-class') }}"
                                class="nav-link  {{ route_has_active_admin('class') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-journal-text me-2"></i> Kelas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-teacher') }}"
                                class="nav-link  {{ route_has_active_admin('teacher') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-person-video3 me-2"></i> Guru
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-location') }}"
                                class="nav-link  {{ route_has_active_admin('location') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-geo-alt-fill me-2"></i> Lokasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-user') }}"
                                class="nav-link {{ route_has_active_admin('user') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-people me-2"></i> Peserta
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-gallery') }}"
                                class="nav-link {{ route_has_active_admin('gallery') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-images me-2"></i> Galeri
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-contact') }}"
                                class="nav-link {{ route_has_active_admin('contact') ? 'active' : 'text-dark' }}">
                                <i class="bi bi-person-heart me-2"></i> Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col p-0">
                <nav class="navbar navbar-light bg-white shadow-sm px-4">
                    <div class="container-fluid">
                        <a href="{{ route('home') }}" class="btn btn-success">
                            Halaman User
                        </a>
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin-profile') }}">
                                            <i class="bi bi-person-circle me-2"></i> Pengaturan Profil
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <main class="p-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    @stack('scripts')
    {{-- <livewire:livewire-alert::scripts />
    <livewire:livewire-alert::flash /> --}}
</body>

</html>
