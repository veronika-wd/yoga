<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css) }}">
    <title>Регистрация</title>
</head>
<body>
<form action="{{ route('register') }}" method="post">
    <h1>Регистрация</h1>
    <label for="name">Ваше имя</label>
    <input type="text" name="name" id="name" class="input" placeholder="Введите имя" required>
    @error('name')
        <p class="error-message">{{ $message }}</p>
    @enderror
    <label for="phone">Ваш телефон</label>
    <input type="tel" name="phone" id="phone" class="input" placeholder="+7(900)800-70-60" required>
    @error('phone')
    <p class="error-message">{{ $message }}</p>
    @enderror
    <label for="password">Придумайте пароль</label>
    <input type="password" name="password" id="password" placeholder="Минимум 5 символов" required>
    @error('password')
        <p class="error-message">{{ $message }}</p>
    @enderror
    <button type="submit" class="button">Зарегистрироваться</button>
</form>
</body>
</html>
