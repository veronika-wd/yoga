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
<style>
    /* Основной контейнер шапки */
    .header-exact {
        position: relative;
        width: 100%;
    }

    /* Коричневая полоса */
    .menu-strip {
        height: 70px; /* Высота полосы */
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: relative;
        z-index: 1; /* Полоса на заднем плане относительно лого */
    }

    /* Меню внутри полосы */
    .menu-strip nav {
        display: flex;
        align-items: center;
        gap: 30px; /* Расстояние между словами */
        white-space: nowrap; /* Запрещаем перенос строк */
    }

    .menu-strip nav a {
        color: #E8DCC5; /* Светло-бежевый цвет текста */
        text-decoration: none;
        font-size: 14px;
        text-transform: uppercase; /* Все буквы заглавные, как на фото */
        letter-spacing: 1px;
        transition: opacity 0.2s;
    }

    .menu-strip nav a:hover {
        opacity: 0.7;
    }

    /* Заглушка под логотип, чтобы раздвинуть текст слева и справа */
    .spacer {
        width: 140px; /* Ширина равна ширине логотипа + небольшие отступы */
        display: inline-block;
    }

    /* ЛОГОТИП - самое главное */
    .logo-overlay {
        position: absolute;
        left: 50%;
        top: 70%; /* Центр по вертикали относительно полосы */
        transform: translate(-50%, -50%); /* Точное центрирование */

        z-index: 10; /* Логотип выше полосы */
    }

    .logo-overlay img {
        width: 80%; /* Размер картинки внутри круга */
        height: auto;
        display: block;
    }

    /* Адаптив для мобильных (упрощенный) */
    @media (max-width: 900px) {
        .menu-strip nav {
            gap: 15px;
            font-size: 12px;
        }
        .spacer {
            width: 100px;
        }
        .logo-overlay {
            width: 100px;
            height: 100px;
        }
    }
</style>
<header class="header-exact">
    <!-- Сплошная коричневая полоса с меню -->
    <div class="menu-strip">
        <nav>
            <a href="{{ route('courses.index') }}">Онлайн-курсы</a>
            <a href="{{ route('practices') }}">Практики</a>
            <a href="{{ route('teachers') }}">Преподаватели</a>

            <!-- Пустой элемент-заглушка для места под логотипом,
                 чтобы текст не прятался под ним полностью, или можно оставить как есть -->
            <span class="spacer"></span>

            <a href="{{ route('events.index') }}">Расписание</a>
            <a href="{{ route('subscriptions') }}">Абонементы</a>

            @auth
                <a href="{{ route('profile') }}">Личный кабинет</a>
            @else
                <a href="{{ route('login.form') }}">Войти</a>
            @endauth
        </nav>
    </div>

    <!-- Логотип, который лежит ПОВЕРХ полосы -->
    <a href="{{ route('home') }}" class="logo-overlay">
        <img src="{{ asset('img/logo.png') }}" alt="Логотип">
    </a>
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
