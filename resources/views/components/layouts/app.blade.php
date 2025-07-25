<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NgajiYuk</title>
    <link rel="icon" href="{{ url('/assets/image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @livewireStyles
</head>

<body class="antialiased" url="{{ url('/') }}">
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <!-- Navbar & content -->
            <div class="col">
                <div class="row">
                    <div class="container">
                        <livewire:components.navbar />
                        <div class="pt-3">
                            @yield('content')
                            @include('livewire.components.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    {{-- <livewire:livewire-alert::scripts />
    <livewire:livewire-alert::flash /> --}}


</body>

</html>
