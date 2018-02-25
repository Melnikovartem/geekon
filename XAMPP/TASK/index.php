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
  <div class = "article">
    <h3>What happend to tram have interested all kreml</h3>
    <form action = "article.php?id=0">
      <div class = "form-group">
        <button class="btn btn-info">READ</button>
      </div>
    </form>
  </div>
</div>

<?php
//хост, логин, пароль
$connection = mysqli_connect('192.168.64.2', 'root1', '123456');

//выбор БД и кодировки
mysqli_select_db($connection, 'blog');
mysqli_set_charset($connection, 'utf8');

if(isset($_GET["author"]) and isset($_GET["text"])){
  mysqli_query($connection, 'INSERT INTO comments (author, text)VALUES ("' . $_GET["author"] . '","' . $_GET["text"]. '") ');
}
else
  echo "<h3>Error: missing data</h3>"
?>
<h2>Comments</h2>
<?php


//запрашиваем все записи из таблицы comments
$query_result = mysqli_query($connection, 'SELECT * FROM comments');

//преобразуем результат в массив массивов = массив записей
$comments = mysqli_fetch_all($query_result);

echo '<ul>';
foreach ($comments as $comment)
{
    echo '<li>'.$comment[1].', '.$comment[3].': '.$comment[2].'</li>';
}
echo '</ul>';

?>

<div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>
<div class="alert alert-secondary" role="alert">
  This is a secondary alert—check it out!
</div>
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
<div class="alert alert-warning" role="alert">
  This is a warning alert—check it out!
</div>
<div class="alert alert-info" role="alert">
  This is a info alert—check it out!
</div>
<div class="alert alert-light" role="alert">
  This is a light alert—check it out!
</div>
<div class="alert alert-dark" role="alert">
  This is a dark alert—check it out!
</div>
