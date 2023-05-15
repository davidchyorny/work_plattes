<?php

include '../inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
mysqli_set_charset($conn, "utf8mb4");
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');


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
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_code = $_POST['product_code'];



    $select_cart = mysqli_query($conn, "SELECT * FROM `cart1` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Товар вже додано до кошика!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart1`(user_id, name, price, image, quantity, product_code) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity', '$product_code')") or die('query failed');
        $success[] = 'Товар додано до кошика!';
    }
};

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}




?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pallets - бренд якісного молодіжного одягу.</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Media -->
    <link rel="stylesheet" href="../css/media/media.css">

    <meta name="viewport" content="width=device-width">

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

    <!-- Модальное окно
    <div id="searchModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="searchForm" method="GET" action="./search/search.php">
                <input type="text" name="query" placeholder="Введите запрос" class="text_search">
                <input type="submit" value="Поиск" class="bth_search">
            </form>
        </div>
    </div> -->


    <nav class="nav ">
        <div class="container">
            <div class="nav-row">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="../nav/about/about.php" class="nav-list__link">Про нас</a>
                    </li>
                    <li class="nav-list__item"><a href="./nav/delivery/delivery.php" class="nav-list__link">Доставка, оплата, повернення</a></li>
                </ul>

                <ul class="nav-tel">
                    <form action="" method="post">
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
                <a href="./client.php"><img src="../images/nav/logo.png" alt="" class="header_img"></a>
                <div class="header-column">
                    <ul class="header-become">
                        <li class="header-list__item">
                            <a href="#" class="header-list__link" title="Не доступно">
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
                        <li class="header-menu__item"><a href="./new/shirt.php" class="header-menu__link">
                                <red>Знижки</red>
                            </a></li>
                        <li class="header-menu__item"><a href="./new/new_product.php" class="header-menu__link">
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
                            <a class="header-menu__link" id="header__activ">Аксесуари</a>
                            <ul>
                                <li><a href="../menu/ryukzaki/ryukzaki.php" class="header-row-menu__link">Рюкзаки</a></li>
                                <li><a href="../menu/sumki-na-poyas/sumki-na-poyas.php" class="header-row-menu__link">Сумки</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <div class="search">
                    <form id="searchForm" method="GET" action="./search/search.php">
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
                        <!-- <li class="header-cart__item"> -->
                        <!-- <img src="../images/nav/search.png" alt="" class="icon-img"> -->
                        <!-- </li> -->
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

                        <div class="my-link">
                            <li class="header-cart__item">
                                <a href="../basket/basket.php">
                                    <span class="header__cart-number">
                                        <?php
                                        echo mysqli_num_rows($cart_query);
                                        ?>
                                    </span>
                                    <img src="../images/nav/basket.png" alt="" class="icon-img" id="">
                                </a>
                            </li>
                        </div>

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



    <section class="section">
        <div class="section-title">
            <div class="section_img">
                <img src="../images/Section/section.png" alt="">
                <div class="submit">
                    <input type="button" value="" class="button">
                    <a href="./new/shirt.php"><button class="button_section">Перейти</button></a>
                </div>
            </div>
        </div>
    </section>


    <!-- Carts -->
    <sestion class="sestion ">
        <div class="container">
            <div class="cards">
                <div class="card">
                    <a href="./menu/sweatshirt/sweatshirt.html"><img src="../images/Card/Cart-1.webp" alt="" srcset="" class="card_link"></a>
                    <div class="submit-card">
                        <a href="../menu/kofty-svitshoty/kofty-svitshoty.php"><button class="button_cards">Перейти</button></a>
                    </div>
                </div>
                <div class="card">
                    <a href="./menu/pants/pants.html"><img src="../images/Card/Cart-2.webp" alt="" srcset="" class="card_link"></a>
                    <div class="submit-card">
                        <a href="../menu/shtany/shtany.php"><button class="button_cards">Перейти</button></a>
                    </div>
                </div>
            </div>
        </div>
    </sestion>



    <product>
        <div class="product ">
            <div class="container">
                <a href="#" class="product-title">Новинки</a>
                <div class="product-cards">
                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `ryukzaki` ORDER BY RAND() LIMIT 5") or die('query failed');
                    if (mysqli_num_rows($select_product) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                    ?>
                            <form method="POST" class="box">
                                <div class="produst-card">
                                    <!-- <div class="heart">
                                        <i class='bx bx-heart'></i>
                                    </div> -->
                                    <img src="../images/Product/<?php echo $fetch_product['image']; ?>" srcset="" class="produst-card_link-1">
                                    <div class="card-box-title">
                                        <h2><?php echo $fetch_product['name']; ?></h2>
                                        <availability>
                                            <div class="availability">
                                                <?php
                                                if ($fetch_product['availability'] <= 5) {
                                                    echo "<p style='color: red;'>Закінчується</p>";
                                                ?>
                                                <?php
                                                }
                                                if ($fetch_product['availability'] > 5) {
                                                    echo  "В наявність";
                                                }
                                                ?>
                                            </div>
                                        </availability>

                                        <price><?php echo $fetch_product['price']; ?> грн.</price>

                                        <input type="number" min="1" name="product_quantity" value="1">
                                        <div class="button-add-product">
                                            <button type="submit" name="add_to_cart"><i class='bx bxs-cart-add add-to-cart'>
                                                    <h3>ДОДАТИ В КОШИК</h3>
                                                </i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_image" value="<?= $fetch_product['image'] ?>">
                                    <input type="hidden" name="product_name" value="<?= $fetch_product['name'] ?>">
                                    <input type="hidden" name="product_price" value="<?= $fetch_product['price'] ?>">
                                    <input type="hidden" name="product_code" value="<?= $fetch_product['product_code'] ?>">
                                </div>
                            </form>
                    <?php
                        };
                    };
                    ?>
                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `kofty-svitshoty` ORDER BY RAND() LIMIT 5") or die('query failed');
                    if (mysqli_num_rows($select_product) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                    ?>
                            <form method="POST" class="box">
                                <div class="produst-card">
                                    <!-- <div class="heart">
                                        <i class='bx bx-heart'></i>
                                    </div> -->
                                    <img src="../images/Product/<?php echo $fetch_product['image']; ?>" srcset="" class="produst-card_link-1">
                                    <div class="card-box-title">
                                        <h2><?php echo $fetch_product['name']; ?></h2>
                                        <availability>
                                            <div class="availability">
                                                <?php
                                                if ($fetch_product['availability'] <= 5) {
                                                    echo "<p style='color: red;'>Закінчується</p>";
                                                ?>
                                                <?php
                                                }
                                                if ($fetch_product['availability'] > 5) {
                                                    echo  "В наявність";
                                                }
                                                ?>
                                            </div>
                                        </availability>

                                        <price><?php echo $fetch_product['price']; ?> грн.</price>

                                        <input type="number" min="1" name="product_quantity" value="1">
                                        <div class="button-add-product">
                                            <button type="submit" name="add_to_cart"><i class='bx bxs-cart-add add-to-cart'>
                                                    <h3>ДОДАТИ В КОШИК</h3>
                                                </i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_image" value="<?= $fetch_product['image'] ?>">
                                    <input type="hidden" name="product_name" value="<?= $fetch_product['name'] ?>">
                                    <input type="hidden" name="product_price" value="<?= $fetch_product['price'] ?>">
                                    <input type="hidden" name="product_code" value="<?= $fetch_product['product_code'] ?>">
                                </div>
                            </form>
                    <?php
                        };
                    };
                    ?>

                </div>
            </div>
        </div>
    </product>

    <script></script>

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



    <button id="scroll-to-top-btn"><i class='bx bxs-up-arrow'></i></i></button>
    <script src="../js/scroll_top_bth.js"></script>
    <script src="../js/modalsearch.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="../js/burger.js"></script>
</body>

</html>