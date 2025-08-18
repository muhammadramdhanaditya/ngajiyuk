<div class="container-fluid">
    <div class="col-lg-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-class') }}">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Kelas</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Kategori Kelas</h1>
            <button wire:click="add()" class="btn btn-primary">
                Tambah Kategori
            </button>
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="categoryTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $i => $category)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button wire:click="edit({{ $category->id }})" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button wire:click="destroy({{ $category->id }})"
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
    <div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($editMode)
                            Edit Kategori
                        @else
                            Tambah Kategori Baru
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetForm"></button>
                </div>
                <form method="POST" wire:submit.prevent="{{ $editMode ? 'updateCategory' : 'storeCategory' }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="resetForm">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            @if ($editMode)
                                Update
                            @else
                                Simpan
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        });
    </script>
    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('show-category-modal', () => {
                const modalElement = document.getElementById('categoryModal');
                const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
                modal.show();
            });

            Livewire.on('hide-category-modal', () => {
                const modalElement = document.getElementById('categoryModal');
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                }
            });
        });
    </script>
@endpush
