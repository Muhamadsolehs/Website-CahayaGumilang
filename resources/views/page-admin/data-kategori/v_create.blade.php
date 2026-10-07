@extends('layout.v_template')
@section('title_page', 'Data Kategori | Create')
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
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah data kategori layanan</h4>
                                <p class="card-description"> Masukan data kategori layanan yang akan ditambahkan pada form dibawah</p>


                                <form class="forms-sample" action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Nama Layanan -->
                                    <div class="form-group row">
                                        <label for="nama_layanan" class="col-sm-3 col-form-label">Nama Layanan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_layanan" placeholder="Layanan" name="nama_layanan"
                                                value="{{ old('nama_layanan') }}" required />
                                        </div>
                                    </div>
                                    <!-- Deskripsi -->
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi" name="deskripsi" required />
                                        </div>
                                    </div>
                                    <!-- Harga -->
                                    <div class="form-group row">
                                        <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga" required />
                                        </div>
                                    </div>
                                    <!-- Foto -->
                                    <div class="form-group row">
                                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" required />
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('kategori.index') }}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection
