<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Kelas Belajar</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeClass">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                        placeholder="Masukkan nama kelas">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipe</label>
                    <select class="form-select" id="type" name="type" wire:model="type">
                        <option value="offline">Offline</option>
                        <option value="online">Online</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Nama Guru</label>
                    <select class="form-select" id="teacher_id" name="teacher_id" wire:model="teacher_id">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="location_id" class="form-label">Lokasi</label>
                    <select class="form-select" id="location_id" name="location_id" wire:model="location_id">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }} ( {{ $location->type }} )</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="day" class="form-label">Hari</label>
                    <select class="form-select" id="day" name="day" wire:model="day" multiple>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="time_start" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="time_start" name="time_start"
                            wire:model="time_start">
                    </div>
                    <div class="col-md-5">
                        <label for="time_end" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="time_end" name="time_end" wire:model="time_end">
                    </div>
                    <div class="col-md-2">
                        <label for="timezone" class="form-label">Zona Waktu</label>
                        <select class="form-select" id="timezone" name="timezone" wire:model="timezone">
                            <option value="WIB">WIB</option>
                            <option value="WITA">WITA</option>
                            <option value="WIT">WIT</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="price" name="price" wire:model="price"
                        placeholder="Masukkan harga kelas">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Warna Kelas</label>
                    <input type="color" class="form-control" id="color" name="color" wire:model="color"
                        placeholder="Masukkan nama kelas">
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Catatan</label>
                    <textarea class="form-control" id="note" name="note" rows="3" placeholder="Masukkan deskripsi kelas"
                        wire:model="note"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
