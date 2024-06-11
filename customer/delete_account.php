<h2 style="text-align: center; margin-top: 20px; color: red;">Вы действительно хотите удалить свою учетную запись?</h2><br>

<form action="" method="post">
    <input type="submit" name="yes" value="Да, я хочу">
    <input type="submit" name="no" value="Нет, я передумал">
</form>

<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
    $delete_customer = "delete from customers where customer_email='$user'";
    $run_customer = mysqli_query($con, $delete_customer);

    echo "<script>alert('ВАША УЧЕТНАЯ ЗАПИСЬ БЫЛА УДАЛЕНА!')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}

if (isset($_POST['no'])) {
    echo "<script>alert('Больше так не шути!')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
}
?>