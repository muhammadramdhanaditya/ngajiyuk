<section class="py-5" id="jadwal">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Pilih Kelas NgajiYuk</h2>
                <p class="text-muted">Temukan kelas yang sesuai dengan kebutuhan belajarmu. Klik untuk melihat detail dan
                    daftar sekarang!</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($classes as $class)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                        <div class="card-header text-white py-3" style="background-color: {{ $class->color }}">
                            <h5 class="mb-0">{{ $class->name }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i
                                        class="bi bi-calendar-week me-2"></i>{{ implode(', ', json_decode($class->day, true)) }}
                                </li>
                                <li class="mb-2"><i class="bi bi-clock me-2"></i>{{ $class->time_start }} -
                                    {{ $class->time_end }} {{ $class->timezone }}</li>
                                <li class="mb-2"><i class="bi bi-person me-2"></i>{{ $class->teacher->name }}</li>
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
                                <span class="fw-bold text-primary">Rp {{ format_rupiah($class->price) }}/bulan</span>
                                <button class="btn btn-primary btn-sm">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
