@extends('layout.v_template')
@section('title_page', 'Admin | Pelunasan')
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
                                <h4 class="card-title mb-1">Data Pembayaran Pelunasan</h4>
                                <h4 class="card-title mb-1"> </h4>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">

                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center" style="color: #ffffff;">
                                                    <thead>
                                                        <tr>
                                                            <th style="color: #ffffff;">No</th>
                                                            <th style="color: #ffffff;">ID Pesanan</th>
                                                            <th style="color: #ffffff;">Atas Nama</th>
                                                            <th style="color: #ffffff;">Total Tagihan</th>
                                                            <th style="color: #ffffff;">Sisa Bayar</th>
                                                            <th style="color: #ffffff;">Status Pembayaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @forelse ($pembayaran as $p)
                                                            <!-- Menggunakan forelse untuk validasi jika data kosong -->
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $p->id_pesanan }}</td>
                                                                <td>{{ $p->nama }}</td>
                                                                <td>{{ number_format($p->total_tagihan, 0, ',', '.') }}</td>
                                                                <td>{{ number_format($p->total_tagihan - $p->jumlah_dp, 0, ',', '.') }}</td>
                                                                <td>{{ $p->statusBayarPelunasan }}</td>
                                                            @empty
                                                            <tr>
                                                                <td colspan="10" class="text-center">Data pesanan tidak
                                                                    ditemukan.</td>
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
