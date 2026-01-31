<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota</title>

    <link rel="stylesheet" href="{{ asset('css/kelola-anggota.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
<aside class="sidebar">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
    </div>

    <ul class="menu">
        <li class="{{ request()->is('kelola_data_buku*') ? '' : '' }}">
            <a href="/kelola_data_buku">
                <i class="fa fa-book"></i> Kelola Data Buku
            </a>
        </li>

        <li class="{{ request()->is('kelola_anggota*') ? '' : '' }}">
            <a href="/kelola_anggota">
                <i class="fa fa-users"></i> Kelola Anggota
            </a>
        </li>

        <li class="{{ request()->is('transaksi*') ? '' : '' }}">
            <a href="/transactions">
                <i class="fa fa-right-left"></i> Transaksi
            </a>
        </li>

       <li class="{{ request()->is('daftar_pengunjung') ? '' : '' }}">
    <a href="/daftar_pengunjung">
        <i class="fa fa-list"></i> Daftar Pengunjung
    </a>
</li>


        <li class="{{ request()->is('laporan_kehilangan*') ? '' : '' }}">
            <a href="/laporan_kehilangan">
                <i class="fa fa-file"></i> Laporan Kehilangan
            </a>
        </li>
    </ul>
</aside>
    <!-- MAIN -->
    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">
            <i class="fa fa-bars"></i>
            <div class="user">
                <span>Seulgi</span>
                <small>Admin</small>
                <img src="{{ asset('images/avatar.png') }}">
            </div>
        </header>

        <!-- CONTENT -->
        <section class="content">

        <!-- HEADER CARD -->
    <div class="header-card">
        <div class="header-left">
            <div class="header-icon">
                <i class="fa fa-user"></i>
            </div>
            <div>
                <h3>Kelola Anggota</h3>
                <p>Mencatat data pengunjung perpustakaan</p>
            </div>
        </div>
        <img src="{{ asset('img/book.png') }}" class="header-img">
    </div>

    <div class="tab-wrapper">
    <a href="/transaksi/verifikasi"
       class="tab-item {{ request()->is('transaksi/verifikasi') ? 'active' : '' }}">
        Verifikasi
    </a>

    <a href="/transaksi/diterima"
       class="tab-item {{ request()->is('transaksi/diterima') ? 'active' : '' }}">
        Diterima
    </a>

    <a href="/transaksi/ditolak"
       class="tab-item {{ request()->is('transaksi/ditolak') ? 'active' : '' }}">
        Ditolak
    </a>
</div>


           <!-- TABLE CARD -->
    <div class="table-card">

        <div class="table-header">
            <div class="filter">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Cari sesuatu...">
                </div>

                <div class="date">
                    <i class="fa fa-calendar"></i>
                    <input type="date">
                </div>
            </div>
        </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS/NISN</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Erika Putri</td>
                                <td>6550xxxx</td>
                                <td>X RPL</td>
                                <td>20/01/2026</td>
                                <td class="aksi">
                                    <button class="yes">✔</button>
                                    <button class="no">✖</button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
</div>

</body>
</html>
