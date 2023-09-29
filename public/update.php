<?php
    global $connect;
    require_once '../config/connect.php';
    $goods_id = $_GET['id'];
    $good = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id`='$goods_id'");
    $good = mysqli_fetch_assoc($good);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <div class="container">
        <h2>Update product</h2>
        <form action="vendor/update.php" method="post">
            <input type="hidden" name="id" value="<?= $goods_id?>" >
            <p>Title</p>
            <input type="text" name="title" value="<?= $good['title']?>">
            <p>Description</p>
            <textarea name="description" id="" cols="30" rows="10"><?= $good['description']?></textarea>
            <p>Price</p>
            <input type="number" name="price" value="<?= $good['price']?>">
            <button class="button" type="submit">To update</button>
        </form>
    </div>
</body>
</html>
