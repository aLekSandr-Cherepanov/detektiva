<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p></p>
<p><b>Получено сообщение с формы обратной связи:</b></p>
<p><b>Имя:</b> {{ $request->name }}</p>
<p><b>E-mail:</b> {{ $request->email }}</p>
<p><b>Телефон:</b> {{ $request->phone }}</p>
<p><b>Текст сообщения:</b></p>
<p>{{ $request->message }}</p>
</body>
</html>
