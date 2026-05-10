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

        .course-show > .row {
            align-items: center;
        }

        /* Видео контейнер */
        .video-wrapper {
            position: relative;
            width: 100%;
            background: #000;
            border-radius: 4px;
            overflow: hidden;
        }

        .video-wrapper video {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Стили для левого блока */
        .course-info h1 {
            font-size: 42px;
            font-weight: 300;
            color: var(--color-text-dark);
            margin-bottom: 24px;
            letter-spacing: 1px;
        }

        .course-description {
            font-size: 16px;
            line-height: 1.8;
            color: #6b6b6b;
            margin-bottom: 40px;
            font-weight: 300;
            word-break: break-all;
        }

        .course-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .detail-item {
            display: flex;
            gap: 12px;
            font-size: 15px;
            color: var(--color-text-dark);
        }

        .detail-item b {
            font-weight: 400;
            color: var(--color-primary);
            min-width: 160px;
        }

        .btn-enroll {
            display: inline-block;
            padding: 16px 48px;
            background: var(--color-primary);
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-enroll:hover {
            background: var(--color-secondary);
        }

        @media (max-width: 992px) {
            .course-show .row {
                flex-direction: column;
                gap: 40px;
            }

            .course-info h1 {
                font-size: 32px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="course-show">
        <div class="row">
            <div class="col-sm-12 col-lg-6 course-info">
                <h1>{{ $course->name }}</h1>
                <p class="course-description">{{ $course->description }}</p>
                <div class="course-details">
                    <div class="detail-item">
                        <b>Цена:</b>
                        <span>{{ number_format($course->price, 0, '.', ' ') }} ₽</span>
                    </div>
                </div>

                <form action="{{ route('courses.appointment', $course) }}" method="post">
                    <button type="submit" class="btn-enroll">Записаться</button>
                </form>
            </div>

            <div class="col-sm-12 col-lg-6">
                <div class="video-wrapper">
                    <video controls poster="{{ $course->thumbnail ?? '' }}">
                        <source src="{{ Storage::url($course->video) }}" type="video/mp4">
                        <!-- Или если видео по URL -->
                        <!-- <source src="{{ $course->video }}" type="video/mp4"> -->
                        Ваш браузер не поддерживает видео.
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection
