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
  <form action = "new_user.php" method = "POST">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Username</span>
      </div>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name = "username">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Email adress</span>
      </div>
      <input type="text" class="form-control" placeholder="example@google.com" aria-label="Username" aria-describedby="basic-addon1" name = "email">
    </div>
    <button type="submit" class="btn btn-outline-success">Post it</button>
  </form>
</div>


<?php

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST["username"]) and isset($_POST["email"])){

  $connection = mysqli_connect('192.168.64.2', 'root1', '123456');
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');
  $key = generateRandomString();
   while (isset(mysqli_fetch_all(mysqli_query($connection, 'SELECT * FROM users WHERE user_key = "' . $key . '"'))[0])){
     $key = generateRandomString();
   }
  mysqli_query($connection, 'INSERT INTO users (user_key, email, name) VALUES ("' . $key . '","' . $_POST["email"] . '","' . $_POST["username"]. '") ');
  echo "<div class='alert alert-success' role='alert'>Your user key: @" . $key . " - It's important to remember it!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: missing data!</div>";

?>
