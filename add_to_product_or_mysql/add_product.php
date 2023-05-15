<?php
// Обработка отправки формы
if (isset($_POST['submit'])) {
  // Проверка заполнения полей
  if (!empty($_POST['name']) && !empty($_POST['availability']) && !empty($_POST['product_code']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['price'])) {
    
    // Получение данных из формы
    $name = $_POST['name'];
    $availability = $_POST['availability'];
    $product_code = $_POST['product_code'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $price_old = $_POST['price_old'];
    
    // Подключение к базе данных
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'shop_db';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
    if (!$conn) {
      die('Ошибка подключения: ' . mysqli_connect_error());
    }
    
    // Создание SQL-запроса
    $sql = "INSERT INTO shirt (name, availability, product_code, content, image, price )
            VALUES ('$name', '$availability', '$product_code', '$content', '$image', '$price')";
    
    // Выполнение запроса
    if (mysqli_query($conn, $sql)) {
      echo "Товар успешно добавлен!";
    } else {
      echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Закрытие соединения с базой данных
    mysqli_close($conn);
    
  } else {
    echo "Заполните все поля!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Добавить товар</title>
</head>
<body>

  <h2>Добавить товар</h2>

  <form method="post">
    <label for="name">Название:</label>
    <input type="text" name="name" id="name" value="Футболка plattes oversize"><br><br>
    <label for="availability">Наличие:</label>
    <input type="text" name="availability" id="randomNumberField"><br><br>
    <label for="product_code">Код товара:</label>
    <input type="text" name="product_code" id="product_code" value="SH-000000"><br><br>
    <label for="content">Описание:</label>
    <input type="text" name="content" id="content" value="Plattes x Saga4 art — спільна колекція футболок з Українським ілюстратором та автором марки «Херсон — це Україна» Андрієм Сагачем. На виробах зображені постери автора, які символізують сучасну Україну.
До кожної речі у подарунок додається стікерпак з усіма ілюстраціями колекції.
Частина прибутку з продажу буде перерахована на покупку авто для військових, звіт — у нашому телеграм-каналі."><br><br>
    <label for="image">Изображение:</label>
    <input type="text" name="image" id="image" value="shirt_oversize_.jpeg"><br><br>
    <label for="price">Цена:</label>
    <input type="text" name="price" id="randomNumber" value="0" ><br><br>
    <input type="submit" name="submit" value="Добавить товар">
  </form>
    <button onclick="generateRandomNumber(); randomNumber()">Сгенерировать случайное число</button>

</body>
</html>


	<script>
		function generateRandomNumber() {
			// Генерация случайного числа
			var randomNumber = Math.floor(Math.random() * 100) + 1;
			// Запись сгенерированного числа в поле input text
			document.getElementById("randomNumberField").value = randomNumber;
		}
		function randomNumber() {
			// Генерация случайного числа
			var randomNumber = Math.floor(Math.random() * 600) + 400;
			// Запись сгенерированного числа в поле input text
			document.getElementById("randomNumber").value = randomNumber;
		}
	</script>

