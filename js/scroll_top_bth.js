 // Получаем кнопку "Вверх"
 var scrollToTopBtn = document.getElementById("scroll-to-top-btn");

 // Функция для плавного скроллинга страницы к началу
 function scrollToTop() {
     var currentPosition = document.documentElement.scrollTop || document.body.scrollTop;
     if (currentPosition > 0) {
         window.requestAnimationFrame(scrollToTop);
         window.scrollTo(0, currentPosition - currentPosition / 8);
     }
 }

 // При скроллинге страницы показываем или скрываем кнопку "Вверх"
 window.onscroll = function() {
     var currentPosition = document.documentElement.scrollTop || document.body.scrollTop;
     if (currentPosition > 500) {
         scrollToTopBtn.style.display = "block";
     } else {
         scrollToTopBtn.style.display = "none";
     }
 }

 // При нажатии на кнопку скроллируем страницу вверх с плавной анимацией
 scrollToTopBtn.addEventListener("click", function() {
     scrollToTop();
 });