document.addEventListener('DOMContentLoaded', function () {
    const burger = document.getElementById('burger-toggle');
    const nav = document.getElementById('main-nav');

    if (burger && nav) {
        burger.addEventListener('click', function () {
            // ПЕРЕКЛЮЧАЕМ КЛАСС active ДЛЯ МЕНЮ
            nav.classList.toggle('active');

            // ПЕРЕКЛЮЧАЕМ КЛАСС open ДЛЯ АНИМАЦИИ БУРГЕРА
            burger.classList.toggle('open');
        });
    }
});
