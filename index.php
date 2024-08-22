<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT  6")
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center text-white">
        <div class="container text-center">
            <h1>Book Shop</h1>
            <h3>What are you looking for?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Book's name"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn bg-dark text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Highlited Category -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Best Selling Category</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-komik d-flex justify-content-center align-items-center">
                        <h3 class="text-white"><a class="no-decoration" href="produk.php?kategori=Comic">Comic</a></h3>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-novel d-flex justify-content-center align-items-center">
                        <h3 class="text-white"><a class="no-decoration" href="produk.php?kategori=Novel">Novel</a></h3>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-cerita d-flex justify-content-center align-items-center">
                        <h3 class="text-white"><a class="no-decoration" href="produk.php?kategori=Journal">Journal</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- About Us -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>About Us</h3>
            <p class="fs-5 mt-3">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero commodi iste ipsum. A adipisci et
                laudantium necessitatibus vitae expedita blanditiis. Ad debitis nihil reprehenderit. At repudiandae,
                deleniti, qui ad dolor error, eius deserunt sit facere minima laudantium. Impedit veniam mollitia dolor
                debitis, ea saepe nobis esse odit corrupti explicabo dolores culpa deleniti libero quasi iusto assumenda
                ullam et, atque ipsum laborum adipisci! Voluptates aspernatur autem vero, rem error accusantium, iure
                nam veritatis temporibus quos tempora commodi optio sed ducimus velit!</p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5 text-center">
        <div class="container">
            <h3>Product</h3>

            <div class="row mt-5">
                <?php  while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="image/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['nama'];?></h5>
                            <p class="card-text text-truncate"><?php echo $data['detail'];?></p>
                                <p class="card-text text-harga">Rp<?php echo $data['harga'];?></p>
                            <a href="produk-detail.php?nama=<?php echo $data ['nama']?>" class="btn bg-dark text-white">Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-primary mt-3" href="produk.php">See More</a>
        </div>
    </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>