@extends('layout.v_template')
@section('title_page', 'Admin | Data Pesanan')
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
                                <h4 class="card-title mb-1">Data Pesanan</h4>
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
                                                            <th style="color: #ffffff;">ID User</th>
                                                            <th style="color: #ffffff;">Atas Nama</th>
                                                            <th style="color: #ffffff;">No Telepon</th>
                                                            <th style="color: #ffffff;">Kategori Pesanan</th>
                                                            <th style="color: #ffffff;">Lokasi</th>
                                                            <th style="color: #ffffff;">Tanggal</th>
                                                            <th style="color: #ffffff;">Waktu</th>
                                                            <th style="color: #ffffff;">Tagihan</th>
                                                            <th style="color: #ffffff;">Jumla DP</th>
                                                            <th style="color: #ffffff;">Status</th>
                                                            <th style="color: #ffffff;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @forelse ($pesanan as $p)
                                                            <!-- Menggunakan forelse untuk validasi jika data kosong -->
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $p->user->id_user ?? 'User Tidak Ditemukan' }}</td>
                                                                <td>{{ $p->nama }}</td>
                                                                <td>{{ $p->telepon }}</td>
                                                                <td>{{ $p->kategori->nama_layanan ?? 'Kategori Tidak Ditemukan' }}
                                                                </td> <!-- Jika menggunakan relasi -->
                                                                <td>{{ $p->lokasi_acara }}</td>
                                                                <td>{{ $p->tanggal_acara }}</td>
                                                                <td>{{ $p->waktu_acara }}</td>
                                                                <td>{{ number_format($p->total_tagihan, 0, ',', '.') }}</td>
                                                                <td>{{ $p->jumlah_dp }}</td>
                                                                <!-- Format angka -->
                                                                <td>
                                                                    <form
                                                                        action="{{ route('pesanan.updateStatus', $p->id_pesanan) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn
                                                                            @if ($p->status_pesanan == 'Pending') btn-danger
                                                                            @elseif($p->status_pesanan == 'Diproses') btn-warning
                                                                            @elseif($p->status_pesanan == 'Selesai') btn-success @endif
                                                                            btn-sm">
                                                                            {{ $p->status_pesanan }}
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <!-- Tombol Detail -->

                                                                    <button type="button" class="btn btn-info btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#detailModal{{ $p->id_pesanan }}">
                                                                        Detail
                                                                    </button>
                                                                    <!-- Tombol Hapus -->
                                                                    <form action="{{ route('pesanan1.destroy', $p->id_pesanan) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                                    </form>

                                                                </td>


                                                            </tr>
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


            <!-- Modal untuk Detail Pesanan -->
            @foreach ($pesanan as $p)
            <div class="modal fade" id="detailModal{{ $p->id_pesanan }}" tabindex="-1" role="dialog"
                aria-labelledby="detailModalLabel{{ $p->id_pesanan }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $p->id_pesanan }}">Detail Pesanan
                                #{{ $p->id_pesanan }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Atas Nama:</strong> {{ $p->nama }}</p>
                            <p><strong>No Telepon:</strong> {{ $p->telepon }}</p>
                            <p><strong>Kategori Pesanan:</strong>
                                {{ $p->kategori->nama_kategori ?? 'Kategori Tidak Ditemukan' }}</p>
                            <p><strong>Lokasi Acara:</strong> {{ $p->lokasi_acara }}</p>
                            <p><strong>Tanggal Acara:</strong> {{ $p->tanggal_acara }}</p>
                            <p><strong>Waktu Acara:</strong> {{ $p->waktu_acara }}</p>
                            <p><strong>Total Tagihan:</strong> {{ number_format($p->total_tagihan, 0, ',', '.') }}</p>
                            <p><strong>Status Pesanan:</strong> {{ $p->status_pesanan }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



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
