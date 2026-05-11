<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @stack('styles')

    <title>Главная</title>
</head>

<body>
<header class="header-exact">
    <div class="menu-strip">
        <nav id="main-nav" class="nav-menu">
            <a href="{{ route('courses.index') }}">Онлайн-курсы</a>
            <a href="{{ route('practices') }}">Практики</a>
            <a href="{{ route('teachers') }}">Преподаватели</a>

            <span class="spacer"></span>

            <a href="{{ route('events.index') }}">Расписание</a>
            <a href="{{ route('subscriptions') }}">Абонементы</a>

            @auth
                <a href="{{ route('profile') }}">Личный кабинет</a>
            @else
                <a href="{{ route('login.form') }}">Войти</a>
            @endauth
        </nav>

        <div class="burger-btn" id="burger-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <a href="{{ route('home') }}" class="logo-overlay">
        <img src="{{ asset('img/logo.png') }}" alt="Логотип">
    </a>
</header>
@yield('banner')
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
        <a href="{{ route('admin.applications.index') }}">Админка</a>
    </div>

    <nav>
        <a href="{{ route('teachers') }}">Преподаватели</a>
        <a href="{{ route('practices') }}">Практики</a>
        <a href="{{ route('events.index') }}">Расписание</a>
        <a href="subscription.html">Абонементы</a>
    </nav>

    <div class="contacts">
        <p>Связь с нами <br> <a href="tel:+79258755552">+7 (925) 875-55-52</a></p>

        <div class="social">
            <p>Мы в социальных сетях</p>

            <div>
                <img src="{{ asset('img/icons/youtube.svg') }}" alt="YouTube">
                <img src="{{ asset('img/icons/telegram.png') }}" alt="Telegram">
                <img src="{{ asset('img/icons/instagram.svg') }}" alt="Instagram">
            </div>
        </div>
    </div>
</footer>
@stack('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
