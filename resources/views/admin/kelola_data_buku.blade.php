<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Buku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #fff;
            padding: 20px;
            border-right: 1px solid #e5e7eb;
        }

        .sidebar .menu {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #374151;
            text-decoration: none;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .sidebar .menu.active,
        .sidebar .menu:hover {
            background: #e0edff;
            color: #0d6efd;
        }

        /* Header Card */
        .header-card {
            background: linear-gradient(90deg, #0d6efd, #3b82f6);
            color: white;
            border-radius: 12px;
            padding: 20px;
        }

        /* Table */
        .table thead {
            background: #0d6efd;
            color: white;
        }

        .btn-icon {
            width: 34px;
            height: 34px;
            padding: 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="mb-4 fw-bold">📚 Perpustakaan</div>

        <a href="#" class="menu active">
            <i class="bi bi-book"></i> Kelola Data Buku
        </a>
        <a href="#" class="menu">
            <i class="bi bi-people"></i> Kelola Anggota
        </a>
        <a href="#" class="menu">
            <i class="bi bi-arrow-left-right"></i> Transaksi
        </a>
        <a href="#" class="menu">
            <i class="bi bi-person-lines-fill"></i> Daftar Pengunjung
        </a>
        <a href="#" class="menu">
            <i class="bi bi-exclamation-triangle"></i> Laporan Kehilangan
        </a>
    </aside>

    <!-- CONTENT -->
    <main class="flex-fill p-4">

        <!-- HEADER -->
        <div class="header-card d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">Kelola Data Buku</h5>
                <small>Mengelola data buku perpustakaan</small>
            </div>
            <div class="bg-white text-primary px-3 py-1 rounded fw-bold">
                Admin
            </div>
        </div>

        <!-- CONTENT CARD -->
        <div class="card mt-4">
            <div class="card-body">

                <div class="d-flex justify-content-between mb-3">
                    <div class="input-group w-25">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari sesuatu...">
                    </div>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBuku">
                        <i class="bi bi-plus"></i> Tambah Data Buku
                    </button>
                </div>

                <table class="table table-bordered align-middle text-center">
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
                            <td>Afiom Tambal Ban</td>
                            <td>032</td>
                            <td>Tere Liye</td>
                            <td>2004</td>
                            <td>Fiksi</td>
                            <td>3</td>
                            <td>
                                <button class="btn btn-warning btn-icon">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-danger btn-icon">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button class="btn btn-primary btn-icon">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

            </div>
        </div>

    </main>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambahBuku" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Tambah Data Buku</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kode Buku</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pengarang</label>
                    <input type="text
