<section id="galeri">
    <div class="container">
        @foreach ($gallerys as $gallery)
            <div class="row justify-content-center my-4">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">{{ $gallery->name }}</h2>
                    <p class="text-muted">{{ $gallery->note }}</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($gallery->pics as $i => $pic)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <div class="ratio ratio-1x1">
                                <img src="{{ $pic->pic_url }}" class="card-img-top rounded" style="object-fit: cover;"
                                    alt="Galeri {{ $i }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
