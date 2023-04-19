<?php
include_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/detail-shopping-cart.css">

</head>
<body>
    <div class="container">
        <div class="shopping-cart-detail">
            <h1 class="shopping-cart-detail-title">Shopping Cart</h1>
            <?php if (isset($_SESSION['box']) && !empty($_SESSION['box'])) { ?>
                <div class="cart-area">
                    <div class="box-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo "<pre>";
                                // print_r($_SESSION['box']);
                                // echo "</pre>";
                                $_SESSION['sum_price'] = 0;
                                $_SESSION['total_qty'] = 0;
                                foreach ($_SESSION['box'] as $key => $value) {
                                    $item_price = $value["qty"] * $value["price"];
                                    $_SESSION['sum_price'] += $item_price;
                                ?>
                                    <tr>
                                        <td>
                                            <div class="product">
                                                <img src="../admin/upload/<?php echo $value['Image'] ?>" alt="">
                                                <p class="product-name"><?php echo $value['Product']?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo '$'.$value['price']?></p>
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <span class="minus">-</span>
                                                <span class="num"><?php echo $value['qty'].'kg'?></span>
                                                <span class="plus">+</span>
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo $item_price?></p>
                                        </td>
                                        <td>
                                            <!--icon thung` rac'-->
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="2" align="right"></td>
                                    <td align="right"><?php echo $_SESSION['total_qty'] ?></td>
                                    <td align="right" colspan="2"><strong></strong></td>
                                    <td><?php echo 'Total: $ ' . $_SESSION['sum_price'] ?></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <!--box-container-->

                </div>
                <!--cart-area-->
                <button>Checkout</button>
        </div>
        <!--shopping-cart-detail-->
    </div>
    <!--container-->


<?php } else {
                echo '<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>';
                echo '<div class="no-records">Your Cart is Empty</div>;';
            }
?>
?>

<script src="./assets/js/detail-shopping-cart.js"></script>
</body>

</html>