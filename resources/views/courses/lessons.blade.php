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

        .detail-item a{
            color: var(--color-text-dark);

            word-break: break-all;
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
    <div class="row mt-5">
        <div class="col-12">
            <div class="navbar-scroll-container">
                @foreach($lessons as $index => $lesson)
                    <a href="#{{ $index + 1 }}" class="btn-secondary nav-btn">{{ $lesson->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    @foreach($lessons as $index => $lesson)
    <div class="course-show" id="{{ $index + 1 }}">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ $lesson->name }}</h2>

        </div>
        <p class="course-description">{{ $lesson->content }}</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Ссылка на уроки:</b>
                <a target="_blank" href="{{ $lesson->url }}">{{ $lesson->url }}</a>
            </div>
        </div>
    </div>
    @endforeach

@endsection
