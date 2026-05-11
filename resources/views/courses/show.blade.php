@extends('theme')
@section('content')
    <div class="course-show">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ $course->name }}</h2>

        </div>
        <p class="course-description">{{ $course->description }}</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Цена:</b>
                <span>{{ number_format($course->price, 0, '.', ' ') }} ₽</span>
            </div>
            <div class="details-item">
                <form action="{{ route('courses.appointment', $course) }}" method="post">
                    <button type="submit" class="btn-enroll">Купить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
