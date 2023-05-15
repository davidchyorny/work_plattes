<?php

include 'inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');


mysqli_set_charset($conn, "utf8mb4");

if (!isset($user_id)) {
    header('location:../login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:../login/logoutSuccess.php');
};

error_reporting(-1);
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();

$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
$grand_total = 0;
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart1` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart1` WHERE id = '$remove_id'") or die('query failed');
    header('location:./basket.php');
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/basket.css">

    <!-- Media -->
    <link rel="stylesheet" href="../css/Media.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <nav class="nav ">
        <div class="container">
            <div class="nav-row">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="../client/nav/about/about.php" class="nav-list__link">Про нас</a>
                    </li>
                    <li class="nav-list__item"><a href="../client/nav/delivery/delivery.php" class="nav-list__link">Доставка, оплата, повернення</a></li>
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
                    <a href="../../index.html">
                        <li class="trace_home">Головна</li>
                    </a>
                    <i class='bx bx-arrow-back bx-rotate-180'></i>
                    <li class="trace_text">Мій Кошик</li>
                </ul>

                <div class="title_card">
                    <a href="#" class="title_card_link">Мій Кошик</a>
                </div>
            </div>

        </div>
    </block>


    <div class="basket">
        <div class="container">
            <div class="shopping-cart">

                <table>

                    <tbody>
                        <?php
                        $cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');
                        if (mysqli_num_rows($cart_query) > 0) {
                        ?>
                            <thead class="thead">
                                <th>Товар</th>
                                <th>Опис</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
                                <th>Підсумкова Ціна</th>
                            </thead>

                            <?php
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                            ?>
                                <tr class="box_thead">

                                    <td rowspan="2">
                                        <img src="../images/Product/<?php echo $fetch_cart['image']; ?>" width="100" alt="" class="shopping-cart-img">
                                    </td>

                                    <td class="name_row">
                                        <div class="name_link"><?php echo $fetch_cart['name']; ?></div>
                                    </td>

                                    <td class="price_row" rowspan="2">
                                        <div class="price_link"><?php echo $fetch_cart['price']; ?> UAH</div>
                                    </td>

                                    <td rowspan="2">
                                        <form action="" method="post" class="number-row">
                                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" class="cart_quantity">
                                            <input type="submit" name="update_cart" value="Оновлення" class="option-btn">
                                        </form>
                                    </td>

                                    <td class="total_amount">
                                        <div class="total_amount_link"><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?> UAH</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="code_td">
                                        <div class="code_link">АРТИКУЛ: <?php echo $fetch_cart['product_code']; ?></div>
                                    </td>

                                    <td class="delete_row">
                                        <a href="./basket.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn"><img src="../images/basket/Delete.png" alt="" srcset="" class="delete_row_img" title="Видалити"></a>
                                    </td>
                                <?php
                                $grand_total += $sub_total;
                            };
                        } else { ?>
                                <div class="basket_title">
                                    <p>У вас немає товарів у кошику.</p>
                                    <p>Клацніть <a href="../client/client.php" class="title_home">тут</a> щоб продовжити покупки.</p>
                                </div>
                            <?php
                        };
                            ?>
                                </tr>
                    </tbody>
                </table>

                <?php
                if (mysqli_num_rows($cart_query) > 0) {
                ?>
                    <div class="product_result">
                        <div class="title_text">
                            <title>Підсумок</title>
                            <product-quantity><?php

                                                echo mysqli_num_rows($cart_query);

                                                if (mysqli_num_rows($cart_query) == 1) {
                                                    echo " товар";
                                                } else {
                                                    echo " товара";
                                                };

                                                ?></product-quantity>
                        </div>
                        <div class="interim_results">
                            <title_results>Проміжні підсумки</title_results>
                            <amount_results><?php echo $grand_total; ?> UAH</amount_results>
                        </div>
                        <div class="submission">
                            <title_submission>Податок</title_submission>
                            <amount_submission>0,00 UAH</ф_submission>
                        </div>
                        <div class="ordering">
                            <title_ordering>Вартість замовлення</title_ordering>
                            <amount_ordering><?php echo $grand_total; ?> UAH</ф_submission>
                        </div>
                        <div class="bth_order">
                            <a href="../order/order.php" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><button type="submit" name="add_to_cart" value="" title="ОФОРМИТИ ЗАМОВЛЕННЯ">ОФОРМИТИ ЗАМОВЛЕННЯ</button></a>
                        </div>
                    </div>
                <?php
                };
                ?>

            </div>
        </div>
    </div>

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