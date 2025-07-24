<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Guru</h1>
            <a href="{{ route('admin-teacher-add') }}" class="btn btn-primary">Tambah Guru</a>
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="teacherTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>Kategori</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $i => $teacher)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ ucfirst($teacher->category) }}</td>
                                    <td>{{ $teacher->note }}</td>
                                    <td>
                                        <a href="{{ route('admin-teacher-edit', $teacher->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <button wire:click="destroy({{ $teacher->id }})"
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
            $('#teacherTable').DataTable();
        });
    </script>
@endpush
