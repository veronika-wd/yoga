<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Авторизация</title>
</head>
<body>

<div class="auth-container">
    <div class="auth-header">
        <h1>Авторизация</h1>
    </div>

    <form action="{{ route('login') }}" method="post" novalidate>
        @csrf
        <!-- Телефон -->
        <div class="form-group">
            <label for="phone">Ваш телефон</label>
            <div class="input-wrapper">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                <input
                    type="tel"
                    name="phone"
                    id="phone"
                    class="form-input has-icon {{ $errors->has('phone') ? 'error' : '' }}"
                    placeholder="+7 (900) 800-70-60"
                    value="{{ old('phone') }}"
                    required
                >
            </div>
            @error('phone')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Пароль -->
        <div class="form-group">
            <label for="password">Введите пароль</label>
            <div class="input-wrapper">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-input has-icon {{ $errors->has('password') ? 'error' : '' }}"
                    placeholder="Минимум 5 символов"
                    required
                >
                <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Показать пароль">
                    <svg id="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
            @error('password')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-register">Войти</button>
    </form>

    <div class="auth-footer">
        <p>Еще нет аккаунта? <a href="{{ route('register.form') }}">Зарегистрироваться</a></p>
    </div>
</div>
<script src="{{ asset('js/phone-mask.js') }}"></script>
</body>
</html>
