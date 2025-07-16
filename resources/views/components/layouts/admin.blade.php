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
    @livewireStyles
</head>

<body class="antialiased">
    <div class="container-fluid">
        <div class="row flex-nowrap min-vh-100">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white border-end shadow-sm">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-4 min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <img src="{{ url('/assets/image/logo.png') }}" alt="Logo" width="36" height="36"
                            class="me-2">
                        <span class="fs-5 fw-bold d-none d-sm-inline text-primary">NgajiYuk</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-auto w-100 mt-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="bi bi-house-door me-2"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-dark">
                                <i class="bi bi-journal-text me-2"></i> Kelas
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-dark">
                                <i class="bi bi-people me-2"></i> Peserta
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-dark">
                                <i class="bi bi-calendar-event me-2"></i> Jadwal
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-dark">
                                <i class="bi bi-images me-2"></i> Galeri
                            </a>
                        </li>
                        <!-- Tambahkan menu lain sesuai kebutuhan -->
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col p-0">
                <!-- Navbar Atas -->
                <nav class="navbar navbar-light bg-white shadow-sm px-4">
                    <div class="container-fluid">
                        <!-- Logo kiri (hanya icon, sudah ada di sidebar) -->
                        <span></span>
                        <!-- Profile kanan -->
                        <div class="d-flex align-items-center">
                            <span class="me-3 fw-semibold">Admin</span>
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="noimage" alt="profile" width="36" height="36"
                                        class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-person-circle me-2"></i> Pengaturan Profil
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="#">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Konten -->
                <main class="p-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
