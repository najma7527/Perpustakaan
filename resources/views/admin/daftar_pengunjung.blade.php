<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengunjung</title>
    <link rel="stylesheet" href="{{ asset('css/daftar_pengunjung.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

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

        <li class="{{ request()->is('daftar_pengunjung*') ? '' : '' }}">
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


<!-- TOPBAR -->
<header class="topbar">
    <i class="fa fa-bars"></i>
    <div class="user">
        <span>Seulgi</span>
        <small>Admin</small>
        <img src="{{ asset('img/user.png') }}">
    </div>
</header>

<!-- CONTENT -->
<main class="content">

    <!-- HEADER CARD -->
    <div class="header-card">
        <div class="header-left">
            <div class="header-icon">
                <i class="fa fa-user"></i>
            </div>
            <div>
                <h3>Daftar Pengunjung</h3>
                <p>Mencatat data pengunjung perpustakaan</p>
            </div>
        </div>
        <img src="{{ asset('img/book.png') }}" class="header-img">
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
                        <th>Nama Pengunjung</th>
                        <th>Transaksi</th>
                        <th>Kelas</th>
                        <th>Tanggal Datang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=1; $i<=10; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Afian tombal ban</td>
                        <td>{{ $i % 2 ? 'Peminjaman' : 'Pengembalian' }}</td>
                        <td>X RPL {{ rand(1,2) }}</td>
                        <td>20/01/2026</td>
                        <td>
                            <button class="btn-delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

    </div>

</main>

</body>
</html>
