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
                                <button class="btn btn-outline-primary btn-sm"
                                    wire:click="showClassDetail({{ $class->id }})" data-bs-toggle="modal"
                                    data-bs-target="#classDetailModal">
                                    Detail Kelas
                                </button>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 pb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">Rp {{ format_rupiah($class->price) }}</span>
                                <button class="btn btn-primary btn-sm" wire:click="registerClass({{ $class->id }})"
                                    data-bs-toggle="modal" data-bs-target="#paymentModal">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="classDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $selectedClass?->name ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($selectedClass)
                        <div class="row">
                            <div class="col-md-12 d-flex flex-column gap-3">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-6 d-flex flex-column gap-1">
                                        <h6>Detail Jadwal</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li><i class="bi bi-calendar-week me-2"></i>
                                                {{ implode(', ', json_decode($selectedClass->day, true)) }}
                                            </li>
                                            <li><i class="bi bi-clock me-2"></i>
                                                {{ $selectedClass->time_start }} - {{ $selectedClass->time_end }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column gap-1">
                                        <h6>Deskripsi</h6>
                                        <p>{{ $selectedClass->note }}</p>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between align-items-start">
                                    <div class="col-md-6 flex-1 d-flex flex-column gap-1">
                                        <span class="fw-bold"><i class="bi bi-person me-2"></i>
                                            Pengajar</span>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if ($selectedClass->teacher->profile_photo_url)
                                                <img src="{{ $$selectedClass->teacher->profile_photo_url }}"
                                                    alt="Preview" class="img-fluid rounded-circle"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                                    style="width: 50px; height: 50px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                        height="30" fill="white" class="bi bi-person-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                </div>
                                            @endif
                                            {{ $selectedClass->teacher->name }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 flex-1 d-flex flex-column gap-1"><span class="fw-bold"><i
                                                class="bi bi-geo-alt me-2"></i> Alamat</span>
                                        <span>{{ $selectedClass->location->name }}
                                            ({{ $selectedClass->location->type }})</span>
                                        <span>{{ $selectedClass->location->detail_address }}</span>
                                        <span>{{ $selectedClass->location->note }}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal berdasarkan status -->
                <div class="modal-header">
                    @if ($getTransactions === null)
                        <h5 class="modal-title">Pendaftaran Kelas {{ $selectedClass->name ?? '' }}</h5>
                    @elseif ($getTransactions->is_accepted === 0)
                        <h5 class="modal-title">Menunggu Konfirmasi Admin</h5>
                    @else
                        <h5 class="modal-title">Anda Sudah Terdaftar</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal berdasarkan status -->
                <div class="modal-body">
                    @if ($getTransactions === null)
                        <!-- Status: Belum Daftar -->
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Silakan lengkapi pembayaran untuk mendaftar kelas.
                        </div>

                        <form method="POST" wire:submit.prevent="submitPayment">
                            @csrf
                            <h6 class="mb-3">Rincian Pembayaran</h6>
                            <p>Total: <strong>Rp {{ format_rupiah($selectedClass?->price ?? 0) }}</strong></p>

                            <div class="mb-4">
                                <h6>Transfer Bank</h6>
                                <p>{{ $settings->name_bank }}: {{ $settings->number_bank }} ({{ $settings->name }})
                                </p>
                            </div>

                            <div class="mb-4 text-center">
                                <h6>Atau Scan QRIS</h6>
                                <img src="{{ $settings->qr_code_url }}" alt="QRIS" class="img-fluid"
                                    style="max-width: 200px;">
                            </div>

                            <div class="mb-3">
                                <label for="bukti_transfer" class="form-label">Upload Bukti Transfer</label>
                                <input type="file" class="form-control" id="bukti_transfer"
                                    wire:model="bukti_transfer">
                                @error('bukti_transfer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                            </div>
                        </form>
                    @elseif ($getTransactions->is_accepted === 0)
                        <div class="text-center py-4">
                            <div class="mb-3">
                                <i class="bi bi-clock-history display-4 text-warning"></i>
                            </div>
                            <h5 class="text-warning">Pendaftaran dalam Proses Verifikasi</h5>
                            <p class="text-muted">Admin akan memverifikasi pembayaran Anda dalam 1x24 jam.</p>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    @else
                        <!-- Status: Sudah Terdaftar -->
                        <div class="text-center py-4">
                            <div class="mb-3">
                                <i class="bi bi-check-circle display-4 text-success"></i>
                            </div>
                            <h5 class="text-success">Pendaftaran Berhasil</h5>
                            <p class="text-muted">Anda sudah terdaftar di kelas ini.</p>

                            <div class="mt-4 p-3 bg-light rounded">
                                <h6>Detail Kelas:</h6>
                                <p>Kelas: <strong>{{ $selectedClass->name }}</strong></p>
                                <p>Tanggal Konfirmasi: {{ $getTransactions->updated_at->format('d M Y H:i') }}</p>
                                <p>Status: <span class="badge bg-success">Terkonfirmasi</span></p>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>



@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('show-payment-modal', () => {
                const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                paymentModal.show();
            });

            Livewire.on('hide-payment-modal', () => {
                const paymentModal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
                if (paymentModal) {
                    paymentModal.hide();
                }
            });
        });
    </script>
@endpush
