<div class="container-fluid">
    <h1 class="mb-4">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h1>
    <div class="row">
        <!-- Tambahkan konten dashboard di sini -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Kelas</h5>
                    <p class="display-6 fw-bold">12</p>
                </div>
            </div>
        </div>
        <!-- dst -->
    </div>
</div>
