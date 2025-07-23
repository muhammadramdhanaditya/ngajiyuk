<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Kelas</h1>
            <a href="{{ route('admin-class-add') }}" class="btn btn-primary">Tambah Kelas</a>
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="kelasTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Pengajar</th>
                                <th>Jumlah Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kelas Tahsin Dasar</td>
                                <td>Ustadz Ahmad</td>
                                <td>25</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kelas Tahfidz</td>
                                <td>Ustadzah Siti</td>
                                <td>18</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable();
        });
    </script>
@endpush
