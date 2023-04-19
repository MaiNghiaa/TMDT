<?php
session_start();
ob_start();
// session_destroy();
include_once 'connect.php';
include_once 'Function/Function.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Css/homepage.css">
    <link rel="stylesheet" href="assets/Css/alert.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/Public/Icon_Font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/Public/Icon_Font/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="shortcut icon" href="assets/Public/Picture/Logo.png" type="image/x-icon">
    <title>Organic & Food</title>

</head>

<body>

    <!--header-->
    <?php include_once 'layout/header.php'; ?>
    <!-- end header -->

    <!-- section slider -->

    <?php
    if ($page == 'home') {
        include_once 'layout/slider.php';
    }
    ?>
    <!-- end section slider -->

    <!--section home-->

    <?php


    if (file_exists('views/' . $page . '.php')) {
        include_once 'views/' . $page . '.php';
    }

    ?>
    <!-- end section home -->


    <!--section dishes-->
    <?php
    if ($page == 'home') {
        include_once 'layout/dishes.php';
        // <!-- end section dishes -->

        // <!--section cook-->
        include_once 'layout/cook.php';
    } ?>
    <!-- end section cook -->

    <!--Footer-->
    <?php require_once 'layout/Footer.php'; ?>
    <!-- end Footer -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="assets/js/homepage.js"></script>
    <script>
        function add_cart(id) {
            // alert(id);
            $.post("views/order.php",{'id':id}, function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            item = data.split("-");
            $("#Number").text(item[0]);
            });
        };
        // xóa sản phẩm
        function delete_shopping_cart(id){
            $.post("views/delete_order_detail.php",{'id':id}, function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            alert(data);
            }); 
        };
        function addprocart(id){
            num = parseInt($("#num").val())
            $.post("views/add_product.php",{'id':id,'number':num}, function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            // if(isset($_P))
            item = data.split("-");
            $("#Number").text(item[0]);
            }); 
        }
        function upadatecart(id){
            num =$("#num_"+id).val();
            // alert(num);
            $.post("views/update_cart.php",{'id':id, 'number':num}, function(data, status){
            // alert("Data: " + data + "\nStatus: " + status);
            // item = data.split("-");
            // $("#Number").text(item[0]);
            // after update cart
            $("#listCart").load("http://localhost:8080/TMĐT/User/index.php?page=order_detail #cartx");
            });
            
        }

    </script>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
</body>

</html>