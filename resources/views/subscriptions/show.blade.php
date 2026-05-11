@extends('theme')
@push('styles')
    <style>
        :root {
            --color-primary: #8b7355;
            --color-secondary: #a89080;
            --color-text-dark: #4a4a48;
            --color-bg: #faf9f7;
        }

        .course-show {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .course-description {
            font-size: 20px;
            line-height: 1.8;
            color: #6b6b6b;
            margin-bottom: 40px;
            font-weight: 300;
            word-break: break-all;
        }

        .course-details {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
        }

        .detail-item {
            display: flex;
            gap: 12px;
            font-size: 20px;
            color: var(--color-text-dark);
        }

        .detail-item b {
            font-weight: 400;
            color: var(--color-primary);
            min-width: 160px;
        }
    </style>
@endpush

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
