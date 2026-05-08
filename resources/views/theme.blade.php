<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @stack('styles')

    <title>Главная</title>
</head>

<body>

<header>
    <div class="header-wrapper">
        <nav>
            <div>
                <a href="{{ route('practices.index') }}">Практики</a>
                <a href="{{ route('events.index') }}">Расписание</a>
                <a href="{{ route('courses.index') }}">Онлайн-курсы</a>
            </div>

            <div>
                <a href="{{ route('teachers.index') }}">Преподаватели</a>
                <a href="subscription.html">Абонементы</a>
{{--                @auth--}}
{{--                    <a href="{{ route('profile') }}">Личный кабинет</a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login.form') }}">Войти</a>--}}
{{--                @endauth--}}
            </div>
        </nav>
    </div>

    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Логотип">
    </a>

    <img src="img/icons/menu.png" alt="Меню" id="burger-menu">
</header>
<main class="container">
    @yield('content')
</main>
<footer>
    <div>
        <a href="{{ route('home') }}" class="header">
            <h1>GONG YOGA</h1>
            <p>йога & звукотерапия</p>
        </a>

        <a href="#">Политика конфиденциальности</a>
        <a href="#">Пользовательское соглашение</a>
        <a href="admin/admin_passes.html">Админка</a>
    </div>

    <nav>
        <a href="{{ route('teachers.index') }}">Преподаватели</a>
        <a href="{{ route('practices.index') }}">Практики</a>
        <a href="{{ route('events.index') }}">Расписание</a>
        <a href="subscription.html">Абонементы</a>
    </nav>

    <div class="contacts">
        <p>Связь с нами <br> <a href="tel:+79258755552">+7 (925) 875-55-52</a></p>

        <div class="social">
            <p>Мы в социальных сетях</p>

            <div>
                <img src="img/icons/youtube.svg" alt="YouTube">
                <img src="img/icons/telegram.png" alt="Telegram">
                <img src="img/icons/instagram.svg" alt="Instagram">
            </div>
        </div>
    </div>
</footer>
@stack('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
