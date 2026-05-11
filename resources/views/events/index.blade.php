@extends('theme')
@section('content')
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
