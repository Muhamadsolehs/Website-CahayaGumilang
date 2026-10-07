<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <title>@yield('title_page')</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #373636;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .total-row {
            font-weight: bold;
            background-color: #373636;
        }
    </style>
    <style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            max-width: 100%;
            margin: 20px 0;
        }

        .calendar div {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            min-height: 100px;
            position: relative;
        }

        .calendar div .date {
            font-weight: bold;
            font-size: 18px;
        }

        .event {
            background-color: #007bff;
            color: white;
            padding: 5px;
            margin-top: 5px;
            border-radius: 3px;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('template') }}/assets/images/favicon.png" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img
                    src="{{ asset('template') }}/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control" placeholder="Search products">
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                        data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Event today</p>
                                <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                                <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-link-variant text-warning"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Launch Admin</p>
                                <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">See all notifications</p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle"
                                src="{{ asset('template') }}/assets/images/faces/face15.jpg" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                    {{ Auth::user()->nama_lengkap }}
                                </p>

                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Profile</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <p class="preview-subject mb-1" style="cursor: pointer;" onclick="this.closest('form').submit();">
                                        Log out
                                    </p>
                                </form>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>


    <div class="container-scroller">
        @include('layout/v_nav')
        @yield('content')
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('template') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('template') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('template') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('template') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('template') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('template') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('template') }}/assets/js/misc.js"></script>
    <script src="{{ asset('template') }}/assets/js/settings.js"></script>
    <script src="{{ asset('template') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('template') }}/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
