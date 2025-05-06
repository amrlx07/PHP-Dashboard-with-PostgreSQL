<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pelanggan_id = $_POST['pelanggan_id'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    // Tambahkan pesanan ke database
    $query_pesanan = "INSERT INTO pesanan (pelanggan_id, jenis, status, total_harga) VALUES ('$pelanggan_id', '$jenis', 'Aktif', '$harga')";
    pg_query($conn, $query_pesanan);

    echo "Pesanan berhasil ditambahkan!";
    header("Location: tambah_pesanan.php");
}
?>