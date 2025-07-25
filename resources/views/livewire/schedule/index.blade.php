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
                            <div class="col-md-6">
                                <h6>Detail Jadwal</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-calendar-week me-2"></i>
                                        {{ implode(', ', json_decode($selectedClass->day, true)) }}
                                    </li>
                                    <li class="mb-2"><i class="bi bi-clock me-2"></i>
                                        {{ $selectedClass->time_start }} - {{ $selectedClass->time_end }}
                                    </li>
                                    <li class="mb-2"><i class="bi bi-person me-2"></i>
                                        {{ $selectedClass->teacher->name }}
                                    </li>
                                    <li><i class="bi bi-geo-alt me-2"></i>
                                        {{ $selectedClass->location->name }} ({{ $selectedClass->location->type }})
                                    </li>
                                </ul>

                                <h6 class="mt-4">Deskripsi</h6>
                                <p>{{ $selectedClass->description }}</p>
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

    <!-- Modal Pembayaran -->
    <div wire:ignore.self class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pendaftaran Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3">Rincian Pembayaran</h6>
                    <p>Total: <strong>Rp {{ format_rupiah($selectedClass?->price ?? 0) }}</strong></p>

                    <div class="mb-4">
                        <h6>Transfer Bank</h6>
                        <p>{{ $settings->name_bank }}: {{ $settings->number_bank }} ({{ $settings->name }})</p>
                    </div>

                    <div class="mb-4 text-center">
                        <h6>Atau Scan QRIS</h6>
                        <img src="{{ $settings->qr_code_url }}" alt="QRIS" class="img-fluid"
                            style="max-width: 200px;">
                    </div>

                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label">Upload Bukti Transfer</label>
                        <input type="file" class="form-control" id="bukti_transfer" wire:model="bukti_transfer">
                        @error('bukti_transfer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="submitPayment">Kirim Bukti</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail Kelas -->


@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('show-payment-modal', () => {
                const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                paymentModal.show();
            });

            Livewire.on('hide-payment-modal', () => {
                const paymentModal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
                paymentModal.hide();
            });
        });
    </script>
@endpush
