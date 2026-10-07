@extends('layout.v_template')
@section('title_page', 'Admin | Data Kategori')
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
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Kategori layanan yang tersedia</h4>
                                <h4 class="card-title mb-1"></h4>

                            </div>
                            <a href="{{ route('kategori.create') }}">
                                <li class="nav-item dropdown d-none d-lg-block">
                                    <button type="button" class="btn btn-success btn-md">Tambah</button>
                                </li>
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">

                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center" style="color: #ffffff;">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th style="color: #ffffff;">Nama Layanan</th>
                                                            <th style="color: #ffffff;">Deskripsi</th>
                                                            <th style="color: #ffffff;">Harga</th>
                                                            <th style="color: #ffffff;">Foto</th>
                                                            <th style="color: #ffffff;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($kategori as $k)
                                                            <tr>
                                                                <!-- Nama Layanan -->
                                                                <td>{{ $k->nama_layanan }}</td>

                                                                <!-- Deskripsi -->
                                                                <td>{{ $k->deskripsi }}</td>

                                                                <!-- Harga -->
                                                                <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>

                                                                <!-- Foto -->
                                                                <td>
                                                                    @if ($k->foto)
                                                                        <img src="{{ asset('storage/' . $k->foto) }}" alt="Foto Kategori" width="100" height="100">
                                                                    @else
                                                                        <span class="text-muted">Tidak ada foto</span>
                                                                    @endif
                                                                </td>

                                                                <!-- Aksi -->
                                                                <td class="text-center">
                                                                    <a href="/kategori/{{ $k->id_kategori }}/edit" class="btn btn-warning btn-sm mr-2">Edit</a>

                                                                    <!-- Form Hapus -->
                                                                    <form action="{{ route('kategori.destroy', $k->id_kategori) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                    </form>
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
                </div>
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
