<?php
session_start();
$user = False;
if(isset($_COOKIE["auth"])){
  if($_COOKIE["auth"] != "new" and isset($_SESSION[$_COOKIE["auth"] . "id"])){
      setcookie("auth", "new" , time()+3600);
  }
}
else{
  setcookie("auth", "new" , time()+3600);
}


function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST["username"]) and isset($_POST["password"])){

  $data= json_decode(file_get_contents('server'), true);
  $connection = mysqli_connect($data[0], $data[1], $data[2]);
  mysqli_select_db($connection, 'blog');
  mysqli_set_charset($connection, 'utf8');
  $query_result = mysqli_query($connection, 'SELECT * FROM admin WHERE username = "' . $_POST["user"] . '" AND password = "' . $_POST["password"] . '"');
  $result = mysqli_fetch_all($query_result);
  if(isset($query_result))
    setcookie("auth", generateRandomString() , time()+3600); // i'm in plane nd i forgot how to write sessions
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
  <form  method = "POST" action = "login.php">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Username</span>
      </div>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name = "username">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Password</span>
      </div>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = "password">
    </div>
    <button type="submit" class="btn btn-outline-success">I am admin (grut)</button>
  </form>
</div>
