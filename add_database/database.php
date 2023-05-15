<!-- Здесь добавьте код для сохранения лайка в базе данных -->
<?php


$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity = $_POST['product_quantity'];
$product_code = $_POST['product_code'];



$select_cart = mysqli_query($conn, "SELECT * FROM `database` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
mysqli_query($conn, "INSERT INTO `database`(user_id, name, price, image, quantity, product_code) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity', '$product_code')") or die('query failed');
$success[] = 'Товар додано до заметки!';

?>