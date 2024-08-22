<?php
require "koneksi.php";

// Cek apakah parameter POST ada
if (isset($_POST['produk_id']) && isset($_POST['total']) && isset($_POST['metode_pembayaran'])) {
    // Ambil nilai dari parameter POST
    $produk_id = intval($_POST['produk_id']);
    $total = floatval($_POST['total']);
    $metode_pembayaran = htmlspecialchars($_POST['metode_pembayaran']);
    
    // Masukkan data transaksi ke database
    $query = "INSERT INTO transaksi (produk_id, total, metode_pembayaran, status_pembayaran) 
              VALUES ('$produk_id', '$total', '$metode_pembayaran', 'pending')";
    
    if (mysqli_query($con, $query)) {
        echo "Transaksi berhasil diproses! Status pembayaran adalah 'pending'.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Parameter produk_id, total, atau metode_pembayaran tidak ada!";
}
?>
