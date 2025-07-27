<div>
    {{-- 1. Carousel Foto --}}
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8"> <!-- Kontrol lebar untuk berbagai ukuran layar -->
                <div id="landingCarousel" class="carousel slide rounded-4 shadow" data-bs-ride="carousel">
                    <!-- rounded-4 untuk sudut melengkung -->
                    <div class="carousel-inner ratio ratio-16x9 rounded-4 overflow-hidden">
                        <!-- overflow-hidden untuk memastikan rounded bekerja -->

                        @foreach ($gallerys as $gallery)
                            @foreach ($gallery->pics as $i => $pic)
                                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                    <img src="{{ $pic->pic_url }}" class="d-block w-100 img-cover" alt="Gallery Image">
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#landingCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#landingCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. Info/Ajakan untuk Mengaji --}}
    <section class="text-center mb-5">
        <h2 class="fw-bold mb-3">{{ $settings->title_home }}</h2>
        <p class="lead mb-4">{{ $settings->note_home }}</p>

        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Sekarang</a>
    </section>

    {{-- 3. Preview Kelas/Jadwal --}}
    <section class="py-5">
        <div class="container">
            <h3 class="fw-semibold mb-4 text-center">Preview Kelas & Jadwal</h3>

            <div id="kelasCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    @for ($i = 0; $i < count($classes); $i += 2)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @if (isset($classes[$i]))
                                    <div class="col-md-6 col-lg-5">
                                        <a href="{{ route('schedule') }}" style="text-decoration: none;">
                                            <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                                <div class="card-header text-white py-3"
                                                    style="background-color: {{ $classes[$i]->color }}">
                                                    <h5 class="mb-0">{{ $classes[$i]->name }}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-unstyled mb-4">
                                                        <li class="mb-2"><i
                                                                class="bi bi-calendar-week me-2"></i>{{ implode(', ', json_decode($classes[$i]->day, true)) }}
                                                        </li>
                                                        <li class="mb-2"><i
                                                                class="bi bi-clock me-2"></i>{{ $classes[$i]->time_start }}
                                                            - {{ $classes[$i]->time_end }}
                                                            {{ $classes[$i]->timezone }}
                                                        </li>
                                                        <li class="mb-2"><i
                                                                class="bi bi-person me-2"></i>{{ $classes[$i]->teacher->name }}
                                                        </li>
                                                        <li><i class="bi bi-geo-alt me-2"></i>
                                                            {{ $classes[$i]->location->name }}
                                                            ({{ $classes[$i]->location->type }})</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if (isset($classes[$i + 1]))
                                    <div class="col-md-6 col-lg-5">
                                        <a href="{{ route('schedule') }}" style="text-decoration: none;">

                                            <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                                <div class="card-header text-white py-3"
                                                    style="background-color: {{ $classes[$i + 1]->color }}">
                                                    <h5 class="mb-0">{{ $classes[$i + 1]->name }}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-unstyled mb-4">
                                                        <li class="mb-2"><i
                                                                class="bi bi-calendar-week me-2"></i>{{ implode(', ', json_decode($classes[$i + 1]->day, true)) }}
                                                        </li>
                                                        <li class="mb-2"><i
                                                                class="bi bi-clock me-2"></i>{{ $classes[$i + 1]->time_start }}
                                                            - {{ $classes[$i + 1]->time_end }}
                                                            {{ $classes[$i + 1]->timezone }}</li>
                                                        <li class="mb-2"><i
                                                                class="bi bi-person me-2"></i>{{ $classes[$i + 1]->teacher->name }}
                                                        </li>
                                                        <li><i class="bi bi-geo-alt me-2"></i>
                                                            {{ $classes[$i + 1]->location->name }}
                                                            ({{ $classes[$i + 1]->location->type }})</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#kelasCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#kelasCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</div>
