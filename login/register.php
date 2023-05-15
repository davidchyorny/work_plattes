<?php


include '../inc/config.php';


if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "SELECT email FROM user_form WHERE email = '{$email}'";
    $result = mysqli_query($conn, $sql);
    // echo strlen($pass) . "<br>";
    // echo ($select);

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    // Проверяем, есть ли пользователя в сервере
    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Користувач уже існує!';
    }

    // Проверяем, заполнены ли оба поля
    elseif (empty($name) || empty($email)) {
        $message[] = "Будь ласка, заповніть усі обов'язкові поля.";
    }

    // Проверяем, есть ли email
    elseif (mysqli_num_rows($result) > 0) {
        $message[] = 'У вас уже є обліковий запис з цією електронною адресою.';
        $password_reset[] = "Якщо ви впевнені, що це ваша електронна адреса, <a href='change.php?'>натисніть тут</a> , щоб отримати пароль і отримати доступ до свого облікового запису.";
    }


    // Проверяем, заполнены ли оба пароля
    elseif (empty($password) || empty($cpassword)) {
        $message[] = 'Будь ласка, введіть обидва паролі.';
    }

    // Проверяем, совпадают ли пароль и его подтверждение
    elseif ($password !== $cpassword) {
        $message[] = 'Пароль і підтвердження пароля не збігаються.';
    } else {
        mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
        $success[] = 'Успішно зареєстрований!';
?>
        <script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000);
        </script>
<?php
    }
}


mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.png" type="image/x-icon">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/css.css">


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
        <div class="form_box signup">
            <div class="form-content">
                <div class="form-exit">
                    <div class="closed">
                        <a href="../index.php" onclick="show('none')"><i class='bx bx-x x' alt="closed"></i></a>
                    </div>
                    <div>
                        <header>Реєстрація</header>
                    </div>
                </div>

                <form action="" method="post">
                    <?php
                    if (isset($password_reset)) {
                        foreach ($password_reset as $password_reset) {
                            echo '<div class="password_reset" onclick="this.remove();">' . $password_reset . '</div>';
                        }
                    }
                    ?>
                    <div class="field input-field">
                        <input type="name" name="name" id="<?php echo $error_name ?>" placeholder="Name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                    </div>
                    <div class="field input-field">
                        <input type="email" name="email" id="<?php echo $error_email ?>" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" id="<?php echo $error_pass ?>" placeholder="Password" class="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="cpassword" id="<?php echo $error_cpass ?>" placeholder="Password" class="password" value="<?php if (isset($_POST['cpassword'])) echo $_POST['cpassword']; ?>">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field">
                        <input type="submit" name="submit" value="Реєстрація" class="button-field bth">
                    </div>
                </form>
                <div class="form-link">
                    <span>Вже є аккаунт? <a href="./login.php">Логін</a></span>
                </div>
            </div>
    </section>
    </div>
    </div>




    <script src="../assets/js/modal_login.js"></script>



</body>

</html>