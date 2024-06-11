<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тур Агентство : Главная</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style>
        .adminbtn {
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 1px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; 
            transition-duration: 0.4s;
            float: right;
            margin-top: 12px;
            margin-left: 2px;
        }

        .adminbtn:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body>
    <div class="main_wrapper">
        <?php include 'includes/header.php'; ?>
        <?php include 'includes/navbar.php'; ?>
        <div class="content_wrapper">
            <?php include "includes/left-sidebar.php"; ?>
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Добро пожаловать: </b>" . $_SESSION['customer_email'] . "<b style='color: yellow;'> Ваш</b>";
                        } else {
                            echo "<b>Добро пожаловать, Гость:</b>";
                        }
                        ?>
                        <b style="color: yellow;">Корзина-</b> Всего товаров: <?php total_items(); ?>
                        Общая стоимость: <?php total_price(); ?> <a href="cart.php" style="color: yellow;">Перейти в корзину</a>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php' style='color: orange;'>Вход для пользователей</a>";
                        } else {
                            echo "<a href='logout.php' style='color: orange;'>Выход</a>";
                        }
                        ?>
                        <button class="adminbtn"><a style="text-decoration: none; color: #ffffff;"
                                                    href="admin_area/index.php">Вход для администраторов</a></button>
                    </span>
                </div>
                <div id="packages_box">
                    <?php getPack(); ?>
                    <?php getCatPack(); ?>
                    <?php getTypePack(); ?>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php";?>
    </div>
</body>
</html>
