<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Evaluasi</h1>
            <a href="{{ route('admin-class-user-evaluation-add', ['class_id' => $class_id, 'users_id' => $users_id]) }}"
                class="btn btn-success"><i class="bi bi-plus"></i>
                Tambah
                Evaluasi</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="evaluationTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Kategori Belajar</th>
                                <th>Nilai</th>
                                <th>Keterangan Nilai</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluations as $i => $evaluation)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $evaluation->categoryClass->class->name }}</td>
                                    <td>{{ $evaluation->categoryClass->category->name }}</td>
                                    <td>{{ $evaluation->value }}</td>
                                    <td>{{ $evaluation->note_value }}</td>
                                    <td>{{ $evaluation->note }}</td>
                                    <td>
                                        <a href="{{ route('admin-class-edit', $evaluation->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
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
            $('#evaluationTable').DataTable();
        });
    </script>
@endpush
