@extends('theme')
@push('styles')
    <style>
        :root {
            --color-primary: #8b7355;
            --color-secondary: #a89080;
            --color-text-dark: #4a4a48;
            --color-bg: #faf9f7;
        }

        .course-show {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .course-description {
            font-size: 20px;
            line-height: 1.8;
            color: #6b6b6b;
            margin-bottom: 40px;
            font-weight: 300;
            word-break: break-all;
        }

        .course-details {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
        }

        .detail-item {
            display: flex;
            gap: 12px;
            font-size: 20px;
            color: var(--color-text-dark);
        }

        .detail-item b {
            font-weight: 400;
            color: var(--color-primary);
            min-width: 160px;
        }

        .btn-secondary {
            display: inline-block;
            padding: 16px 48px;
            background: #ac9069;
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
            border-radius: 50px;
            /* Кнопки не сжимаются */
            flex-shrink: 0;

            /* Минимальная ширина, чтобы гарантировать скролл при большом количестве */
            min-width: 120px;
        }

        .btn-secondary:hover {
            background: var(--color-secondary);
        }
        .navbar-scroll-container {
             /* Включаем горизонтальный скролл */
             overflow-x: auto;
             overflow-y: hidden;

             /* Запрещаем перенос строк */
             white-space: nowrap;

             /* Используем flex для выравнивания */
             display: flex;
             gap: 8px; /* Расстояние между кнопками */

             /* Плавная прокрутка на мобильных */
             -webkit-overflow-scrolling: touch;

             /* Опционально: максимальная ширина, чтобы вызвать скролл даже на больших экранах */
             /* max-width: 100%; — по умолчанию */

             /* Скрываем стандартные стили navbar, если они мешают */
             padding: 10px 0;
         }

        /* Стилизация скроллбара (опционально) */
        .navbar-scroll-container::-webkit-scrollbar {
            height: 6px;
        }
        .navbar-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .navbar-scroll-container::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }
        .navbar-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-10">
            <div class="navbar-scroll-container">
                <a href="#1" class="btn-secondary nav-btn">Занятие 1</a>
                <a href="#2" class="btn-secondary nav-btn">Занятие 2</a>
                <a href="#3" class="btn-secondary nav-btn">Занятие 3</a>
                <a href="#4" class="btn-secondary nav-btn">Занятие 4</a>
                <a href="#5" class="btn-secondary nav-btn">Занятие 5</a>
                <a href="#6" class="btn-secondary nav-btn">Занятие 6</a>
                <a href="#7" class="btn-secondary nav-btn">Занятие 7</a>
                <a href="#8" class="btn-secondary nav-btn">Занятие 8</a>
            </div>
        </div>
        <div class="col-sm-12 col-lg-2">
            <a href="#" class="btn-enroll">Все видео</a>
        </div>
    </div>

    <div class="course-show" id="1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 1</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="2">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 2</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 3</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 4</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 5</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 6</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="7">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 7</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
    <div class="course-show" id="8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Занятие 8</h2>

        </div>
        <p class="course-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur, cum
            eligendi enim facilis nam perferendis quis tempore unde voluptates. Ab amet aperiam, at itaque natus nisi
            quis sapiente ut!</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылки на уроки:</b>
                <span>http://ya.ru</span>
            </div>
        </div>
    </div>
@endsection
