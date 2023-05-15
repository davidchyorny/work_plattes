<?php
// Подключение к базе данных
include '../inc/config.php';

// Получение email из формы
$email = $_POST["email"];

// Проверка наличия email в базе данных
$sql = "SELECT * FROM user_form WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Генерация случайного пароля
    $password = substr((uniqid(rand(), true)), 0, 5);

    // Отправка email с паролем
    $to = $email;
    $subject = "Восстановление пароля";
    $message = "Запишите свои пароли! <br> 
                Ваш новый пароль: $password ";
    mail($to, $subject, $message);

    // Сохранение пароля в базе данных
    $password = md5($password);
    $sql = "UPDATE user_form SET password = '$password' WHERE email = '$email'";
    mysqli_query($conn, $sql);
}

// Закрытие соединения с базой данных
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Забули пароль?</title>
    <link rel="shortcut icon" href="./../images/favicon/favicon.png" type="image/x-icon">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/css.css">


    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php
    if (isset($message)) {
        echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
    }
    ?>

    <section class="container-form forms">
        <!-- Signup Form -->
        <div class="form_box signup">
            <div class="form-content">
                <div class="form-exit">
                    <div class="closed">
                        <a href="./login.php"><i class='bx bx-x x' alt="closed"></i></a>
                    </div>
                    <div>
                        <header>Забули пароль?</header>
                    </div>
                </div>

                <form action="./change.php" method="post">
                    <div class="field input-field">
                        <input type="email" name="email" id="" placeholder="Email">
                    </div>
                    <div class="field">
                        <input type="submit" name="doGo" value="Надіслати лист" class="button-field bth"></button>
                    </div>
                </form>
            </div>
    </section>
    </div>
    </div>



</body>

</html>