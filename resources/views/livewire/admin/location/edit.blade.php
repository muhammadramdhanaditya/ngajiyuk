<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Edit Lokasi</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeEditLocation">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Lokasi</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama lokasi" wire:model="name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Tipe</label>
                    <select class="form-select" id="type" name="type" wire:model="type">
                        <option value="offline">Offline</option>
                        <option value="online">Online</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label fw-bold">Link (jika online)</label>
                    <input type="text" class="form-control" id="link" name="link" wire:model="link"
                        placeholder="Masukkan link lokasi (jika online)">
                </div>
                <div class="mb-3">
                    <label for="detail_address" class="form-label fw-bold">Alamat Lengkap</label>
                    <textarea class="form-control" id="detail_address" name="detail_address" rows="2" wire:model="detail_address"
                        placeholder="Masukkan alamat lengkap"></textarea>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label fw-bold">Catatan</label>
                    <textarea class="form-control" id="note" name="note" rows="2" wire:model="note"
                        placeholder="Catatan tambahan (opsional)"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
