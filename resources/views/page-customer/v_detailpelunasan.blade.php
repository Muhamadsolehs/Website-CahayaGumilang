<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <title>Customer | Detail Pelunasan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('template') }}/assets/images/favicon.png" />
    <style>
        /* Custom styling for the receipt-like look */
        .receipt-card {
            border: 2px dashed #ccc;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', Courier, monospace;
            position: relative;
            color: #000;
            /* Default text color for the card */
        }

        .receipt-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 10px;
            background: #ccc;
            border-radius: 10px;
            margin-top: -15px;
        }

        .receipt-card h4 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #000;
            /* Title color */
        }

        .receipt-content {
            margin-bottom: 20px;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            font-size: 14px;
            color: #000;
            /* Text color for details */
        }

        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
            /* Footer text color */
        }

        .btn-pay {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-pay:hover {
            background-color: #0056b3;
        }

        .dashed-line {
            border-top: 1px dashed #999;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="col-lg-4 mx-auto">
                        <div class="receipt-card">
                            <h4>Detail Pelunasan</h4>
                            <div class="receipt-content">
                                <div class="receipt-item">
                                    <span>Atas Nama:</span>
                                    <span>{{ $pesanan->nama }}</span>
                                </div>
                                <div class="receipt-item">
                                    <span>No Telepon:</span>
                                    <span>{{ $pesanan->telepon }}</span>
                                </div>
                                <div class="receipt-item">
                                    <span>Lokasi Acara:</span>
                                    <span>{{ $pesanan->lokasi_acara }}</span>
                                </div>
                                <div class="dashed-line"></div>
                                <div class="receipt-item">
                                    <span><strong>Total Tagihan:</strong></span>
                                    <span><strong>Rp.{{ number_format($pesanan->total_tagihan, 2, ',', '.') }}</strong></span>
                                </div>
                                <div class="receipt-item">
                                    <span><strong>Total Pelunasan:</strong></span>
                                    <span><strong>Rp.{{ number_format($pesanan->total_tagihan - $pesanan->jumlah_dp, 2, ',', '.') }}</strong></span>
                                </div>
                            </div>
                                <button type="submit" class="btn-pay" id="pay-button">Bayar</button>
                            <div class="receipt-footer">
                                Terima kasih atas pesanan Anda!
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>



    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        // Snap Token dari Midtrans
        const snapToken = "{{ $snapToken }}";

        // Event Listener untuk tombol "Bayar Sekarang"
        document.getElementById('pay-button').addEventListener('click', function() {
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    window.location.href='/pelunasan/sukses?id_pesanan={{$pesanan->id_pesanan}}';
                    // Redirect ke halaman sukses (opsional)
                },
                onPending: function(result) {
                    alert("Pembayaran pending!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    alert("Popup pembayaran ditutup!");
                }
            });
        });
    </script>




    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('template') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('template') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('template') }}/assets/js/misc.js"></script>
    <script src="{{ asset('template') }}/assets/js/todolist.js"></script>
    <script src="{{ asset('template') }}/assets/js/settings.js"></script>
    <!-- endinject -->
</body>

</html>
