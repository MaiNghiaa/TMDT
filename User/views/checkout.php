<?php if (isset($_SESSION['box'])) {
    $delivery = 0; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/checkout.css">
        <title>Document</title>
    </head>

    <body>
        <section class="checkout" id="checkout">

            <div class="container">
                <?php if (isset($_POST['checkout'])) {
                    //     $data = $_POST;
                    $dateTime = date("Y-m-d H:i:s");
                    //     $data["status"] = 1;
                    //     
                    //     $data["payment"] = $_POST["payments"][0];
                    // $data["date_create"] = $dateTime;
                    // echo "<pre>";
                    // print_r($data);
                    $userid = isset($_SESSION["submit_login"]) ? $_SESSION["submit_login"] : 0;
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $country = $_POST['country'];
                    $city = $_POST['city'];
                    $street = $_POST['street'];
                    $status = 1;
                    $date = $dateTime;
                    $POSTCODE = $_POST['postcode'];
                    $id_payment = $_POST["payments"][0];

                    $sqlInsertOrder = "INSERT INTO `hóa đơn` (`id_bill`, `Id_khach_hang`, `id_payment`, `date`, `status`, `first_name`, `last_name`, `phone`, `Email`, `Country/region`, `Town/City`, `Street`, `POSTCODE`) 
        VALUES (NULL, '$userid', '$id_payment', '$date', '$status', '$fname', '$lname', '$phone', '$email', '$country', '$city', '$street', '$POSTCODE');";
                    // echo $sqlInsertOrder;
                    mysqli_query($conn, $sqlInsertOrder) or die('lỗi câu lệnh thêm mới');
                    // mỗi lần insert xong lấy ra id luôn
                    $last_id = mysqli_insert_id($conn);
                    if (isset($_SESSION['box'])) {
                        foreach ($_SESSION['box'] as $key => $value) {
                            $price = $value["price"] * $value["number"];
                            $qty = $value["number"];
                            $sqlInsertOrderDetail = "INSERT INTO `hóa đơn chi tiết` (`id_bill`, `id_product`, `quantity`, `price`, `status`, `date_create`)
                 VALUES ('$last_id', '$key', '$qty', '$price', '1', '$date');";
                            mysqli_query($conn, $sqlInsertOrderDetail) or die('lỗi câu lệnh thêm mới');
                
                        }
                        
                    }
        unset($_SESSION['box']);
                    
                    echo "<script> 
                            alert('Cảm ơn bạn đã đặt hàng');
                            document.location.href = 'index.php';
                        </script>";
                }
                ?>
                <form method="post">
                    <div class="checkout-box">
                        <p class="address">Homepage / Checkout</p>
                        <h1 class="checkout-title">Checkout</h1>

                        <div class="personal-information">
                            <h2 class="personal-information-title">Personal information:</h2>
                            <div class="row">
                                <div class="input-box">
                                    <label for="fname">First name</label>
                                    <input type="text" name="fname" id="fname">
                                </div>
                                <div class="input-box">
                                    <label for="lname">Last name</label>
                                    <input type="text" name="lname" id="lname">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-box">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone">
                                </div>
                                <div class="input-box">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="delivery-details">
                            <h2 class="delivery-details-title">Delivery details:</h2>
                            <div class="row">
                                <div class="input-box">
                                    <label for="country">Country / Region</label>
                                    <input type="text" name="country" id="country">
                                </div>
                                <div class="input-box">
                                    <label for="city">Town / City</label>
                                    <input type="text" name="city" id="city">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-box">
                                    <label for="street">Street</label>
                                    <input type="text" name="street" id="street">
                                </div>
                                <div class="input-box">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" name="postcode" id="postcode">
                                </div>
                            </div>
                        </div>

                        <div class="payment">
                            <h2 class="payment-title">Payment:</h2>
                            <?php $sqlPayment = "SELECT * FROM `payment_methods`";
                            $resultPayment = mysqli_query($conn, $sqlPayment) or die("lỗi truy cập dữ liệu");
                            if (mysqli_num_rows($resultPayment) > 0) {
                                while ($rowPayment = mysqli_fetch_assoc($resultPayment)) {

                            ?>
                                    <div class="payment-details">
                                        <label><input type="radio" name="payments[]" id="payments[]" value="<?php echo $rowPayment['id'] ?>"><?php echo $rowPayment["Payment_methods"] ?></label>
                                    </div>
                            <?php }
                            } ?>
                        </div>

                    </div>

                    <div class="your-order">

                        <h2 class="your-oder-title">Your order:</h2>
                        <div class="bill">
                            <div class="subtotal">
                                <p>Subtotal:</p>
                                <p>$<?php echo $_SESSION['sum_price'] ?></p>
                            </div>
                            <div class="delivery">
                                <p>Delivery:</p>
                                <p>$<?php echo $delivery ?></p>
                            </div>
                            <div class="total">
                                <p>Total:</p>
                                <p>$<?php echo ($delivery + $_SESSION['sum_price']) ?></p>
                            </div>
                            <button type="submit" name="checkout">Purchase</button>
                        </div>
                        <div class="list">
                            <?php

                            $item_price = 0;
                            $_SESSION['sum_price'] = 0;
                            $_SESSION['total_qty'] = 0;
                            foreach ($_SESSION['box'] as $key => $value) {
                                $item_price = $value["number"] * $value["price"];
                                $_SESSION['sum_price'] += $item_price;

                            ?>
                                <div class="last_quantity">
                                    <p><?php echo $value["number"] ?>x</p>
                                </div>
                                <div class="list-box">
                                    <img src="../admin/upload/<?php echo $value['Image'] ?>" alt="">
                                    <div class=" pp">
                                        <div class="product">
                                            <p class="product-title"><?php echo $value['Product'] ?></p>
                                        </div>
                                        <p class="price"><?php echo '$ ' . $value['price'] ?></p>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
            </div>


            </form>

            </div>

        </section>
    <?php } ?>
    </body>

    </html>