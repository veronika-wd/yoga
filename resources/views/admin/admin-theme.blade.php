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
    <div class="viro">
        <div class="dashboard">
            <aside class="sidebar">
                <h2>Меню</h2>
                <ul class="nav">
                    <li><a href="{{ route('admin.subscriptions') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M3 13h1v7H3v-7zm0-8h1v5H3V5zm4 0h1v12H7V5zm4 0h1v12h-1V5zm4 0h1v12h-1V5zm4 0h1v7h-1V5zm0 10h1v2h-1v-2z"/>
                            </svg>
                            Абонементы</a></li>
                    <li><a href="{{ route('admin.events') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Практики</a></li>
                    <li><a href="{{ route('admin.applications') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.501 0-4.88-.83-6.75-2.24l1.22-1.22c1.61 1.06 3.69 1.67 5.53 1.67s3.92-.61 5.53-1.67l1.22 1.22C16.88 17.37 14.5 18.2 12 18.2z"/>
                            </svg>
                            Записи</a></li>
                    <li><a href="{{ route('admin.teachers') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.501 0-4.88-.83-6.75-2.24l1.22-1.22c1.61 1.06 3.69 1.67 5.53 1.67s3.92-.61 5.53-1.67l1.22 1.22C16.88 17.37 14.5 18.2 12 18.2z"/>
                            </svg>
                            Преподаватели</a></li>
                    <li><a href="{{ route('admin.courses') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.501 0-4.88-.83-6.75-2.24l1.22-1.22c1.61 1.06 3.69 1.67 5.53 1.67s3.92-.61 5.53-1.67l1.22 1.22C16.88 17.37 14.5 18.2 12 18.2z"/>
                            </svg>
                            Онлайн-курсы</a></li>
                </ul>
            </aside>
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>
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
