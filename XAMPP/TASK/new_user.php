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

<div class="content">
  <form action = "index.php" method = "POST">
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
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name = "email">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Password</span>
      </div>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = "password">
    </div>
    <?php
    if($user != True){
        echo '<button type="submit" class="btn btn-outline-success">Register</button>';
      }
     ?>
  </form>
</div>
