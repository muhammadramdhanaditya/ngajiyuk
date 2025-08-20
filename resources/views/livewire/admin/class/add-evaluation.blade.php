<div class="container mt-3">
    <div class="col-lg-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-class') }}">Kelas</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin-class-user', ['id' => $class_id]) }}">User
                        Kelas</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin-class-user-evaluation-add', ['class_id' => $class_id, 'users_id' => $users_id]) }}"
                        class="btn btn-success">User
                        Evaluasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Evaluasi</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Tambah Evaluasi {{ $users->name }}</h5>
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
