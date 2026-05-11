@extends('theme')
@push('styles')
    <style>
        :root {
            --color-primary: #8b7355;
            --color-secondary: #a89080;
            --color-text-dark: #4a4a48;
            --color-text-light: #6b6b6b;
            --color-bg: #faf9f7;
            --color-border: #e8e4dc;
            --color-cream: #f5f1e8;
        }

        .event-show {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .event-show .row {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        /* Левая колонка с информацией */
        .event-show .col-lg-6:first-child {
            flex: 1;
        }

        .event-show h1 {
            font-size: 42px;
            font-weight: 300;
            color: var(--color-text-dark);
            margin-bottom: 24px;
            letter-spacing: 1px;
            line-height: 1.3;
        }

        .event-show .description {
            font-size: 16px;
            line-height: 1.8;
            color: var(--color-text-light);
            margin-bottom: 40px;
            font-weight: 300;
            word-break: break-all;
        }

        /* Список информации */
        .event-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .event-detail-item {
            display: flex;
            align-items: baseline;
            gap: 12px;
            font-size: 15px;
        }

        .event-detail-item b {
            font-weight: 500;
            color: var(--color-primary);
            min-width: 160px;
            font-weight: 400;
        }

        .event-detail-item {
            color: var(--color-text-dark);
            font-weight: 300;
        }

        /* Кнопка записи */
        .event-actions {
            margin-top: 40px;
        }

        .btn{
            width: 200px;

        }

        .btn-enroll {
            display: inline-block;
            padding: 16px 48px;
            background: var(--color-primary);
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-enroll:hover {
            background: var(--color-secondary);
            transform: translateY(-2px);
        }

        /* Правая колонка с изображением */
        .event-show .col-lg-6:last-child {
            flex: 1;
        }

        .event-show img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Адаптивность */
        @media (max-width: 992px) {
            .event-show .row {
                flex-direction: column;
                gap: 40px;
            }

            .event-show h1 {
                font-size: 32px;
            }

            .event-detail-item b {
                min-width: 140px;
            }
        }

        @media (max-width: 576px) {
            .event-show {
                padding: 40px 16px;
            }

            .event-show h1 {
                font-size: 28px;
            }

            .event-detail-item {
                flex-direction: column;
                gap: 4px;
            }

            .event-detail-item b {
                min-width: auto;
            }
        }
    </style>
@endpush

@section('content')
    <div class="event-show">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <h1>{{ $event->name }}</h1>
                <p class="description">{{ $event->description }}</p>

                <div class="event-details">
                    <div class="event-detail-item">
                        <b>Преподаватель:</b>
                        <span>{{ $event->teacher->name }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Продолжительность:</b>
                        <span>{{ $event->time }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Дата проведения:</b>
                        <span>{{ $event->datetime }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Цена:</b>
                        <span>{{ $event->price }} ₽</span>
                    </div>
                </div>

                <div class="event-actions">
                    <form action="{{ route('events.application', $event) }}" method="post">
                        @csrf
                        <button type="submit" class="btn-enroll">Записаться</button>
                        @error('alreadyApplied')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 border-box h-100">
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->name }}">
            </div>
        </div>
    </div>
@endsection
