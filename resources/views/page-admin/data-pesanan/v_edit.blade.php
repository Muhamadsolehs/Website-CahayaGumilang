@extends('layout.v_template')
@section('title_page', 'Data Pesanan | Update')
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
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah data user</h4>
                                <p class="card-description"> Masukan data user yang akan ditambahkan pada form dibawah</p>
                                <form class="forms-sample" action="{{ route('pesanan.update',$pesanan->id_pesanan) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <!-- Username -->
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Atas Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username"
                                                placeholder="nama" name="nama" value="{{$pesanan->nama}}"
                                                required />
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group row">
                                        <label for="telepon" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <input type="telepon" class="form-control" id="telepon"
                                                name="telepon" value="{{$pesanan->telepon}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-3 col-form-label">Kategor</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_lengkap"
                                                placeholder="Nama Lengkap" name="nama_lengkap"
                                                value="{{ $user->nama_lengkap}}" required />
                                        </div>
                                    </div>
                                    <!-- Nomor Telepon -->
                                    <div class="form-group row">
                                        <label for="nomor_telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomor_telepon"
                                                placeholder="Nomor Telepon" name="nomor_telepon"
                                                value="{{ $user->nomor_telepon}}" required />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('user.index') }}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- main-panel ends -->
            </div>


            <!-- page-body-wrapper ends -->

        @endsection
