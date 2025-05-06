<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];

    // Tambahkan pelanggan ke database
    $query_pelanggan = "INSERT INTO pelanggan (nama, kontak) VALUES ('$nama', '$kontak')";
    pg_query($conn, $query_pelanggan);

    echo "Pelanggan berhasil ditambahkan!";
    header("Location: tambah_pelanggan.php");
}
?>