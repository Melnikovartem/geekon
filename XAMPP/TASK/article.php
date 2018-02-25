<link rel="stylesheet" href="my.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class = "header">
  <h1>My Blog</h1>
  <form action = "new_article.php">
    <button class="btn btn-outline-dark">New article</button>
  </form>
  <form action = "new_user.php">
    <button class="btn btn-outline-dark">New user</button>
  </form>
</div>

<form action = "article.php">
<?php

if(isset($_POST["key"]) and isset($_POST["header"]) and isset($_POST["text"])){

  $connection = mysqli_connect('192.168.64.2', 'root1', '123456');
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');

  $query_result = mysqli_query($connection, 'SELECT id FROM users WHERE user_key = "' . $_POST["key"] . '"');
  $user = mysqli_fetch_one($query_result);
  echo $user;
  echo "<div class='alert alert-success' role='alert'>Your article was published!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: missing data!</div>";

?>
