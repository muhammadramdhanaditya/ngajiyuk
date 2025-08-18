<div class="container-fluid">
    <h1 class="mb-4">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Kelas</h5>
                    <p class="display-6 fw-bold">{{ $total_class }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
