@php use App\Models\Course;use App\Models\Subscription; @endphp
@extends('theme')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <style>
        :root {
            --color-primary: #8b7355;
            --color-secondary: #a89080;
            --color-text-dark: #4a4a48;
            --color-bg: #faf9f7;
            --color-border: #d9d1c7;
            --color-white: #ffffff;
            --color-success: #5a8f5a;
            --color-danger: #c0392b;
            --color-muted: #9a9590;
        }

        .dashboard-header h1 {
            font-size: 36px;
            font-weight: 300;
            color: var(--color-text-dark);
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .user-greeting {
            font-size: 14px;
            color: var(--color-muted);
            font-weight: 300;
        }

        /* Навигация */
        .dashboard-nav {
            display: flex;
            gap: 32px;
            margin-bottom: 40px;
            border-bottom: 1px solid var(--color-border);
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tab {
            background: none;
            border: none;
            padding: 12px 4px 16px;
            font-size: 13px;
            font-weight: 400;
            color: var(--color-muted);
            cursor: pointer;
            position: relative;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: color 0.3s ease;
            white-space: nowrap;
        }

        .nav-tab:hover {
            color: var(--color-primary);
        }

        .nav-tab.active {
            color: var(--color-text-dark);
        }

        .nav-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--color-primary);
        }

        /* Табы */
        .tab-panel {
            display: none;
            animation: fadeSlide 0.4s ease;
        }

        .tab-panel.active {
            display: block;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .event-card {
            width: 100%;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .card-image-wrapper {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .date-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background-color: #2c241b;
            color: #f5e6d3;
            padding: 12px 16px;
            border-radius: 8px;
            text-align: center;
            min-width: 70px;
        }

        .month {
            display: block;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .day {
            display: block;
            font-size: 32px;
            font-weight: 700;
            line-height: 1;
        }

        .card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c241b;
            margin: 0 0 12px 0;
        }

        .card-instructor,
        .card-price {
            font-size: 16px;
            color: #5a4a3a;
            margin: 0 0 8px 0;
            font-weight: 500;
        }

        .card-duration {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            font-size: 16px;
            color: #2c241b;
            font-weight: 600;
        }

        .clock-icon {
            width: 20px;
            height: 20px;
            color: #2c241b;
        }

        /* Адаптивность */
        @media (max-width: 480px) {
            .event-card {
                width: 100%;
                max-width: 320px;
            }

            .card-image-wrapper {
                height: 240px;
            }

            .card-title {
                font-size: 20px;
            }
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--color-muted);
        }

        .empty-state svg {
            width: 48px;
            height: 48px;
            margin-bottom: 16px;
            opacity: 0.35;
            stroke: currentColor;
        }

        .empty-state p {
            font-size: 15px;
            font-weight: 300;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 40px 16px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .request-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .request-status {
                text-align: left;
                min-width: auto;
            }
        }
    </style>
@endpush

@section('content')
    <h2>Личный кабинет</h2>
    <p class="user-greeting">Добро пожаловать, {{ auth()->user()->name }}</p>
    <nav class="dashboard-nav" role="tablist">
        <button class="nav-tab active" data-tab="courses" role="tab" aria-selected="true">Курсы</button>
        <button class="nav-tab" data-tab="practices" role="tab" aria-selected="false">Практики</button>
        <button class="nav-tab" data-tab="subscriptions" role="tab" aria-selected="false">Абонементы</button>
    </nav>

    <div class="dashboard-content">
        <!-- КУРСЫ -->
        <div class="tab-panel active" id="courses" role="tabpanel">
            @if($courses->isNotEmpty())
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

                                <a href="{{ route('profile.courses.show', $course) }}"
                                   class="btn-enroll w-100 text-center">
                                    Открыть
                                </a>
                            </div>
                        </div>

                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    <p>Вы ещё не записаны ни на один курс</p>
                </div>
            @endif
        </div>

        <!-- ПРАКТИКИ -->
        <div class="tab-panel" id="practices" role="tabpanel">
            @if($events->isNotEmpty())
                <div class="row g-3 mb-3 p-2">
                    @foreach($events as $event)
                        <div class="col-sm-12 col-lg-3">
                            <div class="event-card h-100">
                                <div class="card-image-wrapper">
                                    <img src="{{ Storage::url($event->image) }}" alt="Звукопозитивная терапия"
                                         class="card-image">
                                    <div class="date-badge">
                                        <span
                                            class="month">{{ Str::upper($event->datetime->translatedFormat('M'))  }}</span>
                                        <span class="day">{{ date_format($event->datetime, 'd') }}</span>
                                    </div>
                                </div>
                                <div class="card-content h-50">
                                    <h3 class="card-title">{{ Str::limit($event->name, 20) }}</h3>
                                    <p class="card-instructor">{{ $event->teacher->name }}</p>
                                    <p class="card-price">{{ $event->price }}</p>
                                    <div class="card-duration">
                                        <svg class="clock-icon" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                        </svg>
                                        <span>{{ $event->time }} минут</span>
                                    </div>
                                    <a href="{{ route('events.show', $event) }}"
                                       class="btn-enroll text-center w-100 mt-1 mb-2">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    <p>Нет доступных практик</p>
                </div>
            @endif
        </div>

        <!-- АБОНЕМЕНТЫ -->
        <div class="tab-panel" id="subscriptions" role="tabpanel">
            @if($subscriptions->isNotEmpty())
                <div class="row g-3 px-3 mb-3">
                    @foreach($subscriptions as $sub)
                        <div class="col-sm-12 col-lg-3">
                            <div class="course-card h-100">
                                <h3 class="course-title">{{ $sub->name }}</h3>

                                @if($sub->description)
                                    <p class="course-description">
                                        {{ Str::limit($sub->description, 100) }}
                                    </p>
                                    <span class="course-price text-center">{{ $sub->count }} занятий</span>
                                @endif

                                <div class="course-meta">
                                    <span class="course-price">{{ number_format($sub->price, 0, '.', ' ') }} ₽</span>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                    <p>У вас нет активных абонементов</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.nav-tab').forEach(tab => {
            tab.addEventListener('click', function () {
                document.querySelectorAll('.nav-tab').forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));

                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                document.getElementById(this.dataset.tab).classList.add('active');
            });
        });
    </script>
@endpush
