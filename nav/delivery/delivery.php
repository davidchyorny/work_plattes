<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Верхній одяг жіночий купити в Україні.</title>
    <link rel="shortcut icon" href="./images/favicon/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/delivery.css">
    <link rel="stylesheet" href="css/login.css">

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
                    <li class="nav-list__item"><a href="../about/about.php" class="nav-list__link">Про нас</a></li>
                    <li class="nav-list__item"><a href="delivery.php" class="nav-list__link">Доставка, оплата, повернення</a></li>
                </ul>

                <ul class="nav-tel">
                    <li class="nav-tel__item"><img src="./images/nav/tel.png" alt="tel" srcset=""></li>
                    <li class="nav-tel__item">067 947-35-11</li>
                    <li class="nav-tel__item">067 947-35-11</li>
                </ul>
            </div>
        </div>
    </nav>



    <header class="header ">
        <div class="container">
            <div class="header-row">
                <a href="../../index.php"><img src="../../images/nav/logo.png" alt="" class="header_img"></a>

                <div class="header-column">
                    <ul class="header-become">
                        <li class="header-list__item">
                            <a href="#" class="header-list__link">
                                Для хлопців
                            </a>
                        </li>
                        <li class="header-list__item">
                            <a href="../../../index.html" class="header-list__link">
                                <str_activ>Для дівчат</str_activ>
                            </a>
                        </li>
                    </ul>

                    <ul class="header-menu">
                        <li class="header-menu__item"><a href="#" class="header-menu__link">
                                <red>Знижки</red>
                            </a> </li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link">
                                <green>Новинки</green>
                            </a></li>
                        <li class="header-menu__item"><a href="#" class="header-menu__link" id="header__activ">Одяг</a>
                            <ul>
                                <li><a href="../../outerwear/outerwear.html" class="header-row-menu__link">ВЕРХНІЙ ОДЯГ</a></li>
                                <li><a href="../../sweatshirt/sweatshirt.html" class="header-row-menu__link">ТОЛСТОВКИ</a></li>
                                <li><a href="../../pants/pants.html" class="header-row-menu__link">ШТАНИ</a></li>
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
                                <img src="./images/nav/search.png" alt="" class="icon-img">
                            </a>
                        </li>
                        <ul class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <li><a href="#" onclick="show('block')"><img src="./images/nav/login.png" alt="login" class="icon-images"></a></li>

                            </a>
                        </ul>
                        <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <span class="header__cart-number">3</span>
                                <img src="./images/nav/note.png" alt="" class="icon-img">
                            </a>
                        </li>
                        <li class="header-cart__item">
                            <a href="" class="header__carts-link">
                                <span class="header__cart-number">7</span>
                                <img src="./images/nav/basket.png" alt="" class="icon-img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div id="filter"></div>
    <div id="modalForm">
        <section class="container-form forms">
            <div class="form login">
                <div class="form-content">
                    <div class="form-exit">
                        <div>
                            <div class="closed">
                                <a href="#" onclick="show('none')"><i class='bx bx-x x' alt="closed"></i></a>
                            </div>
                            <header>Логін</header>
                        </div>

                    </div>

                    <form action="#">
                        <div class="field input-field">
                            <input type="email" name="Email" id="" placeholder="Email">
                        </div>
                        <div class="field input-field">
                            <input type="password" name="password" id="" placeholder="Password" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Забули пароль?</a>
                        </div>

                        <div class="field button-field">
                            <button>Логiн</button>
                        </div>
                    </form>
                    <div class="form-link">
                        <span>Немає облікового запису? <a href="#" class="link signup-link">Реєстрація</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="/img/login/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div>
            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <div class="form-exit">

                        <div class="closed">
                            <a href="#" onclick="show('none')"><i class='bx bx-x x' alt="closed"></i></a>
                        </div>

                        <div>
                            <header>Реєстрація</header>
                        </div>
                    </div>

                    <form action="#">
                        <div class="field input-field">
                            <input type="email" name="Email" id="" placeholder="Email">
                        </div>
                        <div class="field input-field">
                            <input type="password" name="password" id="" placeholder="Password" class="password">
                        </div>
                        <div class="field input-field">
                            <input type="password" name="password" id="" placeholder="Password" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button>Реєстрація</button>
                        </div>
                    </form>
                    <div class="form-link">
                        <span>Вже є аккаунт? <a href="#" class="link signup-link">Логін</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="/img/login/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
    </div>


    <!-- Javascript -->
    <script src="./js/modal.js"></script>


    <section class="section ">
        <div class="section-title">
            <div class="section">
                <div class="text">ДОСТАВКА, ОПЛАТА, ПОВЕРНЕННЯ</div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="info_abouts">
                <div class="info_row">
                    <div class="info-col">
                        <ul>
                            <li><i class='bx bx-package'></i>
                                <div class="info">
                                    <div class="text-h2">Доставка</div>
                                    <p>Новою Поштою в будь-який куточок України 1-3 дні.</p>
                                </div>
                            </li>

                            <li><i class='bx bx-credit-card'></i>
                                <div class="info">
                                    <div class="text-h2">ОПЛАТА</div>
                                    <p>Банківською картою VISA або Master Card на нашому сайті або при отриманні замовлення накладеним платежем.</p>
                                </div>
                            </li>

                            <li><i class='bx bxs-award'></i>
                                <div class="info">
                                    <div class="text-h2">ПЕРЕВІРКА ЯКОСТІ</div>
                                    <p>Отримуючи товар на пошті, ви маєте право перш ніж оплачувати замовлення, приміряти, подивитися і оцінити наскільки якість замовленої продукції влаштовує вас. Чи підходить вам розмір і фасон, чи відповідає вашому очікуванню.</p>
                                </div>
                            </li>

                            <li><i class='bx bx-rotate-left'></i>
                                <div class="info">
                                    <div class="text-h2">ПОВЕРНЕННЯ ОБМІН / ТОВАРУ</div>
                                    <p>Якщо вам не підійшов розмір, колір, або ж ви виявили інші проблеми, впродовж 14 днів після покупки, ви можете повернути нам товар або обміняти на інший.</p>
                                </div>
                            </li>

                        </ul>
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
                            <li class="info_item"><a href="../about/about.html" class="info_link"> Про нас</a></li>
                            <li class="info_item"><a href="./delivery.html" class="info_link"> Доставка, оплата, повернення </a></li>
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