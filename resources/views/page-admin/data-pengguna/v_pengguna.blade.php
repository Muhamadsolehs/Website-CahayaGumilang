@extends('layout.v_template')
@section('title_page', 'Admin | Data Pengguna')
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
                    <div class="col-lg-12 grid-margin stretch-card">

                        <div class="card">

                            <div class="card-body">
                                <div>
                                    <h2 class="card-title">Data Pengguna</h2>
                                {{-- <p class="card-description"> Add class <code>.table-striped</code> --}}
                                </div>
                                <a href="{{ route('user.create') }}">
                                    <li class="nav-item dropdown d-none d-lg-block">
                                        <button type="button" class="btn btn-success btn-md">Tambah</button>
                                    </li>
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" style="color: #ffffff;">
                                        <thead class="text-center">
                                            <tr>
                                                <th style="color: #ffffff;"> No </th>
                                                <th style="color: #ffffff;"> Username </th>
                                                <th style="color: #ffffff;"> Password </th>
                                                <th style="color: #ffffff;"> Akses </th>
                                                <th style="color: #ffffff;"> Nama lengkap </th>
                                                <th style="color: #ffffff;"> Nomor Telepon </th>
                                                <th style="color: #ffffff;"> Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($user as $u)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>{{ $u->password }}</td>
                                                    <td>{{ $u->role }}</td>
                                                    <td>{{ $u->nama_lengkap }}</td>
                                                    <td>{{ $u->nomor_telepon }}</td>

                                                    <td class="text-center">
                                                        <a href="/user/{{ $u->id_user }}/edit"
                                                            class="btn btn-warning btn-sm mr-2">Edit</a>

                                                        <!-- Form Hapus -->
                                                        <form action="{{ route('user.destroy', $u->id_user) }}"
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
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                            href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                            templates</a> from Bootstrapdash.com</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>


    <!-- page-body-wrapper ends -->

@endsection
