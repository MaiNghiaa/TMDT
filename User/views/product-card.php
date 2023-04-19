<?php
include_once 'connect.php';
$id = $_GET['id'];
$action = $_GET['action'];
$rows = mysqli_query($conn, "SELECT * FROM san_pham ORDER BY RAND() LIMIT 4;");
$details = mysqli_query($conn, "SELECT * FROM san_pham where id_product = '$id'");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Css/product-card.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="product-card">
            <?php foreach ($details as $detail) : ?>
                <div class="left">
                    <img src="../admin/upload/<?php echo $detail['Image'] ?>" alt="">
                    <div class="customers-review">
                        <div class="customers-review-title">
                            <h1><?php echo $detail['Product'] ?></h1>
                            <div class="r-n">
                                <div class="stars">
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <p>5/5</p>
                                </div>
                                <p>(5,929 reviews)</p>
                            </div>
                        </div>
                        <!--customers-review-title-->
                        <div class="review">
                            <h2>Alexander</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatum ipsum nihil incidunt corrupti facere deserunt, labore reiciendis, culpa rerum eius nulla ad consequatur officiis assumenda deleniti doloribus ab odio?</p>
                            <div class="time-star">
                                <p>February 10, 2021</p>
                                <div class="stars">
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="review">
                            <h2>Christine</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatum ipsum nihil incidunt corrupti facere deserunt, labore reiciendis, culpa rerum eius nulla ad consequatur officiis assumenda deleniti doloribus ab odio?</p>
                            <div class="time-star">
                                <p>January 25, 2021</p>
                                <div class="stars">
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                    <i class="fi fi-sr-star"></i>
                                </div>
                            </div>
                        </div>


                        <!--div class="review">
                        <h2>Andrew</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatum ipsum nihil incidunt corrupti facere deserunt, labore reiciendis, culpa rerum eius nulla ad consequatur officiis assumenda deleniti doloribus ab odio?</p>
                        <div class="time-star">
                            <p>January 10, 2021</p>
                            <div class="stars">
                                <i class="fi fi-sr-star"></i>
                                <i class="fi fi-sr-star"></i>
                                <i class="fi fi-sr-star"></i>
                                <i class="fi fi-sr-star"></i>
                                <i class="fi fi-sr-star"></i>
                            </div>
                        </div>
                    </div-->
                    </div>
                    <!--customers-review-->
                </div>
                <!--left-->

                <div class="right">
                    <h1><?php echo $detail['Product'] ?></h1>
                    <div class="status">
                        <p>In stock</p>
                    </div>
                    <div class="info">
                        <div class="info-1">
                            <p>Composition:</p>
                            <p>Country:</p>
                            <p>Form:</p>
                        </div>
                        <div class="info-2">
                            <p>Natural apricot</p>
                            <p>Turkey</p>
                            <p>Prepackaged</p>
                        </div>
                    </div>

                    <div class="bill">
                        <div class="price">
                            <p class="total"><?php echo 'Total: $' . $detail['price'] ?></p>
                            <p class="real-price"><?php echo '$' . $detail['price'] ?> / 500g</p>
                        </div>
                        <div class="q-b">
                            <div class="quantity">
                                <span onclick="minus()"><button class="minus" type="button" data-type="minus">
                                        <i class="fi fi-rr-minus-small"></i>
                                    </button></span>
                                <input type="number" name="num" id="num" value="1" min="1">
                                <span onclick="plus()"><button class="plus" type="button" data-type="plus">
                                        <i class="fi fi-rr-plus-small"></i>
                                    </button></span>
                            </div>
                            <button class="add_to_cart" onclick="addprocart(<?php echo $detail['id_product']?>)">Add to cart</button>
                        </div>
                    </div>
                    <div class="description">
                        <h1>Description:</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente quis ex nemo blanditiis, cumque minima nisi, officiis quasi fugiat enim illo ad amet consectetur suscipit ducimus consequuntur esse incidunt? Incidunt!</p>
                    </div>
                    <div class="nutrition">
                        <div class="nutritional-value">
                            <p>Nutritional value</p>
                        </div>

                        <div class="vitamins">
                            <p>Vitamins</p>
                        </div>

                        <div class="mineral">
                            <p>Minerals</p>
                        </div>
                    </div>

                </div>
                <!--right-->
            <?php endforeach; ?>
        </div>
        <!--product-card-->
        <div class="people-also-like">
            <p class="people-also-like-title">People also like</p>
            <div class="box-container">
                <?php foreach ($rows as $row) : ?>
                    <div class="box_1">

                        <div class="box">
                            <img src="../admin/upload/<?php echo $row['Image'] ?>" alt="">
                            <div class="icon-star">
                                <i class="fi fi-sr-star"></i>
                                <p>5/5</p>
                            </div>
                            <h3 class="product">
                                <a style="text-decoration:none; color:#000;" href="index.php?page=product-card&id=<?php echo $row['id_product'] ?>">
                                    <?php echo $row['Product'] ?>
                                </a>
                            </h3>
                            <div class="click">
                                <div class="btn">
                                    <!-- <a href="index.php?page=order&id=<?php echo $row['id_product'] ?>"> -->
                                    <button style="cursor:pointer;" type="button" class="button add-cart add_to_cart" onclick="add_cart(<?php echo $row['id_product']?>)">Add <i class="fi fi-br-add"></i></button>
                                    <!-- </a> -->
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

        </div>
    </div>
    <!--container-->


    <script>
        function plus() {
            num = parseInt($("#num").val()); // láy giá trị ô input
            // alert(num);
            tem = num + 1;
            $("#num").val(tem); //gán lại giá trị 
        }

        function minus() {
            num = parseInt($("#num").val()); // láy giá trị ô input
            // alert(num);
            if(num>1){
            tem = num - 1;
        }
            $("#num").val(tem); //gán lại giá trị 
        }
    </script>

</body>

</html>