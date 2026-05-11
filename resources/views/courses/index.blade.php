@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endpush
@section('content')
    <h2 class="mb-4 mt-4">Онлайн-курсы</h2>

    <div class="row g-3 px-3 mb-3">
        @foreach($courses as $course)
            <div class="col-sm-12 col-lg-3">
                <div class="course-card h-100">
                    <h3 class="course-title">{{ $course->name }}</h3>

                    @if($course->description)
                        <p class="course-description">
                            {{ Str::limit($course->description, 100) }}
                        </p>
                    @endif

                    <div class="course-meta">
                        <span class="course-price">{{ number_format($course->price, 0, '.', ' ') }} ₽</span>
                    </div>

                    <a href="{{ route('courses.show', $course) }}" class="btn-enroll w-100 text-center">
                        Подробнее
                    </a>
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
