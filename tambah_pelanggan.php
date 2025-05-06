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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Transaksi</h1>
            </div>
            <div class="container mt-5">
            <h2>Tambah Pelanggan</h2>
                <form action="process_pelanggan.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>