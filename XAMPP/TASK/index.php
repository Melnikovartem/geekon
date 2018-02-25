<link rel="stylesheet" href="my.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class = "header">
  <a href = "index.php"><h1>My Blog</h1></a>
  <form action = "new_article.php">
    <button class="btn btn-outline-dark">New article</button>
  </form>
  <form action = "new_user.php">
    <button class="btn btn-outline-dark">New user</button>
  </form>
</div>

<div class = "content">

  <?php
  //хост, логин, пароль
  $connection = mysqli_connect('127.0.0.1', 'root', 'root');

  //выбор БД и кодировки
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');

  //запрашиваем все записи из таблицы comments
  $query_result = mysqli_query($connection, 'SELECT header, id FROM articles ORDER BY time DESC');

  //преобразуем результат в массив массивов = массив записей
  $article = mysqli_fetch_all($query_result);

  foreach ($article as $article) {
    echo '<div class = "article">
      <h3>' . $article[0] . '</h3>
        <div class = "form-group">
          <a href = "article.php?id=' . $article[1]. '"><small>READ MORE</small></a>
        </div>
    </div>';
  }
  ?>


</div>
