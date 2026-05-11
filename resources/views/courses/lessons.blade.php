@extends('theme')
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
