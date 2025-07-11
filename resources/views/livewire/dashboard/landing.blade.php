<div>
    {{-- 1. Carousel Foto --}}
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8"> <!-- Kontrol lebar untuk berbagai ukuran layar -->
                <div id="landingCarousel" class="carousel slide rounded-4 shadow" data-bs-ride="carousel">
                    <!-- rounded-4 untuk sudut melengkung -->
                    <div class="carousel-inner ratio ratio-16x9 rounded-4 overflow-hidden">
                        <!-- overflow-hidden untuk memastikan rounded bekerja -->
                        <div class="carousel-item active">
                            <img src="{{ url('/assets/image/ngaji-1.jpg') }}" class="d-block w-100 img-cover"
                                alt="Foto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('/assets/image/ngaji-2.png') }}" class="d-block w-100 img-cover"
                                alt="Foto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('/assets/image/ngaji-3.png') }}" class="d-block w-100 img-cover"
                                alt="Foto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('/assets/image/ngaji-4.png') }}" class="d-block w-100 img-cover"
                                alt="Foto 4">
                        </div>
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
        <h2 class="fw-bold mb-3">Ayo Mulai Mengaji Bersama NgajiYuk!</h2>
        <p class="lead mb-4">Gabung bersama komunitas kami untuk memperdalam ilmu Al-Qur'an dan mempererat ukhuwah
            Islamiyah.</p>
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
                        <div class="row justify-content-center g-4">
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-primary text-white py-3">
                                        <h5 class="mb-0">Kelas Tahsin</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Senin & Rabu
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 19.00 - 20.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadz Ahmad</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Online (Zoom)</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-primary btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-primary">Rp 150.000/bulan</span>
                                            <button class="btn btn-primary btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-success text-white py-3">
                                        <h5 class="mb-0">Kelas Tahfidz</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Selasa & Kamis
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 19.00 - 20.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadzah Siti</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Online (Zoom)</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-success">Rp 200.000/bulan</span>
                                            <button class="btn btn-success btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Kelas Tahfidz & Anak-anak -->
                    <div class="carousel-item">
                        <div class="row justify-content-center g-4">
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-success text-white py-3">
                                        <h5 class="mb-0">Kelas Tahfidz</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Selasa & Kamis
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 19.00 - 20.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadzah Siti</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Online (Zoom)</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-success">Rp 200.000/bulan</span>
                                            <button class="btn btn-success btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-warning text-dark py-3">
                                        <h5 class="mb-0">Kelas Anak-anak</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Sabtu & Minggu
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 09.00 - 10.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadz Budi</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Masjid Al-Ikhlas</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-warning btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-warning">Rp 100.000/bulan</span>
                                            <button class="btn btn-warning btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Kelas Anak-anak & Dewasa -->
                    <div class="carousel-item">
                        <div class="row justify-content-center g-4">
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-warning text-dark py-3">
                                        <h5 class="mb-0">Kelas Anak-anak</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Sabtu & Minggu
                                            </li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 09.00 - 10.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadz Budi</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Masjid Al-Ikhlas</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-warning btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-warning">Rp 100.000/bulan</span>
                                            <button class="btn btn-warning btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                                    <div class="card-header bg-info text-white py-3">
                                        <h5 class="mb-0">Kelas Dewasa</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2"><i class="bi bi-calendar-week me-2"></i> Jumat</li>
                                            <li class="mb-2"><i class="bi bi-clock me-2"></i> 20.00 - 21.30 WIB</li>
                                            <li class="mb-2"><i class="bi bi-person me-2"></i> Ustadzah Lina</li>
                                            <li><i class="bi bi-geo-alt me-2"></i> Online (Zoom)</li>
                                        </ul>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-info btn-sm">Detail Kelas</button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold text-info">Rp 120.000/bulan</span>
                                            <button class="btn btn-info btn-sm">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
