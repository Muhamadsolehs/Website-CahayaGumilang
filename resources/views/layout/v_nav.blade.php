<nav class="sidebar sidebar-offcanvas" id="sidebar" position= "fixed-top">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo">
            <h3>Cahaya Gumilang</h3>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('template') }}/assets/images/newlogo.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/home">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-folder-multiple "></i>
                </span>
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/pengguna">Pengguna</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/pengeluaran">Pengeluaran</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/kategori">Kategori layanan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/pesanan">
                <span class="menu-icon">
                    <i class=" mdi mdi-comment-processing-outline "></i>
                </span>
                <span class="menu-title">Pesanan</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-cash-multiple"></i>
              </span>
              <span class="menu-title">Pembayaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pembayaran/dp"> Down Payment (DP) </a></li>
                <li class="nav-item"> <a class="nav-link" href="/pembayaran/pelunasan"> Pelunasan </a></li>
              </ul>
            </div>
          </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/jadwal">
                <span class="menu-icon">
                    <i class="mdi mdi-calendar-blank"></i>
                </span>
                <span class="menu-title">Jadwal Pertunjukan</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/laporan-keuangan">
                <span class="menu-icon">
                    <i class="mdi mdi-library-books "></i>
                </span>
                <span class="menu-title">Laporan Keuangan</span>
            </a>
        </li>
    </ul>
</nav>
