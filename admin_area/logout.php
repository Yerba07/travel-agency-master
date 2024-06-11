<?php
session_start();
session_destroy();
echo "<script>window.open('login.php?logged_out=Вы не вошли в систему!','_self')</script>";
?>