<div class="container-fluid">
    <div class="col-lg-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-class') }}">Kelas</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin-class-user', ['id' => $class_id]) }}">User
                        Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Evaluasi</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Evaluasi {{ $users->name }}</h1>

            @if (!isset($evaluations))
                <a href="{{ route('admin-class-user-evaluation-add', ['class_id' => $class_id, 'users_id' => $users_id]) }}"
                    class="btn btn-success"><i class="bi bi-plus"></i>
                    Tambah
                    Evaluasi</a>
            @endif

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
                                        <button
                                            wire:click="$dispatch('openEditModal', { evaluationId: {{ $evaluation->id }} })"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editEvaluationModal" tabindex="-1" role="dialog"
        aria-labelledby="editEvaluationModalLabel" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEvaluationModalLabel">
                        Edit Evaluasi
                    </h5>
                    <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close"
                        wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateEvaluation">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="value" class="form-label fw-bold">Nilai</label>
                                    <select class="form-control" id="value" wire:model="value">
                                        <option value="">Pilih Nilai</option>
                                        <option value="A">A (Sangat Baik)</option>
                                        <option value="B">B (Baik)</option>
                                        <option value="C">C (Cukup Baik)</option>
                                        <option value="D">D (Kurang Baik)</option>
                                    </select>
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note" class="form-label fw-bold">Keterangan/Komentar</label>
                            <textarea class="form-control" id="note" wire:model="note" rows="4"
                                placeholder="Masukkan komentar evaluasi..."></textarea>
                            @error('note')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="updateEvaluation">
                        Simpan Perubahan
                    </button>
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

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('openEditModal', (evaluationId) => {
                $('#editEvaluationModal').modal('show');
            });

            Livewire.on('closeModal', () => {
                $('#editEvaluationModal').modal('hide');
            });

            $('#editEvaluationModal').on('hidden.bs.modal', function() {
                Livewire.emit('resetModal');
            });
        });
        document.addEventListener('livewire:init', () => {
            Livewire.on('showModal', () => {
                $('#editEvaluationModal').modal('show');
            });

            Livewire.on('hideModal', () => {
                $('#editEvaluationModal').modal('hide');
            });
        });
    </script>
@endpush
