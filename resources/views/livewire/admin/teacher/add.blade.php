<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Guru</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeTeacher">
                @csrf
                <div class="col-md-4 text-center d-flex flex-column align-items-center mb-4 mb-md-0">
                    <!-- Profile photo logic -->
                    @if ($profilePhoto)
                        <img src="{{ $profilePhoto->temporaryUrl() }}" alt="Preview" class="img-fluid rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @elseif ($profilePhotoUrl)
                        <img src="{{ $profilePhotoUrl }}" alt="Profile Photo" class="img-fluid rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="bg-secondary rounded-circle mb-3 d-flex justify-content-center align-items-center"
                            style="width: 150px; height: 150px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                    @endif

                    <input type="file" id="profilePhoto" wire:model="profilePhoto" class="d-none">
                    <label for="profilePhoto" class="btn btn-primary btn-sm">
                        <span wire:loading.remove wire:target="profilePhoto">Ganti Foto</span>
                        <span wire:loading wire:target="profilePhoto">Mengunggah...</span>
                    </label>
                    @error('profilePhoto')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama Guru" wire:model="name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category"
                        placeholder="Masukkan nama kategori" wire:model="category">
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Catatan</label>
                    <textarea class="form-control" id="note" name="note" rows="2" wire:model="note"
                        placeholder="Catatan tambahan (opsional)"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
