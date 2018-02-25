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

<div class="content">
  <form method = "POST">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input type="text" class="form-control" placeholder="Your user key" aria-label="Username" aria-describedby="basic-addon1" name = "key">
    </div>
    <p>*<small> if you want to be anonymous you can use our @00000000 user key</small></p>
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
  <button type="submit" class="btn btn-outline-success">Post it</button>
  </form>
</div>


<?php

if(isset($_POST["key"]) and isset($_POST["header"]) and isset($_POST["text"])){

  $connection = mysqli_connect('127.0.0.1', 'root', 'root');
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');

  $query_result = mysqli_query($connection, 'SELECT id FROM users WHERE user_key = "' . $_POST["key"] . '"');
  $user = mysqli_fetch_all($query_result);
  if(isset($user[0][0])){
    mysqli_query($connection, 'INSERT INTO articles (user_id, header, text) VALUES (' . $user[0][0] . ',"' . $_POST["header"] . '","' . $_POST["text"]. '") ');
    echo "<div class='alert alert-success' role='alert'>Your article was published!</div>";
  }
  else
    echo "<div class='alert alert-danger' role='alert'>Error: not valid user key!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: missing data!</div>";

?>
