<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Kelas Belajar</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                        placeholder="Masukkan nama kelas">
                </div>
                <div class="mb-3">
                    <label for="pengajar" class="form-label">Pengajar</label>
                    <input type="text" class="form-control" id="pengajar" name="pengajar"
                        placeholder="Masukkan nama pengajar">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi kelas"></textarea>
                </div>
                <div class="mb-3">
                    <label for="day" class="form-label">Hari</label>
                    <select class="form-select" id="day" name="day[]" multiple>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-5">
                        <label for="time_start" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="time_start" name="time_start">
                    </div>
                    <div class="col-md-5">
                        <label for="time_end" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="time_end" name="time_end">
                    </div>
                    <div class="col-md-2">
                        <label for="timezone" class="form-label">Zona Waktu</label>
                        <select class="form-select" id="timezone" name="timezone">
                            <option value="WIB">WIB</option>
                            <option value="WITA">WITA</option>
                            <option value="WIT">WIT</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
