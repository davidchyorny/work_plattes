<?php

$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');

?>