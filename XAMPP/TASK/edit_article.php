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
  if($_SESSION[$_COOKIE["auth"] . "id"] == $article[3] or $_SESSION[$_COOKIE["auth"] . "admin"]){
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

<div class="content" >
<form method = "POST" action = "edit_article.php">
<?php

if(isset($_POST["header"]) and isset($_POST["text"]) and isset($_POST["id"]) and ($_SESSION[$_COOKIE["auth"] . "id"] == $article[3] or $_SESSION[$_COOKIE["auth"] . "admin"])){

  if($_POST["header"] == "" or $_POST["header"] == "")
    echo "<div class='alert alert-danger' role='alert'>Error: Empty field!</div>";
  else{
    mysqli_query($connection, 'UPDATE articles SET header = "' . $_POST["header"] . '", text = "' . $_POST["text"] . '" WHERE id = ' . $_POST["id"]   );
    echo "<div class='alert alert-success' role='alert'>
        Your article was edited!
      </div>";
  }

}
else{
if(isset($_GET["id"]) ){
  $query_result = mysqli_query($connection, 'SELECT header, text FROM articles WHERE id = ' . $_GET["id"] );
  $article = mysqli_fetch_all($query_result)[0];
  if(isset($article)){
    echo '
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Header</span>
          </div>
          <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name = "header" value="' . $article[0] . '">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Your text</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "text">' . $article[1]. '</textarea>
        </div>';
  }
  else
    echo "<div class='alert alert-danger' role='alert'>Error: not valid article id!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: empty article id!</div>";

if($_SESSION[$_COOKIE["auth"] . "id"] == $article[3] or $_SESSION[$_COOKIE["auth"] . "admin"]){
    echo '<input type = "hidden" name = "id" value = ' . $_GET["id"] . '>
    <button type="submit" class="btn btn-outline-success">Edit</button>';
  }
}
?>
</form>
</div>
