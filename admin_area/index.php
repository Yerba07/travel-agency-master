<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=Вы не являетесь администратором!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Админ Панель</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
    </head>
    <body>
        <div class="main_wrapper">
            <div id="header">

            </div>
            <div id="right">
                <h2 style="text-align: center; margin-top: 10px; font-family: Cambria;">Управление контентом</h2>
                <ul>
                    <li><a href="index.php">Панель администратора: Главная страница</a></li>
                    <li><a href="index.php?insert_package">Вставить новый пакет</a></li>
                    <li><a href="index.php?view_packages">Просмотреть все пакеты</a></li>
                    <li><a href="index.php?insert_cat">Вставлять новые категории</a></li>
                    <li><a href="index.php?view_cats">Просмотреть новые категории</a></li>
                    <li><a href="index.php?insert_type">Вставлять новые типы</a></li>
                    <li><a href="index.php?view_types">Просмотреть все типы</a></li>
                    <li><a href="index.php?insert_employee">Вставить нового сотрудника</a></li>
                    <li><a href="index.php?view_employees">Просмотреть всех сотрудников</a></li>
                    <li><a href="index.php?view_customers">Просмотреть всех клиентов</a></li>
                    <li><a href="index.php?view_orders">Просмотр заказов</a></li>
                    <li><a href="index.php?view_payments">Просмотр платежей</a></li>
                    <li><a href="logout.php">Выход</a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div id="left">
                <h2 style="color: red; text-align: center; font-family: Cambria; margin-top: 15px;"><?php echo @$_GET['logged_in']; ?></h2>
                <?php
                if (isset($_GET['insert_package'])) {
                    include("insert_package.php");
                }
                if (isset($_GET['view_packages'])) {
                    include("view_packages.php");
                }
                if (isset($_GET['edit_pack'])) {
                    include("edit_pack.php");
                }
                if (isset($_GET['insert_cat'])) {
                    include("insert_cat.php");
                }
                if (isset($_GET['view_cats'])) {
                    include("view_cats.php");
                }
                if (isset($_GET['edit_cat'])) {
                    include("edit_cat.php");
                }
                if (isset($_GET['insert_type'])) {
                    include("insert_type.php");
                }
                if (isset($_GET['view_types'])) {
                    include("view_types.php");
                }
                if (isset($_GET['edit_type'])) {
                    include("edit_type.php");
                }
                if (isset($_GET['view_customers'])) {
                    include("view_customers.php");
                }
                if (isset($_GET['insert_employee'])) {
                    include("insert_employee.php");
                }
                if (isset($_GET['view_employees'])) {
                    include("view_employees.php");
                }
                if (isset($_GET['edit_emp'])) {
                    include("edit_emp.php");
                }
                ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>
