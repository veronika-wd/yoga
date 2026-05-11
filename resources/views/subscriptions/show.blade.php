@extends('theme')
@section('content')
    <div class="course-show">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ $subscription->name }}</h2>

        </div>
        <p class="course-description">{{ $subscription->description }}</p>
        <div class="course-details">
            <div class="detail-item">
                <b>Количество занятий:</b>
                <span>{{ $subscription->count }}</span>
            </div>
            <div class="detail-item">
                <b>Цена:</b>
                <span>{{ number_format($subscription->price, 0, '.', ' ') }} ₽</span>
            </div>
            <div class="details-item">
                <form action="{{ route('subscriptions.appointment', $subscription) }}" method="post">
                    <button type="submit" class="btn-enroll">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
