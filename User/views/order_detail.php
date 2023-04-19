<?php
include_once 'connect.php';
$number_cart = 0;
$total = 0;
if (isset($_SESSION["box"])) {
  $cart = $_SESSION["box"];
  foreach ($cart as $value) {
    $number_cart += (int) $value["number"];
    $total += (int)$value["number"] * (int)$value["price"];
    $Product = $value["Product"];
    $price = $value["price"];
    $Image = $value["Image"];
  }
}
?>

<html>

<head>
  <link href="./assets/Css/view_cart.css" type="text/css" rel="stylesheet" />
</head>

<body>



  <!-- Cart ---->
  <?php if (isset($_SESSION['box']) && !empty($_SESSION['box'])) { ?>
    <div id="shopping-cart">
      <div class="txt-heading">Shopping Cart</div>

      <table class="tbl-cart" cellpadding="5" cellspacing="1" id="listCart">
        <tbody id="cartx">
          <tr class="head">
            <th width="40%">Image</th>
            <th width="20%">Name</th>
            <th width="10%" align="center">Type</th>
            <th width="5%" align="center">Price</th>
            <th width="15%" align="center">Quantity</th>
            <th width="7%" align="center">Total</th>
            <th style="text-align:center;" width="3%">Remove</th>
          </tr>
          <?php
          echo "<pre>";
          print_r($_SESSION['box']);
          echo "</pre>";
          $item_price = 0;
          $_SESSION['sum_price'] = 0;
          $_SESSION['total_qty'] = 0;
          foreach ($_SESSION['box'] as $key => $value) {
            $item_price = $value["number"] * $value["price"];
            $_SESSION['sum_price'] += $item_price;
          ?>
            <tr>
              <td><img src="../admin/upload/<?php echo $value['Image'] ?>" alt="" style="width: 40%; height: 40%;"></td>
              <td><b><?php echo $value['Product'] ?></b></td>
              <td align="center">
                <div class="total-type">
                  <?php
                  // đặt id của sp bằng 1 biến
                  $cat_id = $value['id_product_type'];
                  $sql = "SELECT * FROM `danh mục` WHERE id_product_type=$cat_id"; //tìm sản phẩm theo id
                  $resultCat = mysqli_query($conn, $sql);
                  $rowCat = mysqli_fetch_row($resultCat);
                  echo $rowCat[1];
                  ?>
                </div>
              </td>
              <td>
                <div class="total-price"><?php echo '$ ' . $value['price'] ?></div>
              </td>

              <td align="center">
                <div class="quantity">
                  <!-- <span onclick="minus()"><button class="minus" type="button" data-type="minus">
                      <i class="fi fi-rr-minus-small"></i>
                    </button></span> -->
                  <input type="number" name="num_<?php echo $key ?>" id="num_<?php echo $key ?>" value="<?php echo $value["number"] ?>" onchange="upadatecart(<?php echo $key ?>);">
                  <!-- <span onclick="plus()"><button class="plus" type="button" data-type="plus">
                      <i class="fi fi-rr-plus-small"></i>
                    </button></span> -->
                </div>
              </td>
              <td>
                <div class="total-price"><?php echo '$ ' . $item_price ?></div>
              </td>
              <td style="text-align:center;">
                <a onclick="return confirm'ban muốn xóa sản phẩm này không ?'" href="index.php?page=delete_order_detail&id=<?php echo $value['id_product'] ?>"><img src="./assets/Public/Picture/icon-delete.png" alt="Remove Item" /></a>
              </td>
            </tr>
          <?php
          }
          ?>
          
          <tr>
            <td align="left" colspan="1"><a href="index.php?page=listing"><button class="last_change"><strong>tiếp tục mua hàng</strong></button></button></a> </td>
            <td align="center"><button class="last_change" onclick="change_shoppingcart()"><strong>Cập nhật giỏ hàng</strong></button></a></td>
            <td align="right" colspan="5"><a href="index.php?page=checkout"><button class="last_change"><strong>Checkout</strong></button></a></td>
          </tr>
        </tbody>
      </table>
    <?php } else {
    echo '<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>';
    echo '<div class="no-records">Your Cart is Empty</div>;';
  }
    ?>

    </div>

    <script>
      // function plus() {
      //   num = parseInt($("#num").val()); // láy giá trị ô input
      //   // alert(num);
      //   tem = num + 1;
      //   $("#num").val(tem); //gán lại giá trị 
      // }

      // function minus() {
      //   num = parseInt($("#num").val()); // láy giá trị ô input
      //   // alert(num);
      //   if (num > 1) {
      //     tem = num - 1;
      //   }
      //   $("#num").val(tem); //gán lại giá trị 
      // }
    </script>


</body>


</html>