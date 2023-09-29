<?php
global $connect;
require_once '../config/connect.php';
    $goods = mysqli_query($connect, "SELECT * FROM `goods`");
    $goods = mysqli_fetch_all($goods);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Products</title>
</head>
<body>
<div class="container">

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>&#9672;</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php
            foreach ($goods as $good) {
                ?>
                <tr>
                    <td><?=$good[0]?></td>
                    <td><?=$good[1]?></td>
                    <td><?=$good[2]?></td>
                    <td><?=$good[3]?></td>
                    <td><a href="product.php?id=<?=$good[0]?>" style="text-decoration: none; color: black">View</a></td>
                    <td><a href="update.php?id=<?=$good[0]?>" style="text-decoration: none; color: black">Update</a></td>
                    <td><a href="vendor/delete.php?id=<?=$good[0]?>" style="text-decoration: none; color: red">Delete</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <h2>Add new product</h2>
    <form action="create.php" method="post">
        <p>Title</p>
        <input type="text" name="title">
        <p>Description</p>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <p>Price</p>
        <input type="number" name="price">
        <button class="button" type="submit">To add</button>
    </form>
</div>
</body>
</html>
