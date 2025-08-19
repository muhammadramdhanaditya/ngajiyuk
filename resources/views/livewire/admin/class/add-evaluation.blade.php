<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Evaluasi</h5>
        </div>
        <div class="card-body">
            <form method="POST" wire:submit.prevent="storeEvaluationClass">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="text-center">
                                <th width="40%">Nama Kategori</th>
                                <th width="25%">Nilai</th>
                                <th width="35%">Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="align-middle">
                                        <strong>{{ $category->category->name }}</strong>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-select"
                                                wire:model="evaluations.{{ $category->id }}.value"
                                                name="evaluations[{{ $category->id }}][value]">
                                                <option value="">Pilih Nilai</option>
                                                <option value="A">A (Sangat Baik)</option>
                                                <option value="B">B (Baik)</option>
                                                <option value="C">C (Cukup Baik)</option>
                                                <option value="D">D (Kurang Baik)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="form-control" wire:model="evaluations.{{ $category->id }}.note"
                                            name="evaluations[{{ $category->id }}][note]" rows="2" placeholder="Masukkan komentar..."></textarea>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
