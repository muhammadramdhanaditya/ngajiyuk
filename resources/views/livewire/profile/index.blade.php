<div>
    <div class="container-fluid p-3 p-md-4">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if ($activeTab === 'profile') active @endif" href="#"
                                    wire:click.prevent="setActiveTab('profile')" role="tab">Informasi Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($activeTab === 'classes') active @endif" href="#"
                                    wire:click.prevent="setActiveTab('classes')" role="tab">Kelas Saya</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade @if ($activeTab === 'profile') show active @endif"
                                role="tabpanel">
                                <form wire:submit.prevent="save">
                                    <div class="row">
                                        <div
                                            class="col-md-4 text-center d-flex flex-column align-items-center mb-4 mb-md-0">
                                            <!-- Profile photo logic -->
                                            @if ($profilePhoto)
                                                <img src="{{ $profilePhoto->temporaryUrl() }}" alt="Preview"
                                                    class="img-fluid rounded-circle mb-3"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            @elseif ($profilePhotoUrl)
                                                <img src="{{ $profilePhotoUrl }}" alt="Profile Photo"
                                                    class="img-fluid rounded-circle mb-3"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded-circle mb-3 d-flex justify-content-center align-items-center"
                                                    style="width: 150px; height: 150px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="64"
                                                        height="64" fill="white" class="bi bi-person-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                </div>
                                            @endif

                                            <input type="file" id="profilePhoto" wire:model="profilePhoto"
                                                class="d-none">
                                            <label for="profilePhoto" class="btn btn-primary btn-sm">
                                                <span wire:loading.remove wire:target="profilePhoto">Ganti Foto</span>
                                                <span wire:loading wire:target="profilePhoto">Mengunggah...</span>
                                            </label>
                                            @error('profilePhoto')
                                                <span class="text-danger d-block mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6 mb-3"><label for="name" class="form-label">Nama
                                                        Lengkap</label><input type="text" id="name"
                                                        wire:model.defer="name"
                                                        class="form-control @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3"><label for="email"
                                                        class="form-label">Email</label><input type="email"
                                                        id="email" wire:model.defer="email" class="form-control"
                                                        disabled></div>
                                                <div class="col-md-6 mb-3"><label for="phone"
                                                        class="form-label">Nomor Telepon</label><input type="text"
                                                        id="phone" wire:model.defer="phone"
                                                        class="form-control @error('phone') is-invalid @enderror">
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3"><label class="form-label">Role</label>
                                                    <p class="form-control-plaintext">{{ ucfirst($role) }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                                                <div>
                                                    @if ($isAdminRequest === 2)
                                                        @if ($role !== 'admin' && !$isAdminRequest)
                                                            <button type="button" wire:click="requestAdmin"
                                                                class="btn btn-success">Request Admin Access</button>
                                                        @elseif($isAdminRequest)
                                                            <div class="text-warning">Permintaan admin Anda sedang
                                                                diproses.
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="text-end mt-2 mt-md-0"><button type="submit"
                                                        class="btn btn-primary">Simpan</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Purchased Classes Tab -->
                            <div class="tab-pane fade @if ($activeTab === 'classes') show active @endif"
                                role="tabpanel">
                                <h5 class="mb-3">Kelas yang Telah Dibeli</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Kelas</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($purchasedClasses as $class)
                                                <tr>
                                                    <td>{{ $class['name'] }}</td>
                                                    <td>{{ $class['purchase_date'] }}</td>
                                                    <td><span
                                                            class="badge bg-{{ $class['status'] === 'Aktif' ? 'success' : 'secondary' }}">{{ $class['status'] }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Anda belum membeli kelas
                                                        apapun.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
