<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Kelas Belajar</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeClass">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Kelas</label>
                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                        placeholder="Masukkan nama kelas">
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6"><label for="teacher_id" class="form-label fw-bold">Nama Guru</label>
                        <select class="form-select" id="teacher_id" name="teacher_id" wire:model="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6"><label for="location_id" class="form-label fw-bold">Lokasi</label>
                        <select class="form-select" id="location_id" name="location_id" wire:model="location_id">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }} ( {{ $location->type }} )
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="type" class="form-label fw-bold">Tipe</label>
                        <select class="form-select" id="type" name="type" wire:model="type">
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label class="form-label fw-bold d-block mb-2">Hari</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" wire:model="day"
                                        value="{{ $day }}" id="day-{{ $loop->index }}">
                                    <label class="form-check-label" for="day-{{ $loop->index }}">
                                        {{ $day }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="time_start" class="form-label fw-bold">Jam Mulai</label>
                        <input type="time" class="form-control" id="time_start" name="time_start"
                            wire:model="time_start">
                    </div>
                    <div class="col-md-5">
                        <label for="time_end" class="form-label fw-bold">Jam Selesai</label>
                        <input type="time" class="form-control" id="time_end" name="time_end" wire:model="time_end">
                    </div>
                    <div class="col-md-2">
                        <label for="timezone" class="form-label fw-bold">Zona Waktu</label>
                        <select class="form-select" id="timezone" name="timezone" wire:model="timezone">
                            <option value="WIB">WIB</option>
                            <option value="WITA">WITA</option>
                            <option value="WIT">WIT</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6"><label for="price" class="form-label fw-bold">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" wire:model="price"
                            placeholder="Masukkan harga kelas">
                    </div>
                    <div class="col-md-6"><label for="color" class="form-label fw-bold">Warna Kelas</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color" id="color" name="color"
                                wire:model="color" title="Pilih warna">
                            <input type="text" class="form-control" id="color-value" disabled>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label fw-bold">Catatan</label>
                    <textarea class="form-control" id="note" name="note" rows="3" placeholder="Masukkan deskripsi kelas"
                        wire:model="note"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-bold">Kategori Belajar</label>
                    <div id="category-container">
                        @foreach ($category_id as $index => $value)
                            <div class="input-group mb-2 category-field">
                                <select class="form-select" name="category_id[]"
                                    wire:model="category_id.{{ $index }}">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($value == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-danger"
                                    wire:click="removeCategory({{ $index }})"
                                    @if ($loop->first) disabled @endif>
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" wire:click="addCategory">
                        <i class="bi bi-plus"></i> Tambah Kategori
                    </button>

                    @error('category_id.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            $("#color").on("change", function() {
                const colorValue = $(this).val();
                $("#color-value").val(colorValue);
                @this.set('color', colorValue);
            });

            $("#color-value").val($("#color").val());

            let categoryCount = 1;

            $('#add-category').click(function() {
                const newField = `
        <div class="input-group mb-2 category-field">
            <select class="form-select" name="category_id[]" wire:model.defer="category_id.${categoryCount}">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-danger remove-category">
                <i class="fas fa-trash"></i>
            </button>
        </div>`;

                $('#category-container').append(newField);
                categoryCount++;

                @this.set(`category_id.${categoryCount-1}`, '');
            });

            // Hapus field
            $(document).on('click', '.remove-category', function() {
                const index = $(this).closest('.category-field').index();
                $(this).closest('.category-field').remove();

                @this.call('removeCategory', index);
            });
        });
    </script>
@endpush
