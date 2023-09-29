<?php
    $connect = mysqli_connect("db","root","root","telegram");
    if (!$connect) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
