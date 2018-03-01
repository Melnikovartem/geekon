<?php
session_start();
$user = False;
if(isset($_COOKIE["auth"])){
  if($_COOKIE["auth"] != "new"){
    $user  = True;
  }
}
else{
  setcookie("auth", "new" , time()+3600);
}
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

<div class="content" >
  <form method = "POST" action = "index.php">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Header</span>
        </div>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name = "header">
      </div>
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Your text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "text"></textarea>
  </div>
  <?php
  if($user){
      echo '<button type="submit" class="btn btn-outline-success">Post it</button>';
    }
   ?>
  </form>
</div>


<?php

if(isset($_POST["header"]) and isset($_POST["text"])){

  $connection = mysqli_connect('192.168.64.2', 'root1', '123456');
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');

  mysqli_query($connection, 'INSERT INTO articles (user_id, header, text) VALUES (' . $_SESSION[$_COOKIE["auth"] . "id"] . ',"' . $_POST["header"] . '","' . $_POST["text"]. '") ');
  echo "<div class='alert alert-success' role='alert'>
      Your article was posted!
    </div>"

}

?>
