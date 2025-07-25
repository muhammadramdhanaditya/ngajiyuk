<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Kelas Belajar</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeGallery">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Gallery</label>
                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                        placeholder="Masukkan nama gallery">
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Catatan</label>
                    <textarea class="form-control" id="note" name="note" rows="3" placeholder="Masukkan deskripsi gallery"
                        wire:model="note"></textarea>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-3 col-md-4 col-12 d-flex flex-column gap-1 align-items-start">
                            <label for="upload-photo-profile">Foto Gallery</label>
                            <span class="text-muted fs-7">Maximal size: 5MB</span>
                            <label for="upload-photo-profile" class="btn btn-success w-100 mt-2">
                                <i class="bi bi-cloud-arrow-up-fill me-2"></i> Upload
                            </label>
                            <input type="file" class="form-control d-none" name="pics" wire:model="pics"
                                id="upload-photo-profile" multiple>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="d-flex flex-wrap gap-3 justify-content-start align-items-start border rounded p-3 bg-light"
                                style="min-height: 130px;">
                                @if ($pics)
                                    @foreach ($pics as $index => $pic)
                                        <div class="position-relative">
                                            <img src="{{ $pic->temporaryUrl() }}" class="img-thumbnail shadow-sm"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                wire:click="removeUploadedPic({{ $index }})">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
