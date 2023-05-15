// Получение ссылок на элементы модального окна
var modal = document.getElementById("searchModal");
var btn = document.getElementById("searchButton");
var span = document.getElementsByClassName("close")[0];

// Открытие модального окна при клике на кнопку
btn.onclick = function () {
  modal.style.display = "block";
};

// Закрытие модального окна при клике на крестик
span.onclick = function () {
  modal.style.display = "none";
};

// Закрытие модального окна при клике вне его области
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};