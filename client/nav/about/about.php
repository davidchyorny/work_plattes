<?php

include '../../../inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];
mysqli_set_charset($conn, "utf8mb4");
$cart_query = mysqli_query($conn, "SELECT * FROM `cart1` WHERE user_id = '$user_id'") or die('query failed');


$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про нас</title>
    <link rel="shortcut icon" href="./images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Media -->
    <link rel="stylesheet" href="./css/media.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <nav class="nav ">
        <div class="container">
            <div class="nav-row">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="./about.php" class="nav-list__link">Про нас</a></li>
                    <li class="nav-list__item"><a href="../delivery/delivery.php" class="nav-list__link">Доставка, оплата, повернення</a></li>
                </ul>

                <ul class="nav-tel">
                    <li class="nav-tel__item">
                        <p>Ім'я користувача : <span><i><b><?php echo $fetch_user['name']; ?></b> </i> </span></p>
                    </li>
                    <li class="nav-tel__item"><img src="./images/nav/tel.png" alt="tel" srcset=""></li>
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
                <script src="../../../js/burger.js"></script>
                <a href="../../../client/client.php"><img src="../../../images/nav/logo.png" alt="" class="header_img"></a>

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
                        <li class="header-menu__item"><a href="../../../client/new/shirt.php" class="header-menu__link">
                                <red>Знижки</red>
                            </a> </li>
                        <li class="header-menu__item"><a href="../../../client/new/new_product.php" class="header-menu__link">
                                <green>Новинки</green>
                            </a></li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link" id="header__activ">Одяг</a>
                            <ul>
                                <li><a href="../../../menu/verkhnyaya-odezhda/verkhnyaya-odezhda.php" class="header-row-menu__link">ВЕРХНІЙ
                                        ОДЯГ</a></li>
                                <li><a href="../../../menu/kofty-svitshoty/kofty-svitshoty.php" class="header-row-menu__link">ТОЛСТОВКИ</a></li>
                                <li><a href="../../../menu/shtany/shtany.php" class="header-row-menu__link">ШТАНИ</a></li>
                            </ul>
                        </li>
                        <li class="header-menu__item">
                            <a href="#" class="header-menu__link" id="header__activ">Аксесуари</a>
                            <ul>
                                <li><a href="../../../menu/ryukzaki/ryukzaki.php" class="header-row-menu__link">Рюкзаки</a></li>
                                <li><a href="../../../menu/sumki-na-poyas/sumki-na-poyas.php" class="header-row-menu__link">Сумки</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="search">
                    <form id="searchForm" method="GET" action="../../../client/search/search.php">
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
                                <img src="../../../images/nav/search.png" alt="" class="icon-img">
                            </a>
                        </li> -->
                        <div class="dropdown">
                            <ul class="header-cart__item">
                                <a href="" class="header__carts-link">
                                    <li><img src="../../../images/nav/login.png" alt="login" class="icon-img">
                                </a>
                                </li>

                                <div class="dropdown-content">
                                    <a href="../../profile/profile.php">Мій обліковий запис</a>
                                    <a href="../../client.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Вы уверены, что хотите выйти из системы?');" class="text-enter" name="logout">Вийти</a>
                                </div>
                                </a>
                            </ul>
                        </div>
                        <!-- <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <img src="../../../images/nav/note.png" alt="" class="icon-img">
                            </a>
                        </li> -->
                        <li class="header-cart__item">
                            <a href="../../../basket/basket.php" class="header__carts-link">
                                <span class="header__cart-number">
                                    <?php
                                    echo mysqli_num_rows($cart_query);
                                    ?>
                                </span>
                                <img src="../../../images/nav/basket.png" alt="" class="icon-img">
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




    <section class="section ">
        <div class="section-title">
            <div class="section_img">
                <img src="./images/header-img/header-img.png" alt="">
                <div class="centered">about Palles</div>
                <div class="text">Palles WAS FOUNDED IN 2023. IS A STREATWEAR BRAND.</div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="info_abouts">
                <div class="info_row">
                    <div class="info-col">Історія компанії Palles почалася у 2023 році.
                        Засновники — енергійні та креативні хлопці, брати з невеликого міста в західній частині України,
                        — вирішили спрямувати свою діяльність на розвиток української streetwear культури. Восени того ж року
                        першим релізом була випущена парка під назвою Palles. Вона стала першою ластівкою у широкому асортименті
                        моделей компанії, розроблених і втілених у життя. Українці підтримали молодіжний бренд і вітали появу новинок.
                        <br>
                        <br>
                        У 2023 році колекції бренду Palles включали в себе як верхній одяг. Кредо компанії - постійний рух вперед.
                        З кожним релізом ми ставимо перед собою нові завдання і працюємо на максимальний результат.
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <li class="info_item"><a href="./about.html" class="info_link"> Про нас</a></li>
                            <li class="info_item"><a href="../../../delivery/delivery.html" class="info_link"> Доставка, оплата, повернення </a></li>
                        </ul>
                    </div>

                    <div class="info-store">
                        <ul>
                            <li class="store_item"><a href="#" class="store_link"> Співробітництво </a></li>
                            <li class="store_item"><a href="#" class="store_link"> Договір публічної оферти </a></li>
                            <li class="store_item"><a href="#" class="store_link"> Політика конфіденційності </a></li>
                            <a href="#"><img src="./images/footer/mastercard_visa.png.png" alt="" srcset=""></a>
                        </ul>
                    </div>
                    <div class="social_networkss">
                        <a href="#" class="text_info">Соціальні мережі</a>
                        <div class="img_row">
                            <div class="img-facebook">
                                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                            </div>
                            <div class="img-instagram">
                                <a href="#"><i class='bx bxl-instagram'></i></a>
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


</body>

</html>