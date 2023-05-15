<?php

include '../inc/config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $pass_admin = mysqli_real_escape_string($conn, ($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        $success[] = "Вхід успішний.";
        if ($email == 'admin@gmail.com') {
            ?>
            <script>
                setTimeout(function() {
                    window.location.href = "../admin/admin.php";
                }, 2000);
            </script>
            <?php
        } else {
            ?>
            <script>
                setTimeout(function() {
                    window.location.href = "../client/client.php";
                }, 2000);
            </script>
            <?php
        }
    } else {
        $message[] = 'Неверный пароль или электронная почта!';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логiн</title>
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
        <div class="form_box">
            <div class="form-content">
                <div class="form-exit">
                    <div class="closed">
                        <a href="../index.php" onclick="show('none')"><i class='bx bx-x x' alt="closed"></i></a>
                    </div>
                    <div>
                        <header>Логін</header>
                    </div>

                </div>

                <form action="" method="post" class="form_login">

                    <div class="field input-field">
                        <input type="email" name="email" id="" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" id="" placeholder="Password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="change.php" class="forgot-pass">Забули пароль?</a>
                    </div>

                    <div class="field ">
                        <input type="submit" name="submit" value="Логiн" class="button-field bth" value="login now">
                    </div>
                </form>
                <div class="form-link">
                    <span>Немає облікового запису? <a href="./register.php">Реєстрація</a></span>
                </div>
            </div>
    </section>
    </div>
    </div>
    <script src="../assets/js/modal_login.js"></script>


</body>

</html>