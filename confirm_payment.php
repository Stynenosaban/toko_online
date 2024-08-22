<?php
require "koneksi.php";

// Cek apakah parameter POST ada
if (isset($_POST['transaksi_id']) && isset($_POST['status_pembayaran'])) {
    $transaksi_id = intval($_POST['transaksi_id']);
    $status_pembayaran = htmlspecialchars($_POST['status_pembayaran']);
    
    // Validasi status_pembayaran
    $valid_statuses = ['pending', 'completed', 'failed'];
    if (!in_array($status_pembayaran, $valid_statuses)) {
        echo "Status pembayaran tidak valid!";
        exit;
    }
    
    // Update status pembayaran di database
    $query = "UPDATE transaksi SET status_pembayaran='$status_pembayaran' WHERE id='$transaksi_id'";
    
    if (mysqli_query($con, $query)) {
        echo "Status pembayaran berhasil diperbarui!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Parameter transaksi_id atau status_pembayaran tidak ada!";
}
?>
