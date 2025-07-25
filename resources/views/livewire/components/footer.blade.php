<footer class="bg-white shadow-lg rounded py-5 mt-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ url('/assets/image/logo.png') }}" alt="Logo" width="70" height="70"
                        class="me-2 img-fluid">
                    <span class="fw-bold text-primary fs-4">NgajiYuk</span>
                </div>
                <p class="text-muted small">
                    Platform pembelajaran Al-Qur'an yang memudahkan umat muslim untuk memperdalam ilmu agama
                    melalui kelas online dan offline yang berkualitas.
                </p>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 text-dark">Menu Cepat</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}"
                            class="text-muted text-decoration-none small">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('schedule') }}"
                            class="text-muted text-decoration-none small">Kelas & Jadwal</a></li>
                    <li class="mb-2"><a href="{{ route('gallery') }}"
                            class="text-muted text-decoration-none small">Galeri</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}"
                            class="text-muted text-decoration-none small">Kontak</a></li>
                    <li class="mb-2"><a href="{{ route('info') }}"
                            class="text-muted text-decoration-none small">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="col-xl-3 col-lg-5 col-md-6">
                <h6 class="fw-bold mb-3 text-dark">Kontak Info</h6>
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-geo-alt-fill text-primary me-2 mt-1"></i>
                    <div>
                        <p class="text-muted mb-0 small">{{ config('services.info.address') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-telephone-fill text-primary me-2"></i>
                    <a href="tel:+6281234567890"
                        class="text-muted text-decoration-none small">{{ config('services.info.whatsapp') }}</a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-envelope-fill text-primary me-2"></i>
                    <a href="mailto:info@ngajiyuk.com"
                        class="text-muted text-decoration-none small">{{ config('services.info.email') }}</a>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-6">
                <h6 class="fw-bold mb-3 text-dark">Lokasi Kami</h6>
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63449.59297496492!2d106.8479204177857!3d-6.31621561824647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992c5a45c4497%3A0x64eca91dcb62758a!2sJl.%20Raya%20Hankam%2C%20Kota%20Bks%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1752260165081!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="rounded shadow-sm">
                    </iframe>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="text-muted mb-0 small">
                    © 2025 NgajiYuk. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-muted text-decoration-none me-2 me-md-3 small">Privacy Policy</a>
                <a href="#" class="text-muted text-decoration-none me-2 me-md-3 small">Terms of Services</a>
                <a href="#" class="text-muted text-decoration-none small">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
