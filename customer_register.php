<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
global $con;
if (isset($_POST['register'])) {
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_passport = $_POST['c_passport'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    // image will upload there
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,c_passport,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass','$c_passport','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart == 0) {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    } else {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Региситрация</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style type="text/css">
        #fixm {
            font-size: 15px;
            padding: 4px;
            font-family: arial;
        }

        #fixi {
            font-size: 14px;
            font-family: arial;
        }

        #btn {
            font-family: arial;
            font-size: 14px;
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: #32E875;
            color: black;
        }

        #btn:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <?php include 'includes/header.php'; ?>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <!--left-sidebar starts-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--left-sidebar ends-->
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                        <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Гость! <b
                                    style="color: yellow;">Корзина-</b> Общее количество товаров: <?php total_items(); ?> Итоговая цена: <?php total_price(); ?> <a
                                    href="cart.php" style="color: yellow;">Перейти к корзине</a></b></span>
                </div>
                <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <table align="center" width="750" style="margin-top: 20px;">
                        <tr align="center">
                            <td colspan="6">
                                <h2 style="margin-bottom: 15px; font-family: Cambria;">Создать учетную запись</h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваше имя:</td>
                            <td><input id="fixi" type="text" name="c_name" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш адрес электронной почты:</td>
                            <td><input type="email" name="c_email" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш пароль:</td>
                            <td><input id="fixi" type="password" name="c_pass" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш паспорт, ID:</td>
                            <td><input type="text" name="c_passport" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш имидж:</td>
                            <td><input id="fixi" type="file" name="c_image" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваша страна:</td>
                            <td>
                                <select name="c_country" required="">Выберите
                                    <option>Казахстан</option>
                                    <option>Бангладеш</option>
                                    <option>Япония</option>
                                    <option>Китай</option>
                                    <option>Россия</option>
                                    <option>Португалия</option>
                                    <option>Англия</option>
                                    <option>Бразилия</option>
                                    <option>Испания</option>
                                    <option>Франция</option>
                                    <option>Швейцария</option>
                                    <option>Хорватия</option>
                                    <option>Аргентина</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш город:</td>
                            <td><input id="fixi" type="text" name="c_city" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш контактный телефон:</td>
                            <td><input id="fixi" type="text" name="c_contact" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ваш адрес:</td>
                            <td><input id="fixi" type="text" name="c_address" required=""></td>
                        </tr>
                        <tr align="center">
                            <td colspan="6"><input id="btn" type="submit" name="register" value="Cоздать аккаунт">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--Content ends here-->
        <!--footer starts-->
        <?php include "includes/footer.php"; ?>
        <!--footer ends-->
    </div>
    <!--Main container ends here-->
</body>
</html>
