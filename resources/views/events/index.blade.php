@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endpush
@section('content')
    <h1>Предстоящие события</h1>

    <section class="subscription">
        <div class="blocks_subscription">

            @foreach($events as $event)
            <div class="block_subscription">
                <div class="img-container">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($event->image) }}" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>{{ $event->name }}</h3>
                    <p>{{ $event->teacher->name }}</p>
                    <p>{{ $event->price }}</p>
                    <p><img src="img/icons/clock.png" alt="Часы">{{ $event->time }} минут</p>
                    <a href="{{ route('events.show', $event) }}" class="btn">Подробнее</a>
                </div>

                <div class="date">
                    <p>{{ Str::upper($event->datetime->translatedFormat('M'))  }}</p>
                    <p>{{ date_format($event->datetime, 'd') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

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
