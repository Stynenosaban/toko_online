<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);

$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='{$produk['kategori_id']}'  LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop | Product Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- Detail Produk -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="text-harga">
                        Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                    </p>
                    <p class="fs-5">
                        Status: <strong><?php echo $produk['ketersediaan_stok']; ?></strong>
                    </p>
                    <!-- Fitur Checkout -->
                    <?php if ($produk['ketersediaan_stok'] > 0) { ?>
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="produk_id" value="<?php echo $produk['id']; ?>">
                            <input type="hidden" name="harga" value="<?php echo $produk['harga']; ?>">
                            <div class="d-grid">
                                <button type="submit" class="btn bg-dark text-white btn-lg">Checkout</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <p class="text-danger">This product is currently out of stock.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk terkait -->
    <div class="container-fluid warna py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Related Products</h2>
            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                            <img src="image/<?php echo $data['foto']; ?>"
                                class="img-fluid img-thumbnail produk-terkait-image" alt="<?php echo $data['nama']; ?>">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>