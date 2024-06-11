<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Просмотр категорий</title>
        <style type="text/css">
            #thfix {
                font-family: sans-serif;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <table width="795" align="center" bgcolor="#EAD2AC">
            <tr align="center">
                <td colspan="6"><h2 style="font-family: Cambria; margin-top: 10px; margin-bottom: 5px;">Посмотреть все категории можно здесь</h2></td>
            </tr>
            <tr align="center" bgcolor="#5FCEE8">
                <th id="thfix">ID категории</th>
                <th id="thfix">Название категории</th>
                <th id="thfix">Редактировать</th>
                <th id="thfix">Удалить</th>
            </tr>
            <?php
            include("includes/db.php");
            $get_cat = "select * from categories";
            $run_cat = mysqli_query($con, $get_cat);

            $i = 0;

            while ($row_cat = mysqli_fetch_array($run_cat)) {
                $cat_id = $row_cat['cat_id'];
                $cat_title = $row_cat['cat_title'];
                $i++;
                ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Редактировать</a></td>
                    <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Удалить</a></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    </html>

    <?php
}
?>