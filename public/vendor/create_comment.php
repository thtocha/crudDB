<?php
    global $connect;
    require_once "../../config/connect.php";

    if (isset($_POST['product_id']) && isset($_POST['comment'])) {
        $product_id = $_POST['product_id'];
        $comment = $_POST['comment'];

        // Добавьте код для вставки комментария в таблицу comments с использованием product_id
        $query = "INSERT INTO `comments` (`product_id`, `comment`) VALUES ('$product_id', '$comment')";
        $result = mysqli_query($connect, $query);

        if ($result) {
            // Успешно добавлено
            header("Location: ../product.php?id=$product_id");
            exit();
        } else {
            // Ошибка при выполнении запроса
            echo "Ошибка: " . mysqli_error($connect);
        }
    } else {
        // Недостающие данные в запросе
        echo "Не удалось получить необходимые данные.";
    }