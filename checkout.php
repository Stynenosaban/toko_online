<?php
require "koneksi.php";

// Cek apakah parameter POST ada
if (isset($_POST['produk_id']) && isset($_POST['harga'])) {
    // Ambil nilai dari parameter POST
    $produk_id = intval($_POST['produk_id']);
    $harga = floatval($_POST['harga']);
    
    // Query untuk mendapatkan detail produk
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id='$produk_id'");
    $produk = mysqli_fetch_array($queryProduk);

    if (!$produk) {
        // Jika produk tidak ditemukan, berikan pesan error dan hentikan eksekusi script
        echo "Produk tidak ditemukan!";
        exit;
    }
} else {
    // Jika parameter POST tidak ada, tampilkan pesan error
    echo "Parameter produk_id atau harga tidak ada!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop | Checkout</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5"><?php echo $produk['detail']; ?></p>
                    <p class="text-harga">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
                    <p class="fs-5">Status: <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>

                    <!-- Form Pembayaran -->
                    <form action="proses_pembayaran.php" method="post">
                        <input type="hidden" name="produk_id" value="<?php echo $produk['id']; ?>">
                        <input type="hidden" name="total" value="<?php echo $produk['harga']; ?>">
                        
                        <label for="metode_pembayaran">Pilih Metode Pembayaran:</label>
                        <select name="metode_pembayaran" class="form-select">
                            <option value="bca">Bank BCA</option>
                            <option value="bni">Bank BNI</option>
                            <option value="mandiri">Bank Mandiri</option>
                            <option value="paypal">PayPal</option>
                            <option value="ovo">OVO</option>
                            <option value="gopay">GoPay</option>
                            <option value="dana">DANA</option>
                        </select>
                        
                        <button type="submit" class="btn btn-primary mt-3">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>
