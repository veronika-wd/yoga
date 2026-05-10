@extends('theme')

@push('styles')
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

        .dashboard-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .dashboard-header {
            margin-bottom: 40px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--color-border);
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

        /* Сетка карточек (курсы/практики/абонементы) */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .card {
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: 6px;
            padding: 28px;
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--color-secondary);
            box-shadow: 0 6px 20px rgba(74, 74, 72, 0.05);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
            gap: 12px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 400;
            color: var(--color-text-dark);
            margin: 0;
            line-height: 1.3;
        }

        /* Бейджи */
        .badge {
            display: inline-block;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 0.5px;
            border-radius: 3px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .badge-active {
            background: rgba(90, 143, 90, 0.1);
            color: var(--color-success);
        }

        .badge-pending {
            background: rgba(139, 115, 85, 0.1);
            color: var(--color-primary);
        }

        .badge-expired {
            background: rgba(154, 149, 144, 0.15);
            color: var(--color-muted);
        }

        .badge-rejected {
            background: rgba(192, 57, 43, 0.1);
            color: var(--color-danger);
        }

        .card-meta {
            font-size: 14px;
            color: var(--color-muted);
            margin-bottom: 24px;
            line-height: 1.6;
            font-weight: 300;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 18px;
            border-top: 1px solid var(--color-border);
        }

        .btn-outline {
            display: inline-block;
            padding: 10px 24px;
            background: transparent;
            border: 1px solid var(--color-primary);
            color: var(--color-primary);
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-outline:hover {
            background: var(--color-primary);
            color: white;
        }

        .btn-outline:disabled {
            border-color: var(--color-border);
            color: var(--color-muted);
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Список заявок (полиморфный) */
        .request-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .request-item {
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: 6px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            transition: all 0.2s ease;
        }

        .request-item:hover {
            border-color: var(--color-secondary);
        }

        .request-type {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--color-muted);
            margin-bottom: 4px;
        }

        .request-title {
            font-size: 15px;
            font-weight: 400;
            color: var(--color-text-dark);
            margin: 0;
        }

        .request-meta {
            font-size: 13px;
            color: var(--color-muted);
            margin-top: 4px;
            font-weight: 300;
        }

        .request-status {
            text-align: right;
            min-width: 120px;
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
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Личный кабинет</h1>
            <p class="user-greeting">Добро пожаловать, {{ auth()->user()->name }}</p>
        </header>

        <nav class="dashboard-nav" role="tablist">
            <button class="nav-tab active" data-tab="courses" role="tab" aria-selected="true">Курсы</button>
            <button class="nav-tab" data-tab="practices" role="tab" aria-selected="false">Практики</button>
            <button class="nav-tab" data-tab="subscriptions" role="tab" aria-selected="false">Абонементы</button>
            <button class="nav-tab" data-tab="requests" role="tab" aria-selected="false">Заявки</button>
        </nav>

        <div class="dashboard-content">
            <!-- КУРСЫ -->
            <div class="tab-panel active" id="courses" role="tabpanel">
                @if($courses->isNotEmpty())
                    <div class="content-grid">
                        @foreach($courses as $course)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $course->name }}</h3>

                                    <span class="badge {{ $course->is_active ? 'badge-active' : 'badge-expired' }}">
                                        {{ $course->is_active ? 'Активен' : 'Завершён' }}
                                    </span>
                                </div>

                                <p class="card-meta">{{ Str::limit($course->description, 80) }}</p>

                                <div class="card-footer">
                                    <span class="meta-small"
                                          style="font-size:13px;color:var(--color-muted);font-weight:300;">Прогресс: {{ $course->progress ?? 0 }}%
                                    </span>

                                    <a href="{{ route('courses.show', $course) }}" class="btn-outline">Перейти</a>
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
                {{--                @if($practices->isNotEmpty())--}}
                {{--                    <div class="content-grid">--}}
                {{--                        @foreach($practices as $practice)--}}
                {{--                            <div class="card">--}}
                {{--                                <div class="card-header">--}}
                {{--                                    <h3 class="card-title">{{ $practice->title }}</h3>--}}
                {{--                                    <span class="badge {{ $practice->status == 'completed' ? 'badge-active' : 'badge-pending' }}">--}}
                {{--                                {{ $practice->status == 'completed' ? 'Выполнено' : 'В процессе' }}--}}
                {{--                            </span>--}}
                {{--                                </div>--}}
                {{--                                <p class="card-meta">{{ Str::limit($practice->description, 80) }}</p>--}}
                {{--                                <div class="card-footer">--}}
                {{--                                    <span class="meta-small" style="font-size:13px;color:var(--color-muted);font-weight:300;">Дедлайн: {{ $practice->deadline?->format('d.m.Y') ?? '—' }}</span>--}}
                {{--                                    <a href="{{ route('practice.show', $practice->id) }}" class="btn-outline">Открыть</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                @else--}}
                {{--                    <div class="empty-state">--}}
                {{--                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">--}}
                {{--                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>--}}
                {{--                            <polyline points="14 2 14 8 20 8"/>--}}
                {{--                            <line x1="16" y1="13" x2="8" y2="13"/>--}}
                {{--                            <line x1="16" y1="17" x2="8" y2="17"/>--}}
                {{--                        </svg>--}}
                {{--                        <p>Нет доступных практик</p>--}}
                {{--                    </div>--}}
                {{--                @endif--}}
            </div>

            <!-- АБОНЕМЕНТЫ -->
            <div class="tab-panel" id="subscriptions" role="tabpanel">
                @if($subscriptions->isNotEmpty())
                    <div class="content-grid">
                        @foreach($subscriptions as $sub)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $sub->plan_name }}</h3>
                                    <span class="badge {{ $sub->is_active ? 'badge-active' : 'badge-expired' }}">
                                                {{ $sub->is_active ? 'Активен' : 'Истёк' }}
                                            </span>
                                </div>
                                <p class="card-meta">
                                    Действует до: {{ $sub->expires_at?->format('d.m.Y') ?? '—' }}<br>
                                    Осталось: {{ $sub->is_active ? max(0, now()->diffInDays($sub->expires_at)) : 0 }}
                                    дней
                                </p>
                                <div class="card-footer">
                                    <span class="price"
                                          style="font-size:18px;font-weight:400;color:var(--color-text-dark);">{{ number_format($sub->price, 0, '.', ' ') }} ₽</span>
                                    @if(!$sub->is_active)
                                        <a href="{{ route('subscription.renew', $sub->id) }}" class="btn-outline">Продлить</a>
                                    @else
                                        <button class="btn-outline" disabled>Действует</button>
                                    @endif
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

            <!-- Секция ЗАЯВКИ (Вставьте это вместо предыдущего блока id="requests") -->
            <div class="tab-panel" id="requests" role="tabpanel">
                {{--                @if($applications->isNotEmpty())--}}
                {{--                    <div class="request-list">--}}
                {{--                        @foreach($applications as $app)--}}
                {{--                            @php--}}
                {{--                                $entity = $app->applicationable;--}}
                {{--                                $typeClass = class_basename($app->applicationable_type); // Course, Events, Subscription--}}

                {{--                                // Приводим к нижнему регистру для роута (events -> event, Course -> course)--}}
                {{--                                // Если ваши роуты во множественном числе (events.show), уберите Str::singular--}}
                {{--                                $routeType = Str::singular($typeClass);--}}
                {{--                                $routeName = $routeType . '.show';--}}

                {{--                                // Получаем название сущности безопасно--}}
                {{--                                $entityName = data_get($entity, 'name') ?? data_get($entity, 'title') ?? 'Без названия';--}}
                {{--                            @endphp--}}

                {{--                            <div class="request-item">--}}
                {{--                                <div style="flex:1;">--}}
                {{--                                    <!-- Тип заявки -->--}}
                {{--                                    <div class="request-type">--}}
                {{--                                        @switch($typeClass)--}}
                {{--                                            @case('Course') Курс @break--}}
                {{--                                            @case('Events') Событие @break--}}
                {{--                                            @case('Subscription') Абонемент @break--}}
                {{--                                            @default Заявка--}}
                {{--                                        @endswitch--}}
                {{--                                    </div>--}}

                {{--                                    <!-- Название -->--}}
                {{--                                    <h4 class="request-title">{{ $entityName }}</h4>--}}

                {{--                                    <!-- Мета-информация -->--}}
                {{--                                    <div class="request-meta">--}}
                {{--                                        Подано: {{ $app->created_at->format('d.m.Y') }}--}}
                {{--                                        @if($app->comment) · {{ Str::limit($app->comment, 50) }} @endif--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <!-- Статус и кнопка -->--}}
                {{--                                <div class="request-status">--}}
                {{--                        <span class="badge--}}
                {{--                            @if($app->status === 'approved') badge-active--}}
                {{--                            @elseif($app->status === 'rejected') badge-rejected--}}
                {{--                            @else badge-pending @endif">--}}

                {{--                            {{ $app->status_label ?? $app->status }}--}}
                {{--                        </span>--}}

                {{--                                    @if($app->status === 'approved' && $entity)--}}
                {{--                                        <!-- Кнопка перехода к сущности -->--}}
                {{--                                        <a href="{{ route($routeName, $entity->id) }}"--}}
                {{--                                           class="btn-outline"--}}
                {{--                                           style="margin-top:8px; padding:8px 16px; font-size:11px;">--}}
                {{--                                            Перейти--}}
                {{--                                        </a>--}}
                {{--                                    @endif--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                @else--}}
                {{--                    <div class="empty-state">--}}
                {{--                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">--}}
                {{--                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>--}}
                {{--                            <line x1="16" y1="13" x2="8" y2="13"/>--}}
                {{--                            <line x1="16" y1="17" x2="8" y2="17"/>--}}
                {{--                            <polyline points="14 2 14 8 20 8"/>--}}
                {{--                        </svg>--}}
                {{--                        <p>У вас нет активных заявок</p>--}}
                {{--                    </div>--}}
                {{--                @endif--}}
            </div>
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
