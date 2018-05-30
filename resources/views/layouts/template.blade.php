<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>{{ $title }}</title>
<style>
table {
	width: 100%; /* Ширина таблицы */
    background: white; /* Цвет фона таблицы */
    color: black; /* Цвет текста */
    border-spacing: 1px; /* Расстояние между ячейками */
    : center;
}
th {
    background: LightSkyBlue; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
}
td {
    background: white; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
}

aside {
	background: #f0f0f0;
    padding: 10px;
    width: 200px;
    float: right;
}

</style>
</head>

<body>
<header style="background: grey; color: white">
<h1 style="text-align: center">Сотрудники</h1>
<p style="text-align: center; font-weight:700">Если сотрудник на работе сидит 10 минут без дела, то он автоматически переходит в спящий режим.</p>
<h4 style="text-align: left;"><a style="color: white" href="{{ route('index') }}">На главную</a></h4>
@if (empty(Auth::user()))
<h4 style="text-align: right;"><a style="color: white" href="{{ route('login') }}">Залогиниться</a></h4>
@else
<form id="logout-form" action="{{ route('logout') }}" method="POST">
{{ csrf_field() }}
<p style="text-align: right;"><input type="submit" value="Выход"></p>
</form>
@endif
</header>
@yield('content')
</body>
</html>
