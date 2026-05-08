<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css) }}">
    <title>Авторизация</title>
</head>
<body>
<form action="{{ route('login') }}" method="post">
    <h1>Авторизация</h1>
    <label for="phone">Ваш телефон</label>
    <input type="tel" name="phone" id="phone" class="input" placeholder="+7(900)800-70-60" required>
    <label for="password">Введите пароль</label>
    <input type="password" name="password" id="password" placeholder="Минимум 5 символов" required>
    @error('auth')
    <p class="error-message">{{ $message }}</p>
    @enderror
    <button type="submit" class="button">Войти</button>
</form>
</body>
</html>
