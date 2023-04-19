<?php 
// Lấy sản phẩm new addition
function get_new_addition(){
    global $conn;
    $sql = "SELECT * FROM san_pham_moi ORDER BY id_product DESC";
    $query = mysqli_query($conn, $sql);
    $result = array();

    while($row = mysqli_fetch_assoc($query)){
        $result[] = $row;
    }
    return $result;
}

function get_addition(){
    global $conn;
    $sql = "SELECT * FROM san_pham ORDER BY id_product DESC";
    $query = mysqli_query($conn, $sql);
    $result = array();

    while($row = mysqli_fetch_assoc($query)){
        $result[] = $row;
    }
    return $result;
}

function get_information_item($id){
    global $conn;
    $sql = "SELECT * FROM san_pham WHERE id_product=$id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
}

?>