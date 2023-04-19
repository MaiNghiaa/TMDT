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
    
    $id = (int) $_POST["id"];
    $Number = $_POST["number"];
    $result = mysqli_query($conn, "SELECT * FROM san_pham WHERE id_product=$id");
    $rows = mysqli_fetch_row($result);
    if (!isset($_SESSION["box"])) {
        $cart[$id] = array(
            'id_product' => $rows[0],
            'Product' => $rows[1],
            'price' => $rows[3],
            'Image' => $rows[4],
            'id_product_type' => $rows[6],
            'number' => $Number
        );
    } else {
        $cart = $_SESSION["box"];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                'id_product' => $rows[0],
                'Product' => $rows[1],
                'price' => $rows[3],
                'Image' => $rows[4],
                'id_product_type' => $rows[6],
                'number' => (int) $cart[$id]["number"] + $Number
            );
        } else {
            $cart[$id] = array( 
                'id_product' => $rows[0],
                'Product' => $rows[1],
                'price' => $rows[3],
                'Image' => $rows[4],
                'id_product_type' => $rows[6],
                'number' => $Number
            );
        }
    }
    $_SESSION["box"] = $cart;
    // echo "<pre>";
    // print_r($cart);
    $number_cart = 0;
    $total = 0;
    foreach($cart as $values){
        $number_cart += (int) $values["number"];
        $total += (int)$values["number"]*(int)$values["price"];
        $Product = $values["Product"];
        $price = $values["price"];
        $Image = $values["Image"];
    }
    echo $number_cart."-".$total."-".$Product."-".$price."-".$Image;

}
// if (isset($_POST["id"]) && !isset($_POST["number"])) {

// }


// lay san pham id ve

// if(isset($_GET['id'])){
//     $id = (int) $_GET['id'];
//     $rows = get_information_item($id); 
//     echo "<pre>";
// print_r($row);
// echo "</pre>";
    // lay san pham cua khach hang muon mua
    // if(!isset($_SESSION['box']))

    // trường hợp không có sp thì mình sẽ thêm vào và ngược lại mình sẽ thêm 1 biết quantity vào trong mảng 
// if(!isset($_SESSION['box']) || empty($_SESSION['box'])){
//         $_SESSION['box'][$id] = $row;
//         $_SESSION['box'][$id]['qty'] = 1;
// }
// // trường hợp tăng thêm 1 nếu mua trùng 1 spham 
// else{
//     if(array_key_exists($id, $_SESSION['box'])){
//         $_SESSION['box'][$id]['qty'] += 1;
//     }else{
//         $_SESSION['box'][$id] = $row;
//         $_SESSION['box'][$id]['qty'] = 1;
//     }
// }
//     $_SESSION['noti_cart'] = 1;
//     echo "<pre>";
// print_r($_SESSION['box']);
// echo "</pre>";
// }
//     header("location:index.php");
