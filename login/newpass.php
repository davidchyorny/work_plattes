<?php

session_start();
include '../inc/config.php';

require_once('../password_compat/lib/password.php');



// Получаем текущий пароль пользователя из базы данных
// Обрабатываем данные из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // echo $user_id;

    // Получаем текущий пароль пользователя из базы данных
    $query = "SELECT password FROM user_form WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];




    if (empty($new_password) || empty($confirm_password)) {
        $message[] = "Будь ласка, заповніть усі обов'язкові поля.";
    }

    // Проверяем, совпадают ли новый пароль и подтверждение пароля
    elseif ($new_password !== $confirm_password) {
        $message[] = "Новый пароль и подтверждение пароля не совпадают";
    }

    // Хешируем новый пароль и обновляем его в базе данных
    elseif (!isset($message)) {
        $new_password_hashed = md5($new_password);
        $update_query = "UPDATE user_form SET password = '$new_password_hashed' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
        $success[] = "Пароль успешно изменен";
        ?>
        <script>
        setTimeout(function() {
            window.location.href = "../profile/profile.php";
        }, 3000);
    </script>
    <?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новий пароль</title>
    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../assets/css/register/register.css">


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

    <section class="container-form forms">
        <!-- Signup Form -->
        <div class="form_box ">
            <div class="form-content">
                <div class="form-exit">
                    <div class="closed">
                        <a href="../profile/profile.php" onclick="show('none')"><i class='bx bx-x x' alt="closed"></i></a>
                    </div>
                    <div>
                        <header>Новий пароль</header>
                    </div>

                </div>

                <form action="" method="post">
                    <div class="field input-field">
                        <input type="password" id="new_password" name="new_password" placeholder="Пароль" class="password">
                    </div>
                    <div class="field input-field">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Подтвердите новый пароль" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field ">
                        <a href="../profile/profile.php"></a><input type="submit" name="submit" value="Сменить пароль" class="button-field bth" value="login now">
                    </div>
                </form>
            </div>
    </section>
    </div>
    </div>
    <script src="../assets/js/modal_login.js"></script>


</body>

</html>