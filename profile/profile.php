<?php

include '../inc/config.php';
session_start();
$user_id = $_SESSION['user_id'];



if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:../../login/logoutSuccess.php');
};


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
    <title>ОСОБИСТИЙ КАБІНЕТ</title>
    <link rel="shortcut icon" href="../../images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/profil.css">

    <!-- Media -->
    <link rel="stylesheet" href="../assets/css/Media.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="nav ">
        <div class="container">
            <div class="nav-row">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="../nav/about/about.html" class="nav-list__link">Про нас</a>
                    </li>
                    <li class="nav-list__item"><a href="../nav/delivery/delivery.html" class="nav-list__link">Доставка, оплата, повернення</a></li>
                </ul>

                <ul class="nav-tel">
                    <a href="">
                        <form action="" method="post">
                            <li class="nav-tel__item">
                                <p>Ім'я користувача : <span><i><b><?php echo $fetch_user['name']; ?></b> </i></span></p>
                            </li>
                        </form>
                    </a>
                    <li class="nav-tel__item"><img src="../../images/nav/tel.png" alt="tel" srcset=""></li>
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
                <a href="../client.php"><img src="../../images/nav/logo.png" alt="" class="header_img"></a>

                <div class="header-column">
                    <ul class="header-become">
                        <li class="header-list__item">
                            <a href="#" class="header-list__link">
                                Для хлопців
                            </a>
                        </li>
                        <li class="header-list__item">
                            <a href="#" class="header-list__link">
                                <str_activ>Для дівчат</str_activ>
                            </a>
                        </li>
                    </ul>

                    <ul class="header-menu">
                        <li class="header-menu__item"><a href="../menu/new/signs.html" class="header-menu__link">
                                <red>Знижки</red>
                            </a> </li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link">
                                <green>Новинки</green>
                            </a></li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link" id="header__activ">Одяг</a>
                            <ul>
                                <li><a href="./menu/outerwear/outerwear.html" class="header-row-menu__link">ВЕРХНІЙ
                                        ОДЯГ</a></li>
                                <li><a href="./menu/sweatshirt/sweatshirt.html" class="header-row-menu__link">ТОЛСТОВКИ</a></li>
                                <li><a href="./menu/pants/pants.html" class="header-row-menu__link">ШТАНИ</a></li>
                            </ul>
                        </li>
                        <li class="header-menu__item">
                            <a href="#" class="header-menu__link" id="header__activ">Аксесуари</a>
                            <ul>
                                <li><a href="#" class="header-row-menu__link">Рюкзаки</a></li>
                                <li><a href="#" class="header-row-menu__link">Сумки</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="header-carts-end">
                    <ul class="header-carts">
                        <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <img src="../../images/nav/search.png" alt="" class="icon-img">
                            </a>
                        </li>
                        <div class="dropdown">
                            <ul class="header-cart__item">
                                <span class="header__carts-link">
                                    <li><a href="./productsearch.php"></a> <img src="../../images/nav/login.png" alt="login" class="icon-img"><button class="dropbtn"></button></li>


                                    <div class="dropdown-content">
                                        <a href="./profile.php">Мій обліковий запис</a>
                                        <a href="profile.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Вы уверены, что хотите выйти из системы?');" class="text-enter" name="logout">Вийти</a>
                                    </div>
                                </span>
                            </ul>
                        </div>
                        <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <img src="../../images/nav/note.png" alt="" class="icon-img">
                            </a>
                        </li>
                        <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <span class="header__cart-number">7</span>
                                <img src="../../images/nav/basket.png" alt="" class="icon-img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="section ">
        <div class="container">
            <div class="box">
                <div class="box_1">
                    <ul>
                        <a href="./profile.php"><li class="asset">ОСОБИСТИЙ КАБІНЕТ</li></a>
                        <a href=""><li>ИСТОРИЯ ЗАКАЗОВ</li></a>
                    </ul>
                </div>
                <div class="box_2">
                <form action="" method="post">
                    <div class="enter">
                        <a href="profile.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Вы уверены, что хотите выйти из системы?');" class="text-enter">
                            <div class="exit-enter" name="logout">ВИЙТИ З ОБЛІКОВОГО ЗАПИСУ</div>
                        </a>
                    </div>
                    <div class="user-profile">
                        <p>Ім'я користувача : <span><?php echo $fetch_user['name']; ?></span></p>
                        <p>Email : <span><?php echo $fetch_user['email']; ?></span></p>
                        <div class="flex">
                            <a href="../login/newpass.php" class="change-btn">Смена пароля</a>
                        </div>
                </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>


<section class="section none">
    <div class="section-title">
        <div class="section">
            <div class="text">ОСОБИСТИЙ КАБІНЕТ</div>
        </div>
    </div>
    </div>
    <form action="" method="post">
        <div class="enter">
            <a href="profile.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Вы уверены, что хотите выйти из системы?');" class="text-enter">
                <div class="exit-enter" name="logout">ВИЙТИ З ОБЛІКОВОГО ЗАПИСУ</div>
            </a>
        </div>
        <div class="user-profile">
            <p>Ім'я користувача : <span><?php echo $fetch_user['name']; ?></span></p>
            <p>Email : <span><?php echo $fetch_user['email']; ?></span></p>
            <div class="flex">
                <a href="../login/newpass.php" class="change-btn">Смена пароля</a>
            </div>
    </form>
</section>