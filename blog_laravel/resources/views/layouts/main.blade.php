<html>
<head>
    <title>Сontacts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
</head>
<body>
  <div class = "container-fluid">
    <div class = "row header">
        <div class = "col header">
          <a href = "/"><h1>Сontacts</h1></a>
        </div>
    </div>
     <div calss = "row">
      <div class = "col">@yield('content')</div>
     </div>
    </div>

</body>
</html>
