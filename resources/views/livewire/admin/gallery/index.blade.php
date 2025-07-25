<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Gallery</h1>
            <a href="{{ route('admin-gallery-add') }}" class="btn btn-primary">Tambah Gallery</a>
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="galleryTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gallery</th>
                                <th>Note</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallerys as $i => $gallery)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $gallery->name }}</td>
                                    <td>{{ $gallery->note }}</td>
                                    <td>
                                        <a href="{{ route('admin-gallery-edit', $gallery->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        @if ($i !== 0)
                                            <button wire:click="destroy({{ $gallery->id }})"
                                                class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        @endif
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
            $('#galleryTable').DataTable();
        });
    </script>
@endpush
