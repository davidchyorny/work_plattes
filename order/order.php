<?php

include './inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');


if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:../login/logoutSuccess.php');
};

$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};


mysqli_set_charset($conn, "utf8mb4");

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart1` WHERE id = '$remove_id'") or die('query failed');
    header('location:./order.php');
}

function customer_name($customer_name)
{
    if ($customer_name == 'error') {
        echo 'error';
    }
}
function client_number($client_number)
{
    if ($client_number == 'error') {
        echo 'error';
    }
}
function delivery_method($delivery_method)
{
    if ($delivery_method == 'error') {
        echo 'error';
    }
}
function region($region)
{
    if ($region == 'error') {
        echo 'error';
    }
}
function city($city)
{
    if ($city == 'error') {
        echo 'error';
    }
}
function department($department)
{
    if ($department == 'error') {
        echo 'error';
    }
}



if (isset($_POST['submit_order'])) {

    mysqli_set_charset($conn, "utf8mb4");;

    $customer_name = $_POST['customer_name'];
    $quantity_product = mysqli_num_rows($cart_query);
    $order_status = "treatment";
    $client_number = $_POST['client_number'];
    $order_date = date("Y-m-d H:i:s");
    $total_price = $_POST['sub_total'];

    $radio = $_POST["payment_method"];
    $delivery_method = $_POST["delivery-method"];
    $region = $_POST["region"];
    $city = $_POST["city"];
    $department = $_POST["department"];

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_code = $_POST['product_code'];

    // // Проверяем, заполнены ли поля
    if (empty($customer_name)) {
        $customer_name = "error";
        $client_number = "error";
        $delivery_method = "error";
        $region = "error";
        $city = "error";
        $department = "error";
    } else
        // Проверяем, заполнены ли номера
        if (!preg_match("/^\+?380\d{9}$/", $client_number)) {
            $client_number = "error";
        } else
            // // Проверяем, заполнены ли оба поля
            if (empty($delivery_method) and empty($region) and empty($city) and empty($department)) {
                $delivery_method = "error";
                $region = "error";
                $city = "error";
                $department = "error";
            } else
                // // Проверяем, заполнены ли оба поля
                if (empty($region) and empty($city) and empty($department)) {
                    $region = "error";
                    $city = "error";
                    $department = "error";
                } else
                    // // Проверяем, заполнены ли оба поля
                    if (empty($city) and empty($department)) {
                        $city = "error";
                        $department = "error";
                    } else
                        // // Проверяем, заполнены ли оба поля
                        if (empty($department)) {
                            $department = "error";
                        } else {
                            sleep(2);
                            mysqli_query($conn, "INSERT INTO `shipping_info`(user_id, payment_method, delivery_method, region, city, department) VALUES('$user_id', '$radio', '$delivery_method', '$region', '$city', '$department')") or die('query failed1');
                            mysqli_query($conn, "INSERT INTO `orders`(user_id, customer_name, quantity_product, order_status, client_number, order_date, total_price) VALUES('$user_id', '$customer_name', '$quantity_product', '$order_status', '$client_number', '$order_date', '$total_price')") or die('query failed2');
                            $order_id = mysqli_insert_id($conn);
                            header('location:../orders_done/orders_done.php');
                        }
};
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформити замовлення</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/order.css">

    <!-- Media -->
    <link rel="stylesheet" href="../css/Media.css">

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

    <nav class="nav ">
        <div class="container">
            <div class="nav-row">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="" class="nav-list__link">Про нас</a>
                    </li>
                    <li class="nav-list__item"><a href="./menu/nav/delivery/delivery.html" class="nav-list__link">Доставка, оплата, повернення</a></li>
                </ul>

                <ul class="nav-tel">
                    <form action="" method="post" class="form_name_tel">
                        <li class="nav-tel__item">
                            <p>Ім'я користувача : <span><i><b><?php echo $fetch_user['name']; ?></b> </i> </span></p>
                        </li>
                    </form>
                    <li class="nav-tel__item"><img src="../images/nav/tel.png" alt="tel" srcset=""></li>
                    <a href="tel:+380679473511">
                        <li class="nav-tel__item">067 947-35-11</li>
                    </a>
                    <a href="tel:+380679473511">
                        <li class="nav-tel__item">067 947-35-11</li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header ">
        <div class="container">
            <div class="header-row">
                <div class="burger">
                    <span></span>
                </div>
                <script src="../js/burger.js"></script>
                <a href="../client/client.php"><img src="../images/nav/logo.png" alt="" class="header_img"></a>

                <div class="header-column">
                    <ul class="header-become">
                        <li class="header-list__item">
                            <a href="#" class="header-list__link">
                                <str_no_activ>Для хлопців</str_no_activ>
                            </a>
                        </li>
                        <li class="header-list__item">
                            <a href="#" class="header-list__link">
                                <str_activ>Для дівчат</str_activ>
                            </a>
                        </li>
                    </ul>

                    <ul class="header-menu">
                        <li class="header-menu__item"><a href="../client/new/shirt.php" class="header-menu__link">
                                <red>Знижки</red>
                            </a> </li>
                        <li class="header-menu__item"><a href="../client/new/new_product.php" class="header-menu__link">
                                <green>Новинки</green>
                            </a></li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link" id="header__activ">Одяг</a>
                            <ul>
                                <li><a href="../menu/verkhnyaya-odezhda/verkhnyaya-odezhda.php" class="header-row-menu__link">ВЕРХНІЙ
                                        ОДЯГ</a></li>
                                <li><a href="../menu/kofty-svitshoty/kofty-svitshoty.php" class="header-row-menu__link">ТОЛСТОВКИ</a></li>
                                <li><a href="../menu/shtany/shtany.php" class="header-row-menu__link">ШТАНИ</a></li>
                            </ul>
                        </li>
                        <li class="header-menu__item">
                            <a href="#" class="header-menu__link" id="header__activ">Аксесуари</a>
                            <ul>
                                <li><a href="../menu/ryukzaki/ryukzaki.php" class="header-row-menu__link">Рюкзаки</a></li>
                                <li><a href="../menu/sumki-na-poyas/sumki-na-poyas.php" class="header-row-menu__link">Сумки</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="search">
                    <form id="searchForm" method="GET" action="../client/search/search.php">
                        <div class="header__search" id="searchButton">
                            <div class="box_search">
                                <input type="text" name="query" placeholder="Введите запрос" class="text_search">
                                <button type="submit" class="bth_search"><i class="bx bx-search-alt-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="header-carts-end">
                    <ul class="header-carts">
                        <!-- <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <img src="../images/nav/search.png" alt="" class="icon-img">
                            </a>
                        </li> -->
                        <div class="dropdown">
                            <ul class="header-cart__item">
                                <a href="" class="header__carts-link">
                                    <li><img src="../images/nav/login.png" alt="login" class="icon-img">
                                </a>
                                </li>

                                <div class="dropdown-content">
                                    <a href="./profile/profile.php">Мій обліковий запис</a>
                                    <a href="client.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Вы уверены, что хотите выйти из системы?');" class="text-enter" name="logout">Вийти</a>
                                </div>
                                </a>
                            </ul>
                        </div>
                        <!-- <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <img src="../images/nav/note.png" alt="" class="icon-img">
                            </a>
                        </li> -->
                        <li class="header-cart__item">
                            <a href="./basket.php" class="header__carts-link">
                                <span class="header__cart-number">
                                    <?php
                                    echo mysqli_num_rows($cart_query);
                                    ?>
                                </span>
                                <img src="../images/nav/basket.png" alt="" class="icon-img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search_menu">
                <form id="searchForm" method="GET" action="./search/search.php">
                    <div class="header__search" id="searchButton">
                        <div class="box_search">
                            <input type="text" name="query" placeholder="Введите запрос" class="text_search">
                            <button type="submit" class="bth_search"><i class="bx bx-search-alt-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <block>
        <div class="container">
            <div class="trace">
                <ul>
                    <a href="../../index.php">
                        <li class="trace_home">Головна</li>
                    </a>
                    <i class='bx bx-arrow-back bx-rotate-180'></i>
                    <a href="../basket/basket.php">
                        <li class="trace_home">Мій Кошик</li>
                    </a>
                    <i class='bx bx-arrow-back bx-rotate-180'></i>
                    <li class="trace_text">Оформити замовлення</li>
                </ul>

                <div class="title_card">
                    <a href="#" class="title_card_link">Оформити замовлення</a>
                </div>
            </div>

        </div>
    </block>




    <form action="" method="post">
        <div class="order">
            <div class="container">
                <div class="box_1">
                    <div class="data_user">
                        <div class="user_text">ДАНІ ПОКУПЦЯ</div>
                        <input type="text" class="<?php customer_name($customer_name); ?>" name="customer_name" id="" placeholder="Введіть ПІБ" value="<?php echo $_POST['customer_name']; ?>">
                        <input type="tel" class="<?php client_number($client_number); ?>" name="client_number" id="" placeholder="+380" value="<?php echo $_POST['client_number']; ?>">
                    </div>
                    <div class="oplata">
                        <div class="user_text">Оплата</div>
                        <label class="radio">
                            <input type="radio" name="payment_method" value="on_delivery" checked> <span>Оплата при отриманні</span>
                        </label>
                        <br><br>
                        <label class="radio">
                            <input type="radio" name="payment_method" value="prepayment"> <span>Повна оплата</span>
                        </label>
                    </div>
                </div>

                <div class="box_2">
                    <div class="doztavka">
                        <div class="user_text">ДОСТАВКА</div>

                        <label for="delivery-method">Спосіб доставки:</label>
                        <select id="delivery-method" name="delivery-method" class="<?php delivery_method($delivery_method); ?>">
                            <option value="">Оберіть спосіб доставки</option>
                            <option value="nova-poshta" <?php if ($_POST['delivery-method'] == 'nova-poshta') echo ' selected'; ?>>Нова Пошта</option>
                            <option value="ukrposhta" <?php if ($_POST['delivery-method'] == 'ukrposhta') echo ' selected'; ?>>Укрпошта</option>
                            <option value="justin" <?php if ($_POST['delivery-method'] == 'justin') echo ' selected'; ?>>Justin</option>
                        </select>



                        <label for="region">Область:</label>
                        <select id="region" name="region" class="<?php region($region); ?>">
                            <option value="">Оберіть область</option>
                            <option value="kiev" <?php if ($_POST['region'] == 'kiev') echo ' selected'; ?>>Київська область</option>
                            <option value="lviv" <?php if ($_POST['region'] == 'lviv') echo ' selected'; ?>>Львівська область</option>
                            <option value="kharkiv" <?php if ($_POST['region'] == 'kharkiv') echo ' selected'; ?>>Харківська область</option>
                        </select>

                        <label for="city">Місто:</label>
                        <select id="city" name="city" class="<?php city($city); ?>">
                            <option value="">Спочатку виберіть область</option>
                            <option value="kiev" <?php if ($_POST['city'] == 'kiev') echo ' selected'; ?>>Київ</option>
                            <option value="brovary" <?php if ($_POST['city'] == 'brovary') echo ' selected'; ?>>Бровари</option>
                            <option value="vyshneve" <?php if ($_POST['city'] == 'vyshneve') echo ' selected'; ?>>Вишневе</option>
                        </select>

                        <label for="department">Відділення:</label>
                        <select id="department" name="department" class="<?php department($department); ?>">
                            <option value="">Спочатку виберіть місто</option>
                            <option value="department1" <?php if ($_POST['department'] == 'department1') echo ' selected'; ?>>Відділення №1</option>
                            <option value="department2" <?php if ($_POST['department'] == 'department2') echo ' selected'; ?>>Відділення №2</option>
                            <option value="department3" <?php if ($_POST['department'] == 'department3') echo ' selected'; ?>>Відділення №3</option>
                        </select>
                    </div>
                </div>
                <div class="box_3">
                    <div class="order_confirmation_text">
                        Підтвердження замовлення
                    </div>
                    <div class="cart_text">
                        3 позицій(ї) в кошику
                    </div>
                    <div class="box_product">
                        <?php
                        $select_product = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');
                        if (mysqli_num_rows($select_product) > 0) {
                            while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                                if (isset($_POST['submit_order'])) {
                                    $product_name = $fetch_product['name'];
                                    $product_price = $fetch_product['price'];
                                    $product_quantity = $fetch_product['quantity'];
                                    $product_code = $fetch_product['product_code'];

                                  $mysqli_query = mysqli_query($conn, "INSERT INTO `order_items`(order_id, product_name, product_price, quantity, product_code) 
                                    VALUES('$order_id', '$product_name', '$product_price', '$product_quantity', '$product_code')")
                                        or die('query failed');
                                    mysqli_query($conn, $mysqli_query);

                                    $delete_query = "DELETE FROM `cart1` WHERE user_id = '$user_id'";
                                    mysqli_query($conn, $delete_query);
                                };
                        ?>
                                <div class="box_scroll">
                                    <div class="box_img">
                                        <img src="../images/Product/<?php echo $fetch_product['image']; ?>" width="100" alt="" class="shopping-cart-img">
                                    </div>
                                    <div class="box_text">
                                        <div class="name_link"><?php echo $fetch_product['name']; ?></div>
                                        <div class="name_quantity"><?php echo $fetch_product['quantity']; ?> шт.</div>
                                    </div>
                                    <div class="box_price">
                                        <div class="price_link"><?php echo $sub_total = ($fetch_product['price'] * $fetch_product['quantity']); ?> UAH</div>
                                    </div>
                                    <div class="box_delete">
                                        <a href="./order.php?remove=<?php echo $fetch_product['id']; ?>" class="delete-btn"><img src="../images/basket/Delete.png" alt="" srcset="" class="delete_row_img" title="Видалити"></a>
                                    </div>
                                </div>

                        <?php
                                $grand_total += $sub_total;
                            };
                        };
                        ?>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'] ?>">
                        <input type="hidden" name="product_quantity" value="<?php echo $fetch_product['quantity'] ?>">
                        <input type="hidden" name="product_code" value="<?php echo $fetch_product['product_code'] ?>">
                        <input type="hidden" name="sub_total" value="<?php echo $grand_total ?>">


                    </div>
                    <div class="box_edit">
                        <a href="../basket/basket.php">ПЕРЕГЛЯНУТИ ТА РЕДАГУВАТИ КОШИК</a>
                    </div>
                    <div class="box_commentary">
                        <input type="text" placeholder="Коментар до замовлення">
                    </div>
                    <div class="bth_order">
                        <a href="../order/order.php" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><button type="submit" name="submit_order" value="" title="ПЕРЕЙДІТЬ НА ЗАМОВЛЕННЯ">ПЕРЕЙДІТЬ НА ЗАМОВЛЕННЯ</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer>
        <div class="footer_block none">
            <div class="container">
                <div class="footer-row">
                    <div class="catalog">
                        <a href="#" class="text_info">
                            <h3>Каталог</h3>
                        </a>
                        <ul>
                            <li class="catalog_item"><a href="#" class="catalog_link">
                                    <red>Знижки</red>
                                </a></li>
                            <li class="catalog_item"><a href="#" class="catalog_link">
                                    <green>Новинки</green>
                                </a></li>
                            <li class="catalog_item"><a href="#" class="catalog_link">Одяг</a> </li>
                            <li class="catalog_item"><a href="#" class="catalog_link">Аксесуари</a> </li>
                        </ul>
                    </div>

                    <div class="info">
                        <a href="#" class="text_info">
                            <h3>Інформація</h3>
                        </a>
                        <ul>
                            <li class="info_item"><a href="#" class="info_link"> Про нас</a></li>
                            <li class="info_item"><a href="./menu/nav/about/about.html" class="info_link"> Доставка,
                                    оплата, повернення </a></li>
                            <li class="info_item"><a href="#" class="info_link"> Новини і відгуки</a></li>
                        </ul>
                    </div>

                    <div class="info-store">
                        <ul>
                            <li class="store_item"><a href="#" class="store_link"> Співробітництво </a></li>
                            <li class="store_item"><a href="#" class="store_link"> Договір публічної оферти </a></li>
                            <li class="store_item"><a href="#" class="store_link"> Політика конфіденційності </a></li>
                            <a href="#"><img src="/img/footer/mastercard_visa.png.png" alt="" srcset=""></a>
                        </ul>
                    </div>
                    <div class="social_networkss">
                        <a href="#" class="text_info">Соціальні мережі</a>
                        <div class="img_row">
                            <div class="img-facebook">
                                <a href="nav"><i class='bx bxl-facebook-circle'></i></a>
                            </div>
                            <div class="img-instagram">
                                <a href="https://www.instagram.com/karabet_studio/"><i class='bx bxl-instagram'></i></a>
                            </div>
                            <div class="img-telegram">
                                <a href="#"><i class='bx bxl-telegram'></i></a>
                            </div>
                            <div class="img-YouType">
                                <a href="#"><i class='bx bxl-youtube'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-copyright -->
                <div class="footer-copyright">
                    <div class="footer-copyright-name"> © 2023 </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/delivery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>