<html>
<head>
    <title>My first Laravel App</title>
</head>
<body>
    <h1>TestApp</h1>
    <a href="{{ url('/page1') }}">Страница 1</a>
    <a href="{{ url('/page2') }}">Страница 2</a>
    <hr>
    @yield('content')

</body>
</html>
