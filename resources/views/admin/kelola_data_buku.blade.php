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


        <li class="{{ request()->is('laporan_data_kehilangan*') ? '' : '' }}">
            <a href="/laporan_data_kehilangan">
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
      <button class="btn delete" onclick="openModal(this)" data-id="{{ $i }}">
    <i class="fa-solid fa-trash"></i>
</button>
<!-- ================= MODAL HAPUS ================= -->
<div class="modal-overlay" id="modalHapus">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Hapus Data Buku</h3>
        </div>

        <div class="modal-body">
            <p>Apakah kamu yakin ingin menghapus data buku?</p>
        </div>

        <div class="modal-footer">
            <button class="btn-modal batal" onclick="closeModal()">Batal</button>
            <button class="btn-modal yakin" onclick="hapusData()">Iya, saya yakin</button>
        </div>
    </div>
</div>

<button class="btn view"
    onclick="openDetail(this)"
    data-judul="Laut Bercerita"
    data-penulis="Leila S. Chudori"
    data-kategori="Fiksi"
    data-deskripsi="Laut Bercerita adalah novel fiksi sejarah karya Leila S. Chudori yang sangat terinspirasi dari kisah nyata, mengangkat isu penculikan aktivis di masa Orde Baru."
    data-gambar="{{ asset('img/buku.jpg') }}"
>
    <i class="fa-solid fa-eye"></i>
</button>

<!-- ================= MODAL DETAIL BUKU ================= -->
<div class="modal-overlay" id="modalDetail">
    <div class="modal-detail-box">
        <div class="modal-header">
            <h3>Detail Buku</h3>
        </div>

        <div class="modal-detail-body">
            <img id="detailGambar" src="" alt="Buku">

            <div class="detail-text">
                <h2 id="detailJudul"></h2>
                <p class="penulis">By: <span id="detailPenulis"></span></p>
                <span class="badge" id="detailKategori"></span>
                <p class="deskripsi" id="detailDeskripsi"></p>
            </div>
        </div>

        <div class="modal-footer-detail">
            <button class="btn-tutup" onclick="closeDetail()">Tutup</button>
        </div>
    </div>
</div>


                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

        </div>

    </main>
</div>

</body>
<script>
    let selectedRow = null;
    let selectedId = null;

    function openModal(button) {
        selectedRow = button.closest('tr');
        selectedId = button.getAttribute('data-id');
        document.getElementById('modalHapus').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modalHapus').style.display = 'none';
    }

    function hapusData() {
        fetch(`/kelola_data_buku/${selectedId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => {
            if (res.ok) {
                selectedRow.remove(); // HILANG LANGSUNG
                closeModal();
            } else {
                alert('Gagal menghapus data');
            }
        });
    }

    document.getElementById('modalHapus').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    function openDetail(btn) {
        document.getElementById('detailJudul').innerText = btn.dataset.judul;
        document.getElementById('detailPenulis').innerText = btn.dataset.penulis;
        document.getElementById('detailKategori').innerText = btn.dataset.kategori;
        document.getElementById('detailDeskripsi').innerText = btn.dataset.deskripsi;
        document.getElementById('detailGambar').src = btn.dataset.gambar;

        document.getElementById('modalDetail').style.display = 'flex';
    }

    function closeDetail() {
        document.getElementById('modalDetail').style.display = 'none';
    }

    document.getElementById('modalDetail').addEventListener('click', function(e) {
        if (e.target === this) closeDetail();
    });
</script>


</html>
