<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Кастомная валидация</title>
</head>
<body>

<h1>Форма</h1>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('submit') }}">
    @csrf

    <div>
        <label>Текст (минимум 50% русских букв):</label><br>
        <input type="text" name="text" value="{{ old('text') }}">
    </div>

    <br>

    <div>
        <label>Российский номер телефона:</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <br>

    <button type="submit">Отправить</button>
</form>

</body>
</html>
