<html>
<head>
    <title>MathHelper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
</head>
<body>
  <div class = "container-fluid">
    <div class = "row header">
      <div class = "col"><a href = "/"><h1>MathHelper</h1></a></div>
    </div>
    <div class = "row header">
      <div class = "col-4"><div class="card-body d-flex flex-column align-items-start"><ul>
        <li><a href = "/h">Площадь через высоту</a></li>
        <li><a href = "/p">Площадь через полупериметр</a></li>
        <li><a href = "/r">Площадь через радиус вписанной окружности</a></li>
      </ul></div></div>
      <div class = "col">@yield('content')</div>
    </div>

</body>
</html>
