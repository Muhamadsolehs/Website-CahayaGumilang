@extends('layout.v_template')
@section('title_page', 'Admin | Laporan Keuangan')
@section('content')

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

                <h1>Laporan Keuangan</h1>
                <div>
                    <a href="{{ route('laporan.keuangan.cetak') }}" target="_blank">
                        <button type="button" class="btn btn-outline-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                    </a>
                </div>



                <table>
                    <form method="GET" action="{{ route('laporankeuangan.filter') }}">
                        <label for="month">Bulan:</label>
                        <select name="month" id="month">
                            <option value="">Pilih Bulan</option>
                            @foreach (range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>

                        <label for="year">Tahun:</label>
                        <select name="year" id="year">
                            <option value="">Pilih Tahun</option>
                            @foreach (range(date('Y') - 10, date('Y')) as $y)
                                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit">Filter</button>
                    </form>



                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanKeuangan as $data)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($data['tanggal'])->format('d-m-Y') }}</td>
                                <td>{{ $data['keterangan'] }}</td>
                                <td class="text-right">{{ $data['debit'] ? number_format($data['debit'], 2) : '-' }}</td>
                                <td class="text-right">{{ $data['kredit'] ? number_format($data['kredit'], 2) : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="2">Total</td>
                            <td class="text-right">{{ number_format($totalDebit, 2) }}</td>
                            <td class="text-right">{{ number_format($totalKredit, 2) }}</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="3">Saldo Akhir</td>
                            <td class="text-right">{{ number_format($saldoAkhir, 2) }}</td>
                        </tr>
                    </tfoot>

                </table>



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
