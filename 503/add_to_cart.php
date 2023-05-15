<?php
session_start();

if (!isset($_SESSION['user_id'])) { // проверяем, зарегистрирован ли пользователь
  // пользователь не зарегистрирован, показываем модальное окно
  echo '<script>openModal();</script>';
} else {
  // пользователь зарегистрирован, добавляем товар в корзину
  // код для добавления товара в корзину
}
?>
<!-- кнопка для открытия модального окна -->
<button onclick="openModal()">Предупреждение</button>

<!-- модальное окно -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <p>Нужно зарегистрироваться!</p>
  </div>
</div>
<style>
    /* Стили для модального окна */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

<script>
    // функция для открытия модального окна
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// функция для закрытия модального окна
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

</script>

