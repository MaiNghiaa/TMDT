<?php
@include 'connect.php';
// $number = 0;
// if (isset($_SESSION['box']) && !empty($_SESSION['box'])) {

//     foreach ($_SESSION['box'] as $key => $value) {
//         $number += (int) $value['qty'];
//     }
// }else{
//     $number = 0;
// }
?>
<link rel="stylesheet" href="assets/Css/Header.css">
<link rel="stylesheet" href="assets/Public/Icon_Font/themify-icons-font/themify-icons/themify-icons.css">
<link rel="stylesheet" href="assets/Public/Icon_Font/uicons-solid-rounded/css/uicons-solid-rounded.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<div id="header">
    <div class="col-2 c_1">
        <div class="logo">
            <a href="index.php">
                <p class="line1">Nuts House</p>
                <p class="line2">Since 1998</p>
            </a>
        </div>
        <div class="search">
            <div class="form-outline">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            </div>
            <button type="button" class="btn btn-primary">
                <i class="ti-search"></i>
            </button>
        </div>
        <div class="nav">
            <a href="">
                <div class="icon"><i class="fi fi-rr-grid"></i></div>
                <div class="text">Category</div>
            </a>
        </div>
    </div>

    <ul class="col-2 mgr_2 dropdown_user">
        <li class="bonus">
            <div class="icon"><i class="ti-crown" style="color:orange"></i></div>
            <div class="text">Bonus: <span class="percent"> 0%</span></div>
        </li>

        <li class="user">
            <div class="User dropdown" onclick="menutoggle();">
                <?php
                echo '<div class="icon"><i class="fi fi-sr-following"></i></div>';
                echo '<div class="text">';
                if (isset($_SESSION["loged"])) {
                    echo $_SESSION["username"];
                    echo '</div>';
                } else {
                    echo "<a href='Login.php'  style='color:#000; text-decoration:none;'>Login</a>";
                }

                ?>
            </div>
            <?php
            if (isset($_SESSION["loged"])) {
                echo '<ul id="js_subnav" class="subnav">';
                echo '<li><a href="profile_user.php?sid=">Profile</a></li>';
                echo '<li><a href="logout.php?sid=">Logout</a></li>';
                echo '</ul>';
                echo '</li>';
            }
        ?>


        <li class="Cart" onclick="carttoggle()">
            <div class="btn btn-cart btn-cart-check action">
                <div class="icon"><i class="fi fi-rr-shopping-bag"></i></div>
                <?php 
                $number_cart =0;
                $total = 0;
                if(isset($_SESSION["box"])){
                    $cart = $_SESSION["box"];
                    foreach($cart as $value){
                        $number_cart += (int) $value["number"];
                        $total += (int)$value["number"]*(int)$value["price"];
                        $Product = $value["Product"];
                        $price = $value["price"];
                        $Image = $value["Image"];
                    }
                }?>
                <a style="text-decoration:none; color:#000;" href="index.php?page=order_detail">
                <div class="text">Cart: <span class="Number" id="Number"><?php echo $number_cart?></span></div></a>
            </div>
            
        </li>


    </ul>

</div>
<div class="clear"></div>
<script>
    // đóng mở user 
    function menutoggle() {
        const toggleMenu = document.querySelector('.subnav');
        toggleMenu.classList.toggle('active');
    }
    // đóng mở cart
    function carttoggle() {
        const toggleCart = document.querySelector('.shopping-cart');
        toggleCart.classList.toggle('hide');
    }
    // tăng giảm số lượng 
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }
</script>
</body>

</html>