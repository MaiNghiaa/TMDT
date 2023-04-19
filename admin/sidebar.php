<?php
@include 'connect.php';
?>


<div class="sidebar-header">
    <div>
        <h4 class="logo-text">Helu</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
    </div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Application</div>
        </a>
        <ul>
            <li> <a href="contact-list.php"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
            </li>
            <li> <a href="to-do.php"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
            </li>
            <li> <a href="fullcalender.php"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">UI Elements</li>
    <li>
        <a href="widgets.php">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Widgets</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">eCommerce

            </div>
        </a>
        <ul>
            <li> <a href="Customer_user.php"><i class="bx bx-right-arrow-alt"></i>Khách hàng</a>
            </li>
            <li> <a href="products.php"><i class="bx bx-right-arrow-alt"></i>Sản Phẩm</a>
            </li>
            <li> <a href="New_product.php"><i class="bx bx-right-arrow-alt"></i>Sản Phẩm Mới</a>
            </li>
            <li> <a href="orders.php"><i class="bx bx-right-arrow-alt"></i>Hóa đơn</a>
            </li>
            <li> <a href="thanh_toan.php"><i class="bx bx-right-arrow-alt"></i>Phương thức thanh toán </a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Pages</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-lock"></i>
            </div>
            <div class="menu-title">Authentication</div>
        </a>
        <ul>
            <li> <a href="authentication-lock-screen.php" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="profile.php">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title"><?php
                                        if (isset($_SESSION["loged"])) {
                                        echo $_SESSION["username"];
                                    } else {
                                    }
                                      ?>
            </div>
        </a>
    </li>
    <li class="menu-label">Others</li>
    <li>
        <a href="Support.php" target="_blank">
            <div class="parent-icon"><i class="bx bx-support"></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
</ul>
<?php

?>