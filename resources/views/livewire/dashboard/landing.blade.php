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
                    <!-- Slide 1: Kelas Tahsin & Tahfidz -->
                    <div class="carousel-item active">
                        @foreach ($classes as $class)
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header text-white py-3"
                                        style="background-color: {{ $class->color }}">
                                        <h5 class="mb-0">{{ $class->name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i
                                                    class="bi bi-calendar-week me-2"></i>{{ implode(', ', json_decode($class->day, true)) }}
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i>{{ $class->time_start }}
                                                -
                                                {{ $class->time_end }} {{ $class->timezone }}</li>
                                            <li class="mb-2"><i
                                                    class="bi bi-person me-2"></i>{{ $class->teacher->name }}</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> {{ $class->location->name }}
                                                ({{ $class->location->type }})
                                            </li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-primary btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-primary">Rp
                                                {{ format_rupiah($class->price) }}/bulan</span>
                                            <button class="btn btn-primary btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Controls -->
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
