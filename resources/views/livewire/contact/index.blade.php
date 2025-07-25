<section class="py-5" id="kontak">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Kontak Kami</h2>
                <p class="text-muted">Silakan hubungi kami melalui form di bawah ini atau melalui informasi kontak yang
                    tersedia.</p>
            </div>
        </div>
        <div class="row g-4">
            <!-- Form Kontak -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" wire:submit.prevent="storeContactUs">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Anda"
                                    wire:model="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email@domain.com"
                                    wire:model="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="phone" placeholder="08xxxxxxx"
                                    wire:model="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" rows="4" wire:model="message" placeholder="Tulis pesan Anda..."
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Info Kontak -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Info Kontak</h5>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill text-primary me-3 fs-4"></i>
                            <a href="https://maps.app.goo.gl/DaYkbMhVAXttwxCT6" target="_blank"
                                class="text-decoration-none text-dark">{{ config('services.info.address') }}</a>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-telephone-fill text-primary me-3 fs-4"></i>
                            <a href="tel:{{ config('services.info.whatsapp') }}" target="_blank"
                                class="text-decoration-none text-dark">{{ config('services.info.whatsapp') }}</a>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-envelope-fill text-primary me-3 fs-4 "></i>
                            <a href="mailto:{{ config('services.info.email') }}  "
                                target="_blank">{{ config('services.info.email') }}</a>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-whatsapp text-success me-3 fs-4"></i>
                            <a href="https://wa.me/{{ config('services.info.whatsapp') }}" target="_blank"
                                class="text-decoration-none text-dark">Chat
                                WhatsApp</a>
                        </div>
                        <div class="ratio ratio-16x9 rounded shadow-sm mt-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63449.59297496492!2d106.8479204177857!3d-6.31621561824647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992c5a45c4497%3A0x64eca91dcb62758a!2sJl.%20Raya%20Hankam%2C%20Kota%20Bks%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1752260165081!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="rounded shadow-sm">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
