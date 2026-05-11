@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/practices.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endpush
@section('content')
    <h2 class="mb-4 mt-4">Практики</h2>
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="img/slider1.JPG" alt=""></div>
            <div class="slide"><img src="img/teachers.png" alt=""></div>
            <div class="slide"><img src="img/slide3.JPG" alt=""></div>
        </div>
        <div class="slider-indicators">
            <span class="indicator active"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
        </div>
    </div>

    <div class="row g-4 align-items-center mt-4 mb-4">
        <div class="col-sm-12 col-lg-6">
            <div class="img-container">
                <img src="{{ asset('img/studio.png') }}" alt="Студия" class="rounded-50">
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
            <h2>Практика 1</h2>

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
            <h2>Практика 2</h2>

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
            <h2>Практика 3</h2>

            <p>
                В GongYoga мы предлагаем разнообразные практики, которые помогают нашим ученикам развивать
                физическую силу, эмоциональную устойчивость и духовное осознание. Каждая практика направлена на
                то,
                чтобы углубить понимание себя и своих потребностей, а также создать пространство для личностного
                роста и внутренней гармонии.
            </p>
        </div>
    </div>
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
@push('scripts')
    <script src="{{ asset('js/slider.js') }}"></script>
@endpush
