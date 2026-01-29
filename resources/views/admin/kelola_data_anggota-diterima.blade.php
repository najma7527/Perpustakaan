<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Diterima</title>

    <link rel="stylesheet" href="{{ asset('css/kelola-anggota-diterima.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}">
        </div>

        <ul class="menu">
            <li><a href="/kelola_data_buku"><i class="fa fa-book"></i> Kelola Data Buku</a></li>
            <li class="active"><a href="/kelola_anggota"><i class="fa fa-users"></i> Kelola Anggota</a></li>
            <li><a href="/transaksi"><i class="fa fa-right-left"></i> Transaksi</a></li>
            <li><a href="/daftar_pengunjung"><i class="fa fa-list"></i> Daftar Pengunjung</a></li>
            <li><a href="/laporan_data_kehilangan"><i class="fa fa-file"></i> Laporan Kehilangan</a></li>
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
                        <i class="fa fa-user-check"></i>
                    </div>
                    <div>
                        <h3>Kelola Anggota</h3>
                        <p>Daftar anggota yang telah diterima</p>
                    </div>
                </div>
                <img src="{{ asset('img/book.png') }}">
            </div>

            <!-- TAB -->
            <div class="tab-wrapper">
                <a href="/kelola_anggota-verifikasi" class="tab-item">Verifikasi</a>
                <a href="/kelola_anggota-diterima" class="tab-item active">Diterima</a>
                <a href="/kelola_anggota-ditolak" class="tab-item">Ditolak</a>
            </div>

            <!-- TABLE -->
            <div class="table-card">

                <div class="filter">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Cari anggota...">
                    </div>
                    <div class="date">
                        <i class="fa fa-calendar"></i>
                        <input type="date">
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td>{{ $i }}</td>

                            <!-- USER CELL (TIDAK DIUBAH STRUKTURNYA) -->
                            <td class="user-cell">
                                <img src="{{ asset('images/avatar.png') }}" class="avatar">
                                <div class="user-info">
                                    <strong>Erika Putri Himawan</strong>
                                    <small>@erikagemoi</small>
                                </div>
                            </td>

                            <td>6550{{ $i }}</td>
                            <td>00223344{{ $i }}</td>
                            <td>X RPL</td>
                            <td><span class="status aktif">Diterima</span></td>

                            <td class="aksi">
                                <button class="edit"><i class="fa fa-pen"></i></button>
                                <button class="view"><i class="fa fa-eye"></i></button>
                                <button class="delete"><i class="fa fa-trash"></i></button>
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
