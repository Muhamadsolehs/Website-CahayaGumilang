@extends('layout.v_template')
@section('title_page', 'Data Pengeluaran | Update')
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
                                <h4 class="card-title">Update data pengeluaran</h4>
                                <p class="card-description"> Masukan data pengeluaran yang akan diupdate pada form dibawah</p>
                                <form class="forms-sample" action="{{ route('pengeluaran.update',$pengeluaran->id_pengeluaran) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <!-- Username -->
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tanggal_pengeluaran"
                                                placeholder="Tanggal pengeluaran" name="tanggal_pengeluaran" value="{{$pengeluaran->tanggal_pengeluaran}}"
                                                required />
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group row">
                                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="jumlah"
                                                placeholder="Jumlah pengeluaran" name="jumlah" value="{{$pengeluaran->jumlah}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="deskripsi"
                                                placeholder="Keterangan" name="deskripsi" value="{{$pengeluaran->deskripsi}}" required />
                                        </div>
                                    </div>
                                    <!-- Role -->
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('pengeluaran.index') }}"><button type="button" class="btn btn-dark">Cancel</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- main-panel ends -->
            </div>


            <!-- page-body-wrapper ends -->

        @endsection
