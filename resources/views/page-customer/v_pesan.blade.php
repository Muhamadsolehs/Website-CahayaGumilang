@extends('layout.v_template2')
@section('title_page', 'Customer | Pesanan')
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
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $layanan->nama_layanan }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $layanan->foto) }}" alt="{{ $layanan->nama_layanan }}"
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <!-- Formulir pemesanan -->
                                    <form action="{{ route('pesanan.bayar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_kategori" value="{{ $layanan->id_kategori }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::id() }}">


                                        <!-- Nama Pemesan -->
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Pemesan</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                required>
                                        </div>

                                        <!-- Nomor Telepon -->
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Nomor Telepon/WA (Aktif)</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control"
                                                required>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="mb-3">
                                            <label for="lokasi_acara" class="form-label">Lokasi Acara</label>
                                            <input type="text" name="lokasi_acara" id="lokasi_acara" class="form-control"
                                                required>
                                        </div>

                                        <!-- Tanggal Acara -->
                                        <div class="mb-3">
                                            <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                                            <input type="text" id="tanggal_acara" name="tanggal_acara"
                                            class="form-control" placeholder="Pilih tanggal" required
                                            style="background-color:  #2d3238;"> <!-- Warna latar biru muda -->

                                            <!-- Pesan Error untuk Tanggal Acara -->
                                            @if ($errors->has('tanggal_acara'))
                                                <span class="text-danger">{{ $errors->first('tanggal_acara') }}</span>
                                            @endif
                                        </div>


                                        <!-- Waktu Acara -->
                                        <div class="mb-3">
                                            <label for="waktu_acara" class="form-label">Waktu Acara</label>
                                            <input type="time" name="waktu_acara" id="waktu_acara" class="form-control"
                                                required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Kirim Pesanan</button>

                                        <!-- Tombol Cancel -->
                                        <a href="/katalog">
                                            <button type="button" class="btn btn-dark">Cancel</button>
                                        </a>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const bookedDates = @json($bookedDates);
                            flatpickr("#tanggal_acara", {
                                dateFormat: "Y-m-d",
                                disable: bookedDates,
                                onChange: function(selectedDates, dateStr, instance) {
                                    // Pastikan nilai yang dipilih masuk ke input
                                    document.getElementById("tanggal_acara").value = dateStr;
                                }
                            });
                        });
                    </script>






                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

                </body>
            @endsection
