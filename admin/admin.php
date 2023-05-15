<?php

include '../inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
mysqli_set_charset($conn, "utf8mb4");

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список клиентов</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/admin.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    if (isset($success)) {
        foreach ($success as $success) {
            echo '<div class="success" onclick="this.remove();">' . $success . '</div>';
        }
    }
    ?>

    <div class="box">
        <text>Список заказов</text>
    </div>
    <div class="box_1">
        <div class="id">ID</div>
        <div class="customer_name">Статус</div>
        <div class="order_date">Дата</div>
        <div class="client_number">Заказчик</div>
        <div class="product">Товары</div>
        <div class="amount">Сумма</div>
    </div>
    <?php
    $select_product = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
    if (mysqli_num_rows($select_product) > 0) {
        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
    ?>
            <div class="box_2">
                <div class="id"><?php echo $fetch_product['user_id']; ?></div>
                <div class="customer_name"><?php echo $fetch_product['customer_name']; ?></div>
                <div class="order_date"><?php echo $fetch_product['order_date']; ?></div>
                <div class="client_number"><?php echo $fetch_product['client_number']; ?></div>
                <div class="product"><?php echo $fetch_product['product']; ?></div>
                <div class="amount"><?php echo $fetch_product['total_price']; ?></div>
            </div>

    <?php
        }
    };
    ?>

</body>

</html>