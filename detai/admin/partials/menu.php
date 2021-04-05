<?php 
    include('../config/constants.php'); 
    include('login-check.php');
?>
<html>
    <head>
        <title>Food Order website - Trang chủ</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href='index.php'>Trang chủ</a></li>
                    <li><a href='manage-admin.php'>Admin</a></li>
                    <li><a href='manage-category.php'>Món Khác</a></li>
                    <li><a href='manage-food.php'>Thực Phẩm</a></li>
                    <li><a href='manage-order.php'>Đặt Hàng</a></li>
                    <li><a href='logout.php'>Thoát</a></li>
                </ul>
            </div>     
        </div>
        <!-- Main Section Ends --> 