@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/teachers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/practices.css') }}">
@endpush
@section('content')
    <h2 class="mt-4">Преподаватели</h2>
    <div class="row g-4 align-items-center mt-4 mb-4">
        @foreach($teachers as $teacher)

        <div class="col-sm-12 col-lg-4">
            <div class="img-container photo">
                <img src="{{ Storage::url($teacher->image) }}" alt="Студия" class="rounded-50">
            </div>
        </div>

        <div class="col-sm-12 col-lg-8">
            <h2>{{ $teacher->name }}</h2>
            <h3>{{ $teacher->status }}</h3>
            <p>
                {{ $teacher->description }}
            </p>
        </div>
        @endforeach

    <section class="yoga-about">
        <div class="container">
            <h2 class="section-title">Йога — это путь к себе</h2>
            <p class="section-intro">
                Йога — это не просто физическая практика. Это философия, которая объединяет тело, разум и дух.
                В нашем центре мы предлагаем вам погрузиться в эту древнюю дисциплину — для гармонии и внутреннего спокойствия.
            </p>

            <div class="info-block">
                <h3>Для всех уровней подготовки</h3>
                <p>Неважно, новичок вы или опытный практик — у нас найдётся место для каждого. Наши инструкторы помогут освоить технику и найти свой собственный путь.</p>
            </div>

            <div class="info-block">
                <h3>Наши направления</h3>
                <ul class="directions-list">
                    <li><strong>Хатха-йога</strong> — укрепление тела и расслабление ума.</li>
                    <li><strong>Кундалини-йога</strong> — пробуждение энергии и духовное развитие.</li>
                    <li><strong>Медитация</strong> — концентрация и внутренний покой.</li>
                </ul>
            </div>
            <div class="d-flex flex-column align-items-center">
                <p class="section-intro">Запишитесь на занятие — почувствуйте атмосферу центра и узнайте больше о йоге.</p>
                <a href="{{ route('events.index') }}" class="btn-enroll">Открыть расписание</a>
            </div>
        </div>
    </section>
@endsection
