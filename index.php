<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

// Ambil data pelanggan
$query_pelanggan = "SELECT COUNT(*) FROM pelanggan";
$result_pelanggan = pg_query($conn, $query_pelanggan);
$row_pelanggan = pg_fetch_assoc($result_pelanggan);
$total_pelanggan = $row_pelanggan['count'];

// Ambil pesanan aktif
$query_pesanan = "SELECT COUNT(*) FROM pesanan WHERE status = 'Aktif'";
$result_pesanan = pg_query($conn, $query_pesanan);
$row_pesanan = pg_fetch_assoc($result_pesanan);
$pesanan_aktif = $row_pesanan['count'];

// Ambil total pendapatan
$query_pendapatan = "SELECT SUM(total_harga) FROM pesanan WHERE status = 'Selesai'";
$result_pendapatan = pg_query($conn, $query_pendapatan);
$row_pendapatan = pg_fetch_assoc($result_pendapatan);
$pendapatan = $row_pendapatan['sum'];

// Ambil pesanan belum dibayar
$query_belum_bayar = "SELECT COUNT(*) FROM pesanan WHERE status = 'Belum Dibayar'";
$result_belum_bayar = pg_query($conn, $query_belum_bayar);
$row_belum_bayar = pg_fetch_assoc($result_belum_bayar);
$pesanan_belum_bayar = $row_belum_bayar['count'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Dashboard</title>
	<link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
		<nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
			<div class="position-sticky p-3">
				<h4 class="text-white text-center">Laundry Admin</h4>
				<hr class="text-white">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link text-white" href="index.php"><i class="bi bi-house-door"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#"><i class="bi bi-people"></i> Kelola Pelanggan</a>
					</li>
					<li class="nav-item">
    					<a class="nav-link text-white collapsed" data-bs-toggle="collapse" href="#transaksiSubMenu" aria-expanded="false">
        					<i class="bi bi-cart"></i> Transaksi
    					</a>
					<ul class="collapse list-unstyled ps-3" id="transaksiSubMenu">
						<li><a class="nav-link text-white" href="tambah_pelanggan.php"><i class="bi bi-person-plus"></i> Tambah Pelanggan</a></li>
						<li><a class="nav-link text-white" href="tambah_pesanan.php"><i class="bi bi-basket"></i> Tambah Pesanan</a></li>
					</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#"><i class="bi bi-bar-chart"></i> Laporan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
					</li>
				</ul>
			</div>
		</nav>
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-center flex-wrap align-items-center pt-1 pb-1 mb-1 border-bottom">
                <h1 class="h2">Dashboard Laundry</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pelanggan</h5>
                            <p class="card-text">250 Orang</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pesanan Aktif</h5>
                            <p class="card-text">45 Pesanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pendapatan Bulanan</h5>
                            <p class="card-text">Rp 10.500.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pesanan Belum Dibayar</h5>
                            <p class="card-text">12 Pesanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>