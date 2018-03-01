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
  if(isset($_POST["email"]))
    mysqli_query($connection, 'INSERT INTO users (password, email, username) VALUES ("' . $_POST["password"]. '","' . $_POST["email"] . '","' . $_POST["username"]. '") ');
  $result = mysqli_fetch_all(mysqli_query($connection, 'SELECT id FROM users WHERE username = "' . $_POST["username"] . '" AND password = "' . $_POST["password"] . '"'));
  if(isset($result[0])){
    $session = generateRandomString();
    $_SESSION[$session . "id"] = $result[0][0];
    setcookie("auth", $session , time()+3600);
    $user = True;
    if($_POST["username"] == "root" and $_POST["password"]=="root"){
      $_SESSION[$session . "admin"] = True;
    }
  }
  else
    $error = "<div class='alert alert-danger' role='alert'>Error:  Wrong username or password!</div>";
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
<?php echo $error; ?>
<div class = "content">
  <div id = "article">

<div class = "content">

  <?php
  $query_result = mysqli_query($connection, 'SELECT header, id, user_id FROM articles ORDER BY time DESC');
  $article = mysqli_fetch_all($query_result);

  foreach ($article as $article) {
    $username = mysqli_fetch_all(mysqli_query($connection, 'SELECT username FROM users WHERE id = ' . $article[2]))[0];
    if(!$username)
      $username = ["Deleted User"];
    echo '<div class = "article form-group">
      <h3>' . $article[0] . '</h3>
      <p>by ' . $username[0] . '<p>
      <a href = "article.php?id=' . $article[1]. '"><small>READ MORE</small></a>
      </div>';
  }
?>


</div>
