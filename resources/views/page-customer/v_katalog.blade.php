@extends('layout.v_template2')
@section('title_page', 'Customer | Katalog')
@section('content')



    <!-- partial:partials/_sidebar.html -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card corona-gradient-card">
                            <div class="card-body py-0 px-0 px-sm-3">

                            </div>
                        </div>
                    </div>
                </div>

                <body>
                    <div class="row">
                        @foreach ($kategori as $k)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <!-- Tampilkan gambar -->
                                    <img src="{{ asset('storage/' . $k->foto) }}" class="card-img-top"
                                        alt="{{ $k->nama_layanan }}" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $k->nama_layanan }}</h5>
                                        <p class="card-text">{{ $k->deskripsi }}</p>
                                        <p class="fw-bold">Harga: Rp {{ number_format($k->harga, 0, ',', '.') }}</p>
                                        <a href="{{ route('pesanan.create', $k->id_kategori) }}"
                                            class="btn btn-primary w-100">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>




                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                            href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                            admin templates</a> from Bootstrapdash.com</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>


    <!-- page-body-wrapper ends -->

@endsection
