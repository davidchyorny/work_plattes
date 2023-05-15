<?php

include './inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');


$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};




?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Замовлення успішно оформлено</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/orders_done.css">

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
                    <li class="nav-list__item"><a href="./menu/nav/about/about.html" class="nav-list__link">Про нас</a>
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

    <form action="" method="post">
        <div class="orders_done">
            <div class="container">
                <div class="box_1">
                    <div class="img_done">
                        <img src="../images/orders_done/orders_done.png" alt="" srcset="">
                    </div>
                    <?php
                    $cart_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id' ORDER BY `id` DESC LIMIT 1") or die('query failed');
                    $cart_query_2  = mysqli_query($conn, "SELECT * FROM `shipping_info` WHERE user_id = '$user_id' ORDER BY `id` DESC LIMIT 1") or die('query failed');
                    if (mysqli_num_rows($cart_query) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($cart_query)) {
                            while ($fetch_product_2 = mysqli_fetch_assoc($cart_query_2)) {

                    ?>

                                <div class="text_done">
                                    <h2>ЗАМОВЛЕННЯ УСПІШНО ОФОРМЛЕНО</h2>
                                </div>
                                <div class="number_order_done">
                                    <h2>Замовлення № <b><?php echo $fetch_product['id']; ?></h2></b>
                                </div>
                                <div class="manager_info_done">
                                    <h2>Протягом дня з вами зв'яжеться наш менеджер і підтвердить ваше замовлення в телефонному режимі</h2>
                                </div>
                                <div class="order_time_done">
                                    <div class="box_1_done">
                                        <ul class="time_done">ДАТА:</ul>
                                        <ul class="sum_done">СУМА:</ul>
                                        <ul class="payment_done">СПОСІБ ОПЛАТИ:</ul>
                                    </div>
                                    <div class="box_2_done">
                                        <ul class="time_done"><?php $dateString = $fetch_product['order_date'];;
                                                                $date = date('d.m.Y', strtotime($dateString));
                                                                echo $date;
                                                                ?></ul>
                                        <ul class="sum_done"><?php echo $fetch_product['total_price']; ?></ul>
                                        <ul class="payment_done"><?php
                                                                    if ($fetch_product_2['payment_method'] === "on_delivery") {
                                                                        echo "Оплата при отриманні";
                                                                    } else {
                                                                        echo "Повна передоплата";
                                                                    }
                                                                    ?></ul>
                                    </div>
                                </div>
                                <div class="bth_order">
                                    <button type="submit" name="submit_order" value="" title="ПЕРЕЙДІТЬ НА ГЛАВНУЮ"><a href="../client/client.php" class="bth_order_color">ПЕРЕЙДІТЬ НА ГЛАВНУЮ</a></button>
                                </div>
                </div>
    <?php
                            }
                        }
                    };
    ?>
            </div>
        </div>
    </form>

    <footer>
        <div class="footer_block">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>