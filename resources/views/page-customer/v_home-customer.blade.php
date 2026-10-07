@extends('layout.v_template2')
@section('title_page', 'Customer | Dashboard')
@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <h3>Selamat Datang, {{ $user ? $user->nama_lengkap : 'pengunjung' }}!</h3>
                            <p>Senang melihat Anda kembali di website kami.</p>
                        </div>
                    </div>
                </div>
            </div>
            <head>
                <!-- FullCalendar CSS -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />
            </head>
            <body>
                <!-- FullCalendar JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
            </body>

            <div id="calendar"></div>

            <script>
                $(document).ready(function() {
                    $('#calendar').fullCalendar({
                        events: '/api/get-tanggal-acara',  // Mengambil data dari route API
                        selectable: true,
                        eventRender: function(event, element) {
                            element.css('background-color', event.isAvailable ? 'green' : 'red');
                        }
                    });
                });
            </script>

            <div class="container">
                <h3>Pilih Tanggal untuk Acara</h3>
                <div class="form-group">
                    <label for="tanggal">Tanggal Acara:</label>
                    <input type="text" id="tanggal_acara" name="tanggal_acara" class="form-control">
                </div>
            </div>




        </div>
    </div>
</div>

@endsection
