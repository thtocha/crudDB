<?php
    global $connect;
    require_once "../config/connect.php";
    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id`='$product_id'");
    $product = mysqli_fetch_assoc($product);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <a href="index.php">Main</a>
    <hr>
    <h2 class="title"><?= $product['title']?></h2>
    <div class="descr" style="font-size: 20px"><?= $product['description']?></div>
    <div class="price" style="margin-top: 15px; font-weight: bold">Price: <?=$product['price']?></div>

    <hr>
    <h3>Add comment</h3>
    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <textarea name="comment" placeholder="Comment   " cols="30" rows="10"></textarea>
        <button type="submit">Send</button>
    </form>

    <hr>
    <h3>Comments</h3>
    <ul>
        <?php
        $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id`='$product_id'");
        $comments = mysqli_fetch_all($comments);
        foreach($comments as $comment) {
            ?>
            <li><?= $comment[2] ?></li>
            <?php
        }
        ?>
    </ul>
</body>
</html>
