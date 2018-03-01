<?php
session_start();
$user = False;
if(isset($_COOKIE["auth"])){
  if($_COOKIE["auth"] != "new" and isset($_SESSION[$_COOKIE["auth"] . "id"])){
    $user  = True;
  }
}
else{
  setcookie("auth", "new" , time()+3600);
}

$data= json_decode(file_get_contents('server'), true);
$connection = mysqli_connect($data[0], $data[1], $data[2]);
mysqli_select_db($connection, 'blog');
mysqli_set_charset($connection, 'utf8');

?>
<link rel="stylesheet" href="my.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class = "header">
<a href = "index.php"><h1>My Blog</h1></a>
<?php
  if($user){
    echo"<form action = 'new_article.php'>
      <button class='btn btn-outline-dark'>New article</button>
    </form>
    <form action = 'sign_in.php'>
      <button class='btn btn-outline-dark'>Exit</button>
    </form>";
  } else {
    echo"
    <form action = 'new_user.php'>
      <button class='btn btn-outline-dark'>New user</button>
    </form>
    <form action = 'sign_in.php'>
      <button class='btn btn-outline-dark'>Sign in</button>
    </form>";
  }
?>
</div>

<div class = "content">
  <div id = "article">
<?php

if(isset($_GET["id"]) ){
  $query_result = mysqli_query($connection, 'SELECT header, text FROM articles WHERE id = ' . $_GET["id"] );
  $article = mysqli_fetch_all($query_result);
  if(isset($article[0])){
    echo "<h1>" . $article[0][0] . "</h1>
      <p>" . $article[0][1] . "</p>";
  }
  else
    echo "<div class='alert alert-danger' role='alert'>Error: not valid article id!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: empty article id!</div>";

?>
</div>
<?php
if($user){
  echo "
<div class = 'leave_comment'>
  <h3>Leave a comment:</h3>
  <form method = 'POST'>
    <div class='form-group'>
      <label for='exampleFormControlTextarea1'>Your comment:</label>
      <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name = 'text'></textarea>
    </div>
    <button type='submit' class='btn btn-outline-success'>Post it</button>
  </form>
</div>";
}

if(isset($_POST["text"]) and $user){
  mysqli_query($connection, 'INSERT INTO comments (article_id, user_id, text) VALUES ('. $_GET["id"] . ', ' . $_SESSION[$_COOKIE["auth"] . "id"] . ', "' . $_POST["text"] . '") ');
  echo "<div class='alert alert-success' role='alert'>Your comment was published!</div>";
}
?>
<br>
<h3>Comments:</h3>
<?php

$query_result = mysqli_query($connection, 'SELECT user_id, text FROM comments WHERE article_id = ' . $_GET["id"]);
$comments = mysqli_fetch_all($query_result);


echo '<ul>';
foreach ($comments as $comment)
{
    $user = mysqli_fetch_all(mysqli_query($connection, 'SELECT username FROM users WHERE id = "' . $comment[0] . '"'))[0];
    echo '<li>'.$user[0]. ': '.$comment[1].'</li>';
}
echo '</ul>';

?>
</div>
