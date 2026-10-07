@extends('layout.v_template')
@section('title_page', 'Admin | Data Jadwal')
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
                             <h2 class="card-title">Jadwal Kegiatan</h2>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $tanggalPemesanan = [];

               foreach ($pesanan as $p) {
                    $tanggalPemesanan[$p->tanggal_acara->format('Y-m-d')] = "Acara: {$p->kategori->nama_layanan} </br> Atas nama: {$p->nama}";
                }
            @endphp

            <style>
                .grid-group {
                    display: grid;
                    grid-template-columns: repeat(7, 1fr);
                    gap: 8px;
                }

                .grid-item {
                    position: relative;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100px; /* Adjust height for visibility */
                    background-color: white;
                    border-radius: 4px;
                    border: 1px solid #ddd;
                }

                .grid-item.bg-primary {
                    background-color: #007bff;
                    color: white;
                }

                .tooltip-kegiatan {
                    position: absolute;
                    top: -25px;
                    left: 0;
                    z-index: 9999;
                    display: none;
                    padding: 4px 8px;
                    background: #000;
                    color: #fff;
                    border-radius: 4px;
                    box-shadow: -2px 2px rgba(0, 0, 0, 0.2);
                }

                .grid-item:hover .tooltip-kegiatan {
                    display: block;
                }

                .grid-title {
                    font-weight: bold;
                    font-size: 18px;
                    color: #333;
                }

                /* Set font color to black for date numbers */
                .grid-item .tanggal {
                    font-size: 16px;
                    font-weight: bold;
                    color: black; /* Set font color to black */
                }
            </style>

            <div class="row">
                @for ($bulan = 1; $bulan <= 12; $bulan++)
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    Bulan {{ \Carbon\Carbon::create(null, $bulan, 1)->translatedFormat('F') }}
                                </div>
                                <div class="grid-group">
                                    @php
                                        $jumlahHariDalamBulan = \Carbon\Carbon::create(null, $bulan, 1)->daysInMonth;
                                        $tanggalPemesananBulanIni = collect($tanggalPemesanan)
                                            ->filter(function ($value, $key) use ($bulan) {
                                                $tanggal = \Carbon\Carbon::createFromFormat('Y-m-d', $key);
                                                return $tanggal->month == $bulan;
                                            })
                                            ->toArray();
                                    @endphp

                                    @for ($tanggal = 1; $tanggal <= $jumlahHariDalamBulan; $tanggal++)
                                        @php
                                            $tanggalFormat = \Carbon\Carbon::create(null, $bulan, $tanggal)->format('Y-m-d');
                                        @endphp
                                        <div class="grid-item @if(array_key_exists($tanggalFormat, $tanggalPemesananBulanIni)) bg-primary @endif">
                                            <div class="tanggal">
                                                <strong>{{ $tanggal }}</strong>
                                            </div>
                                            @if (array_key_exists($tanggalFormat, $tanggalPemesananBulanIni))
                                                <p class="tooltip-kegiatan">{!! $tanggalPemesananBulanIni[$tanggalFormat] !!}</p>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
