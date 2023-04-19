<?php

if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '';
}
if ($page == '' || $page == 1) {
    $begin = 1;
} else {
    $begin = ($page * 3) - 3;
}
include_once 'connect.php';
$rows = mysqli_query($conn, "SELECT * FROM san_pham ORDER BY id_product DESC");
$rows_limit = mysqli_query($conn, "SELECT * FROM san_pham ORDER BY id_product DESC LIMIT $begin,3");

$sql_trang = mysqli_query($conn, "SELECT * FROM san_pham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/listing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="filter">
            <h2>Filter</h2>
            <div class="search_div">
                <input type="text" class="search_input" placeholder="Type to search">
                <a href="#" class="search_button">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            <div class="price">
                <p>Price </p>
                <div class="value">
                    <span class="min">0</span>
                    <span class="max">120</span>
                </div>
                <div class="range-slider">
                    <span class="rangeValues"></span>
                    <input value="0" min="0" max="120" type="range">
                    <input value="120" min="0" max="120" type="range">
                </div>
            </div>
            <!--price-->

            <div class="food-type">
                <div class="food-type-details">
                    <input type="radio" name="food-type" id="dot-1">
                    <input type="radio" name="food-type" id="dot-2">
                    <input type="radio" name="food-type" id="dot-3">
                    <input type="radio" name="food-type" id="dot-4">
                    <p>Type of food</p>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="food">Organic bars</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="food">Berries</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="food">Nuts</span>
                        </label>
                        <label for="dot-4">
                            <span class="dot four"></span>
                            <span class="food">Dried fruits</span>
                        </label>
                    </div>
                </div>

            </div>
            <!--food-type-->

            <div class="form">
                <div class="form-details">
                    <input type="radio" name="form" id="dot-5">
                    <input type="radio" name="form" id="dot-6">
                    <p>Form</p>
                    <div class="category">
                        <label for="dot-5">
                            <span class="dot five"></span>
                            <span class="food">Prepackaged</span>
                        </label>
                        <label for="dot-6">
                            <span class="dot six"></span>
                            <span class="food">On weight</span>
                        </label>
                    </div>
                </div>
            </div>
            <!--form-->

            <div class="volume">
                <p>Volume</p>
            </div>
            <!--volume-->

            <div class="special-features">
                <p>Special features</p>
            </div>
            <!--special-features-->

            <div class="other-items">
                <p>Other items</p>
            </div>
            <!--other-items-->
        </div>
        <div class="listing">
            <div class="listing-header">
                <p>Homepage/ Organic bars</p>
                <h1>Organic bars</h1>
            </div>
            <div class="tag">
                <div class="tag-detail">
                    <p>Price:</p>
                </div>
                <div class="tag-detail">
                    <p>Form:</p>
                </div>
            </div>
            <!--tag-->

            <div class="box-container">
                <?php foreach ($rows as $row) : ?>
                    <div class="box_1">
                        
                            <div class="box">
                                <img src="../admin/upload/<?php echo $row['Image'] ?>" alt="">
                                <div class="icon-star">
                                    <i class="fi fi-sr-star"></i>
                                    <p>5/5</p>
                                </div>
                                <a style="text-decoration:none" href="index.php?page=product-card&id=<?php echo $row['id_product'] ?>">
                                <h3 class="product"><?php echo $row['Product']; ?></h3>
                                </a>
                                <div class="click">
                                    <div class="btn">
                                            <button style="cursor:pointer" type="button" class="button add-cart" onclick="add_cart(<?php echo $row['id_product']?>)">Add <i class="fi fi-br-add"></i></button>
                                    </div>
                                    <div class="p-w">
                                        <span class="price">$ <?php echo $row['price'] ?></span>
                                        <span class="weight">/ 500g</span>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                <?php endforeach; ?>

            </div>
            <!--box-container-->

        </div>

        <!-- <div class="loader-container">
            <img src="assets/Public/Picture/loader.gif" alt="">
        </div> -->
    </div>

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="assets/js/listing.js"></script>
</body>

</html>