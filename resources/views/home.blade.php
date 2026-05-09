@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
    <div class="row g-4 align-items-center mt-4 mb-4">
        <div class="col-sm-12 col-lg-6">
            <div class="img-container">
                <img src="{{ asset('img/studio.png') }}" alt="Студия" class="rounded-50">
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
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
            <p><span>Наша миссия</span></p>

            <p>
                В GongYoga мы стремимся создать пространство, где каждый может найти свой путь к
                самопознанию и
                самосовершенствованию.
            </p>
        </div>

        <div class="col-sm-12 col-lg-6">
            <h2>О преподавателях</h2>

            <p>
                В GongYoga мы гордимся нашей командой высококвалифицированных и опытных преподавателей, каждый
                из которых привносит уникальный подход и глубокие знания в практику кундалини йоги и
                звукотерапии. Наша цель — создать поддерживающую и вдохновляющую атмосферу, где каждый ученик
                может раскрыть свой потенциал и найти свой путь к гармонии.
            </p>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="img-container">
                <img src="img/teachers.png" alt="Преподаватели">
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="img-container">
                <img src="img/practices.png" alt="Практики">
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
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
        @if($reviews->count() > 0)
            <div class="reviews__list">
                @foreach($reviews as $review)
                    <div class="reviews__item">
                        <div class="reviews__header">
                            <h3 class="reviews__author">{{ $review->name }}</h3>
                            <div class="reviews__rating-value">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <span class="star">★</span>
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    <span class="star" style="color: #ddd;">★</span>
                                @endfor
                                <span>({{ $review->rating }}/5)</span>
                            </div>
                        </div>
                        <p class="reviews__text">{{ $review->review }}</p>
                        <p class="reviews__text mt-2">{{ date_format($review->created_at, 'd/m/y') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="reviews__empty">
                Пока нет отзывов. Будьте первым!
            </div>
        @endif
    </section>

    <section class="feedback mb-5">
        <h2 class="col-12 text-center">Оставить отзыв</h2>
        <form action="{{ route('review.store') }}" method="post" class="row">
            @csrf
            <div class="input-field col-12">
                <input type="text" id="name" name="name" placeholder=" " class="w-100 rounded-5 px-4" required/>
                <label for="name">Ваше имя</label>
            </div>
            <div class="reviews__rating">
                <span class="reviews__rating-label">Ваша оценка:</span>
                <div class="reviews__rating-stars">
                    <div class="reviews__rating-star">
                        <input type="radio" name="rating" id="star5" value="5" required>
                        <label for="star5">★</label>
                    </div>
                    <div class="reviews__rating-star">
                        <input type="radio" name="rating" id="star4" value="4">
                        <label for="star4">★</label>
                    </div>
                    <div class="reviews__rating-star">
                        <input type="radio" name="rating" id="star3" value="3">
                        <label for="star3">★</label>
                    </div>
                    <div class="reviews__rating-star">
                        <input type="radio" name="rating" id="star2" value="2">
                        <label for="star2">★</label>
                    </div>
                    <div class="reviews__rating-star">
                        <input type="radio" name="rating" id="star1" value="1">
                        <label for="star1">★</label>
                    </div>
                </div>
            </div>
            <div class="input-field col-12">
                <textarea id="description" name="review" rows="3" placeholder=" "></textarea>
                <label for="description">Описание</label>
            </div>
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
@push('scripts')
    <script>
        document.querySelectorAll('.reviews__rating-star input').forEach(star => {
            star.addEventListener('change', function () {
                const value = parseInt(this.value);
                const stars = this.closest('.reviews__rating-stars').querySelectorAll('.reviews__rating-star label');

                stars.forEach((starLabel, index) => {
                    const starValue = 5 - index;
                    if (starValue <= value) {
                        starLabel.style.color = '#ffc107';
                    } else {
                        starLabel.style.color = '#ddd';
                    }
                });
            });
        });
    </script>
@endpush
