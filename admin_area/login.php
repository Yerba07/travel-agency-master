<?php
session_start();
include("includes/db.php");
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);

    $sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);

    if ($check_user == 1) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('index.php?logged_in=Вы успешно вошли в АДМИН-ПАНЕЛЬ!','_self')</script>";
    } else {
        echo "<script>alert('Адрес электронной почты или пароль не совпадают, попробуйте еще раз!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма входа в систему</title>
    <link rel="stylesheet" type="text/css" href="styles/login_style.css" media="all">
</head>
<body>
    <div class="login">
        <h2 style="color: white; text-align: center;"><?php echo @$_GET['not_admin']; ?></h2>
        <h2 style="color: white; text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>

        <h1>Логин администратора</h1>
        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Электронная почта" required="required"/>
            <input type="password" name="password" placeholder="Пароль" required="required"/>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Логин</button>
        </form>
    </div>
</body>
</html>
