<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Pengaturan</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeSetting">
                @csrf
                <div class="col-md-4 text-center d-flex flex-column align-items-center mb-4 mb-md-0">
                    <!-- Profile photo logic -->
                    @if ($qr_code)
                        <img src="{{ $qr_code->temporaryUrl() }}" alt="Preview" class="img-fluid mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @elseif ($qr_code_url)
                        <img src="{{ $qr_code_url }}" alt="Profile Photo" class="img-fluid mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="bg-secondary mb-3 d-flex justify-content-center align-items-center"
                            style="width: 150px; height: 150px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                    @endif

                    <input type="file" id="qr_code" wire:model="qr_code" class="d-none">
                    <label for="qr_code" class="btn btn-primary btn-sm">
                        <span wire:loading.remove wire:target="qr_code">Ganti Qr</span>
                        <span wire:loading wire:target="qr_code">Mengunggah...</span>
                    </label>
                    @error('qr_code')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Rekening</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama Rekening" wire:model="name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name_bank" class="form-label fw-bold">Nama Bank</label>
                    <input type="text" class="form-control" id="name_bank" name="name_bank"
                        placeholder="Masukkan nama Bank" wire:model="name_bank">
                </div>
                <div class="mb-3">
                    <label for="number_bank" class="form-label fw-bold">Nomer Rekening</label>
                    <input type="text" class="form-control" id="number_bank" name="number_bank"
                        placeholder="Masukkan Nomer Rekening" wire:model="number_bank">
                </div>

                <div class="mb-3">
                    <label for="title_home" class="form-label fw-bold">Judul Ajakan di Halaman depan</label>
                    <input type="text" class="form-control" id="title_home" name="title_home"
                        placeholder="Masukkan Judul Ajalan" wire:model="title_home">
                </div>
                <div class="mb-3">
                    <label for="note_home" class="form-label fw-bold">Deskripsi Judul Ajakan</label>
                    <input type="text" class="form-control" id="note_home" name="note_home"
                        placeholder="Masukkan deskripsi" wire:model="note_home">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
