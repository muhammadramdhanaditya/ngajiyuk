<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h3 class="mb-4 text-center fw-bold text-primary">Daftar Akun</h3>
        <form method="POST" wire:submit.prevent="storeRegister">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" wire:model="name" class="form-control" id="name" name="name" required
                    autofocus>
                @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor WhatsApp/Telepon</label>
                <input type="text" wire:model="phone" class="form-control" id="phone" name="phone" required
                    placeholder="08xxxxxxxxxx">
                @error('phone')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" wire:model="password" class="form-control" id="password" name="password"
                    required>
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" wire:model="password_confirmation" class="form-control"
                    id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>
        <div class="mt-3 text-center">
            <span>Sudah punya akun? <a href="{{ route('login') }}">Login</a></span>
        </div>
    </div>
</div>
