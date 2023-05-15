<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://i.ibb.co/GP3dyzw/IMG-6199.jpg">
  <title>Frontend-кейс</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <!-- Шапка -->
      <div class="logo">
        <span>Frontend</span>
        <span>Кейс</span>
      </div>

      <!-- Меню сайта -->
      <nav class="nav">
        <ul>
          <li>Главная</li>
          <li>Каталог работ</li>
          <li>Услуги</li>
          <li>Галерея</li>
          <li>Отзывы</li>
          <li>Контакты</li>
        </ul>
      </nav>

      <!-- Иконка бургерменю -->
      <div class="burger">
        <span></span>
      </div>
    </header>
  </div>
  <footer style="text-align: center; padding: 10px 0;">
    Подключайся к нам в телеграмм <a target="_blank" href="https://t.me/frontend_case">@frontend_case</a>.
    Помощь новичкам!
    Будем развиваться во фронтенд разработке вместе :)
  </footer>
  <script>
    document.querySelector('.burger').addEventListener('click', function() {
      this.classList.toggle('active');
      document.querySelector('.nav').classList.toggle('open');
    })
  </script>
</body>

</html>

<style>

  .open {
    display: flex !important;
  }

  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 100px;
    background-color: #3E424B;
    color: #FAF6F2;
    padding: 0 40px;
  }

  .logo {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border-radius: 50%;
    border: 1px solid #FAF6F2;
    width: 90px;
    height: 90px;
  }

  .nav {
    display: flex;
    width: 700px;
    padding: 0 40px;
  }

  .nav ul {
    width: 100%;
    list-style: none;
    display: flex;
    justify-content: space-between;
  }

  .burger {
    display: none;
    position: relative;
    z-index: 50;
    align-items: center;
    justify-content: flex-end;
    width: 30px;
    height: 18px;
  }

  .burger span {
    height: 2px;
    width: 80%;
    transform: scale(1);
    background-color: #FAF6F2;
  }

  .burger::before,
  .burger::after {
    content: '';
    position: absolute;
    height: 2px;
    width: 100%;
    background-color: #FAF6F2;
    transition: all 0.3s ease 0s;
  }

  .burger::before {
    top: 0
  }

  .burger::after {
    bottom: 0
  }


  /* Добавляем класс active для анимации иконки бургера */
  .burger.active span {
    transform: scale(0)
  }

  .burger.active::before {
    top: 50%;
    transform: rotate(-45deg) translate(0, -50%);
  }

  .burger.active::after {
    bottom: 50%;
    transform: rotate(45deg) translate(0, 50%);
  }


  /* При разрешении экрана 900px и ниже, выводим на экран иконку бургера */
  @media (max-width: 900px) {

    .burger {
      display: flex
    }

    .nav {
      display: none;
      flex-direction: column;
      position: fixed;
      height: 100%;
      width: 100%;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 50;
      overflow-y: auto;
      padding: 50px 40px;
      background-color: black;
      animation: burgerAnimation 0.4s;
    }

    .nav ul {
      flex-direction: column;
      row-gap: 30px;
    }
  }

  @keyframes burgerAnimation {
    from {
      opacity: 0
    }

    to {
      opacity: 1
    }
  }
</style>