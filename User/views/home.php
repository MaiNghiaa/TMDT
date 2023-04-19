<?php
$get_new_addition = get_new_addition();
// check du lieu trong $get_new_addition
// echo "<pre>";
// print_r($get_new_addition);
// echo "</pre>";

?>

<section class="dishes" id="dishes">
    <div class="dishes-header">
        <div class="title">
            <img src="assets/Public/Picture/newaddition.png" alt="">
            <h1 class="new-additions">New additions</h1>
        </div>
        <a href="index.php?page=listing">Listing <i class="ti-angle-right"></i></a>
    </div>
    <div class="box-container">
        <?php foreach ($get_new_addition as $keyHot => $valueHot) : ?>
            <div class="box_1">

                <div class="box">
                    <img src="../admin/upload/<?php echo $valueHot['Image'] ?>" alt="">
                    <div class="icon-star">
                        <i class="fi fi-sr-star" style="padding-right:5px;"></i>
                        <p>5/5</p>
                    </div>
                    <h3 class="product">
                        <a style="text-decoration:none; color:#000;" href="index.php?page=product-card&id=<?php echo $valueHot['id_product'] ?>&action='add'">
                            <?php echo $valueHot['Product']; ?>
                        </a>
                    </h3>
                    <div class="click">
                        <div class="btn">
                            <!-- <a href="index.php?page=order&id=<?php //echo $valueHot['id_product'] ?>"> -->
                                <button type="button" class="button add-cart" onclick="add_cart(<?php echo $valueHot['id_product']?>)">Add <i class="fi fi-br-add"></i></button>
                            <!-- </a> -->
                        </div>
                        <div class="p-w">
                            <span class="price">$ <?php echo $valueHot['price'] ?></span>
                            <span class="weight">/ 500g</span>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>