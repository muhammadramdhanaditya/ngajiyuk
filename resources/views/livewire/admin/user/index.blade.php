<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List User</h1>
            {{-- <a href="{{ route('admin-class-add') }}" class="btn btn-primary">Tambah Kelas</a> --}}
        </div>
    </div>
    <!-- Tabel DataTables -->
    <div class="row mt-4">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-tab-pane"
                        type="button" role="tab" aria-controls="users-tab-pane" aria-selected="true">Users</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins-tab-pane"
                        type="button" role="tab" aria-controls="admins-tab-pane"
                        aria-selected="false">Admins</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab"
                    tabindex="0">
                    <div class="card">
                        <div class="card-body">
                            <table id="userTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Akses Admin</th>
                                        <th>Acc Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $i => $user)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        wire:change="updateAdminRequest({{ $user->id }}, $event.target.checked)"
                                                        id="switch-{{ $user->id }}"
                                                        {{ $user->is_admin_request != 0 ? 'checked' : '' }} />
                                                </div>
                                            </td>
                                            <td>
                                                <button wire:click="accAdmin({{ $user->id }})"
                                                    class="btn btn-sm btn-success"
                                                    {{ $user->is_admin_request != 1 ? 'disabled' : '' }}>Terima</button>
                                            </td>
                                            <td>
                                                <button wire:click="destroy({{ $user->id }})"
                                                    class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="admins-tab-pane" role="tabpanel" aria-labelledby="admins-tab"
                    tabindex="0">
                    <div class="card">
                        <div class="card-body">
                            <table id="adminTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Hapus Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $i => $admin)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td>
                                                <button wire:click="cancelAdmin({{ $admin->id }})"
                                                    class="btn btn-sm btn-danger"
                                                    {{ $admin->is_admin_request != 3 ? 'disabled' : '' }}>Hapus
                                                    Admin</button>
                                            </td>
                                            <td>
                                                <button wire:click="destroy({{ $admin->id }})"
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
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
            $('#adminTable').DataTable();
        });
    </script>
@endpush
