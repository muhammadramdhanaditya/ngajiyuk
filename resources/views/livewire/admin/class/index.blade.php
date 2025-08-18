<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex gap-2 align-items-center">
                <h1>List Kelas</h1>
                <a href="{{ route('admin-class-add') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah
                    Kelas</a>
            </div>
            <a href="{{ route('admin-class-category') }}" class="btn btn-success"><i class="bi bi-book-half"></i> Kategori
                Belajar</a>
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
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $i => $class)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td><a href="{{ route('admin-class-user', $class->id) }}">{{ $class->name }}</a>
                                    </td>
                                    <td>{{ ucfirst($class->teacher->name) }}</td>
                                    <td>{{ ucfirst($class->location->name) }}</td>
                                    <td>{{ $class->note }}</td>
                                    <td>
                                        <a href="{{ route('admin-class-edit', $class->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <button wire:click="destroy({{ $class->id }})"
                                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
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
