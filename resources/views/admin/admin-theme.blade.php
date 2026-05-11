<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
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
<main class="container">
    <div class="viro">
        <div class="dashboard">
            <aside class="sidebar">
                <h2>Меню</h2>
                <ul class="nav">
                    <li><a href="{{ route('admin.applications.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            Записи</a></li>
                    <li><a href="{{ route('admin.subscriptions.index') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M3 13h1v7H3v-7zm0-8h1v5H3V5zm4 0h1v12H7V5zm4 0h1v12h-1V5zm4 0h1v12h-1V5zm4 0h1v7h-1V5zm0 10h1v2h-1v-2z"/>
                            </svg>
                            Абонементы</a></li>
                    <li><a href="{{ route('admin.events.index') }}">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Практики</a></li>
                    <li><a href="{{ route('admin.teachers.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                            </svg>
                            Преподаватели</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg>
                            Онлайн-курсы</a></li>
                    <li><a href="{{ route('admin.calls.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            Звонки</a></li>
                </ul>
            </aside>
            <section class="content">
                @yield('content')
            </section>
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
        <a href="{{ route('admin.applications.index') }}">Админка</a>
    </div>

    <nav>
        <a href="{{ route('teachers') }}">Преподаватели</a>
        <a href="{{ route('practices') }}">Практики</a>
        <a href="{{ route('events.index') }}">Расписание</a>
        <a href="{{ route('subscriptions') }}">Абонементы</a>
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
