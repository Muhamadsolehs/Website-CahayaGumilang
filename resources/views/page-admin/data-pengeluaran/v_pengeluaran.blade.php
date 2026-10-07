@extends('layout.v_template')
@section('title_page', 'Admin | Data Pengeluaran')
@section('content')



    <!-- partial:partials/_sidebar.html -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial -->


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
                                <h4 class="card-title mb-1">Data Pengeluaran</h4>
                                <h4 class="card-title mb-1"> </h4>

                            </div>


                                <div class="d-flex">
                                    <a href="{{ route('pengeluaran.create') }}">
                                        <button type="button" class="btn btn-success btn-md">Tambah</button>
                                    </a>
                                </div>



                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">

                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center" style="color: #ffffff;">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th style="color: #ffffff;">No</th>
                                                            <th style="color: #ffffff;">Tanggal</th>
                                                            <th style="color: #ffffff;">Jumlah</th>
                                                            <th style="color: #ffffff;">Keterangan</th>
                                                            <th style="color: #ffffff;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        @foreach ($pengeluaran as $p)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $p->tanggal_pengeluaran }}</td>
                                                                <td>{{ $p->jumlah }}</td>
                                                                <td>{{ $p->deskripsi }}</td>
                                                                <td class="text-center">
                                                                    <a href="/pengeluaran/{{ $p->id_pengeluaran }}/edit"
                                                                        class="btn btn-warning btn-sm mr-2">Edit</a>

                                                                    <!-- Form Hapus -->
                                                                    <form
                                                                        action="{{ route('pengeluaran.destroy', $p->id_pengeluaran) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm">Hapus</button>
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
