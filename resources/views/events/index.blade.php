@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">--}}
@endpush
@section('content')
    <style>
        .event-card {
            width: 100%;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .card-image-wrapper {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .date-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background-color: #2c241b;
            color: #f5e6d3;
            padding: 12px 16px;
            border-radius: 8px;
            text-align: center;
            min-width: 70px;
        }

        .month {
            display: block;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .day {
            display: block;
            font-size: 32px;
            font-weight: 700;
            line-height: 1;
        }

        .card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c241b;
            margin: 0 0 12px 0;
        }

        .card-instructor,
        .card-price {
            font-size: 16px;
            color: #5a4a3a;
            margin: 0 0 8px 0;
            font-weight: 500;
        }

        .card-duration {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            font-size: 16px;
            color: #2c241b;
            font-weight: 600;
        }

        .clock-icon {
            width: 20px;
            height: 20px;
            color: #2c241b;
        }

        /* Адаптивность */
        @media (max-width: 480px) {
            .event-card {
                width: 100%;
                max-width: 320px;
            }

            .card-image-wrapper {
                height: 240px;
            }

            .card-title {
                font-size: 20px;
            }
        }
    </style>
    <h2 class="mt-4">Предстоящие события</h2>


    <div class="row g-3 mb-3 p-2">
        @foreach($events as $event)
            <div class="col-sm-12 col-lg-3">
                <div class="event-card h-100">
                    <div class="card-image-wrapper">
                        <img src="{{ Storage::url($event->image) }}" alt="Звукопозитивная терапия" class="card-image">
                        <div class="date-badge">
                            <span class="month">{{ Str::upper($event->datetime->translatedFormat('M'))  }}</span>
                            <span class="day">{{ date_format($event->datetime, 'd') }}</span>
                        </div>
                    </div>
                    <div class="card-content h-50">
                        <h3 class="card-title">{{ Str::limit($event->name, 20) }}</h3>
                        <p class="card-instructor">{{ $event->teacher->name }}</p>
                        <p class="card-price">{{ $event->price }}</p>
                        <div class="card-duration">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                            <span>{{ $event->time }} минут</span>
                        </div>
                        <a href="{{ route('events.show', $event) }}" class="btn-enroll text-center w-100 mt-1 mb-2">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <form class="start" id="startForm" action="{{ route('calls.store') }}" method="post">
        @csrf
        <div class="header">
            <h2>Не знаете, с чего начать?</h2>
            <p>Заполните форму ниже, мы свяжемся с Вами и поможем подобрать направление</p>
        </div>

        <div class="fields">
            <input type="text" name="name" id="name" placeholder="Имя">
            <input type="tel" name="phone" id="phone" placeholder="Номер телефона">
            <button type="submit" class="btn">Отправить</button>
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
@endsection
