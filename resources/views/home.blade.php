@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endpush
@section('content')
<section class="banner">
    <h1>
        <span class="text-shadow">GONG YOGA</span>
        <span class="text-gradient">GONG YOGA</span>
    </h1>

    <p>Чистота разума, гибкость тела, внутренняя гармония</p>
    <a href="{{ route('events.index') }}" class="btn">Записаться</a>
</section>

<main class="container">
    <section class="about">
        <div class="studio about-item">
            <div class="img-container">
                <img src="img/studio.png" alt="Студия">
            </div>

            <div class="content">
                <div>
                    <h2>О студии</h2>

                    <p>
                        Добро пожаловать в GongYoga — уникальную студию кундалини йоги, где гармония тела и духа
                        достигается
                        через практику йоги и звукотерапию. Наша студия предлагает вам возможность погрузиться в мир
                        глубокого расслабления и внутренней гармонии с помощью мощных инструментов, таких как гонги
                        и
                        поющие
                        чаши.
                    </p>
                </div>

                <div class="mission">
                    <p><span>Наша миссия</span></p>

                    <p>
                        В GongYoga мы стремимся создать пространство, где каждый может найти свой путь к
                        самопознанию и
                        самосовершенствованию.
                    </p>
                </div>
            </div>
        </div>

        <div class="about-item">
            <div class="img-container">
                <img src="img/teachers.png" alt="Преподаватели">
            </div>

            <div class="content">
                <h2>О преподавателях</h2>

                <p>
                    В GongYoga мы гордимся нашей командой высококвалифицированных и опытных преподавателей, каждый
                    из которых привносит уникальный подход и глубокие знания в практику кундалини йоги и
                    звукотерапии. Наша цель — создать поддерживающую и вдохновляющую атмосферу, где каждый ученик
                    может раскрыть свой потенциал и найти свой путь к гармонии.
                </p>
            </div>
        </div>

        <div class="about-item">
            <div class="img-container">
                <img src="img/practices.png" alt="Практики">
            </div>

            <div class="content">
                <h2>О практиках</h2>

                <p>
                    В GongYoga мы предлагаем разнообразные практики, которые помогают нашим ученикам развивать
                    физическую силу, эмоциональную устойчивость и духовное осознание. Каждая практика направлена на
                    то,
                    чтобы углубить понимание себя и своих потребностей, а также создать пространство для личностного
                    роста и внутренней гармонии.
                </p>
            </div>
        </div>
    </section>

    <form class="start" id="startForm">
        <div class="header">
            <h2>Не знаете, с чего начать?</h2>
            <p>Заполните форму ниже, мы свяжемся с Вами и поможем подобрать направление</p>
        </div>

        <div class="fields">
            <input type="text" name="name" id="name" placeholder="Имя">
            <input type="tel" name="phone_number" id="phone_number" placeholder="Номер телефона">
            <button type="submit" class="btn" id="btn">Отправить</button>
        </div>
    </form>

    <div id="modal">
        <div id="window">
            <img src="img/icons/Checkmark.png" alt="checkmark" id="checkmark">
            <p class="p_modal">Ваш запрос принят!</p>
            <p class="p_modal">Наш администратор свяжется с вами</p>
            <button id="closeModal">Закрыть</button>
        </div>
    </div>
    <section class="reviews">
        <h2>Что о нас говорят клиенты?</h2>

        <div class="reviews-wrapper">
            <div class="review-item">
                <div class="content">
                    <div class="rating">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                    </div>

                    <h3>Анастасия</h3>
                    <p>Все очень понравилось, благодарю за занятие</p>
                    <p>21.04.2025</p>
                </div>
            </div>

            <div class="review-item">
                <div class="content">
                    <div class="rating">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                    </div>

                    <h3>Евгений</h3>
                    <p>Все очень понравилось, благодарю за занятие</p>
                    <p>21.04.2025</p>
                </div>
            </div>

            <div class="review-item">
                <div class="content">
                    <div class="rating">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                        <img src="img/icons/star.svg" alt="Звезда">
                    </div>

                    <h3>София</h3>
                    <p>Все очень понравилось, благодарю за занятие</p>
                    <p>21.04.2025</p>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <h2>Оставить отзыв</h2>

        <form>
            <textarea name="text" id="text" placeholder="Как вы можете оценить занятие ?"></textarea>
            <button type="submit" class="btn">Отправить</button>
        </form>
    </section>

    <section class="location">
        <h2>Как нас найти?</h2>
        <p>г.Абакан ул.Крылова,112</p>
        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A33dbf5cd71623f96c2d4bd6b5b3b1c54c5c13b02092f247baabe6d78c26ca2e6&amp;width=100%25&amp;height=530&amp;lang=ru_RU&amp;scroll=true"></script>
    </section>
@endsection

