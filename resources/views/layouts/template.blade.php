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
<p style="text-align: center; font-weight:700">Хорошая болезнь склероз - ничего не болит и каждый день новости</p>
<h4><a style="color: white" href='/user/newsList/'>Админка</a></h4>
<h4 style="text-align: right"><a style="color: white" href='/admin/newsExit/'>Выход</a></h4>
</header>
@yield('content')
</body>
</html>
