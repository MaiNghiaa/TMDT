<?php 
ob_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'website tmđt';

// Mở kết nối
$conn = mysqli_connect($server, $username, $password, $database);
if($conn){mysqli_set_charset($conn, "utf8");}else{
    echo "can't connect database";
}
if (isset($_POST["id"]) && isset($_POST["number"])) {
    // echo $_POST["id"] . " && " . $_POST["number"];
    $Number = $_POST["number"];
    $id = $_POST["id"];
    $cart = $_SESSION["box"];
    if (array_key_exists($id, $cart)) {
        if ($Number) {
            $cart[$id] = array(
                'id_product' => $cart[$id]['id_product'],
                'Product' => $cart[$id]['Product'],
                'price' => $cart[$id]['price'],
                'Image' => $cart[$id]['Image'],
                'id_product_type' => $cart[$id]['id_product_type'],
                'number' => $Number
            );
        }else{
            unset($cart[$id]);
        }
    // }else{
    //         unset($cart[$id]);
    // }
        $_SESSION["box"] = $cart;
    }
}
?>