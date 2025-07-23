<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Lokasi</h1>
            <a href="{{ route('admin-location-add') }}" class="btn btn-primary">Tambah Lokasi</a>
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="locationTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lokasi</th>
                                <th>Tipe</th>
                                <th>Link</th>
                                <th>Alamat</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $i => $location)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ ucfirst($location->type) }}</td>
                                    <td>{{ $location->link }}</td>
                                    <td>{{ $location->detail_address }}</td>
                                    <td>{{ $location->note }}</td>
                                    <td>
                                        <a href="{{ route('admin-location-edit', $location->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <button wire:click="destroy({{ $location->id }})"
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
            $('#locationTable').DataTable();
        });
    </script>
@endpush
