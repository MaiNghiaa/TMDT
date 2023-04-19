<?php
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $row = get_information_item($id);
    unset($_SESSION['box'][$id]);
    echo "<script> alert('Successfully Added');
    document.location.href = 'index.php?page=order_detail';
    </script>";
}
    ?>