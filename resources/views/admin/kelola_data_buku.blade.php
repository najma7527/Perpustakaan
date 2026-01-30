<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Buku</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/kelola_data_buku.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="layout">

 
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
            <a href="/transaksi">
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

    <!-- CONTENT -->
    <main class="content">

        <!-- TOPBAR -->
        <div class="topbar">
            <i class="fa-solid fa-bars"></i>
            <div class="user">
                @auth
                <span>{{ auth()->user()->name }}</span>
                <img src="{{ asset('img/user.png') }}" alt="User">
                @endauth
            </div>
        </div>

        <!-- HEADER CARD -->
        <div class="header-card">
            <div>
                <h3>Kelola Data Buku</h3>
                <p>Mengelola data buku perpustakaan</p>
            </div>
            <img src="{{ asset('img/book.png') }}" alt="Buku">
        </div>

        <!-- TABLE CARD -->
        <div class="table-card">

            <div class="table-header">
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari sesuatu...">
                </div>
                @auth
                <button class="btn-add">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data Buku
                </button>
                @endauth
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Kode Buku</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 1; $i <= 10; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Afian tombal ban</td>
                        <td>032</td>
                        <td>Tere Liye</td>
                        <td>2004</td>
                        <td>{{ $i % 2 == 0 ? 'Fiksi' : 'Non Fiksi' }}</td>
                        <td>{{ rand(1,8) }}</td>
                        <td class="aksi">
                            @auth
                            <button class="btn edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="btn delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @endauth
                            <button class="btn view">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

        </div>

    </main>
</div>

</body>
</html>
