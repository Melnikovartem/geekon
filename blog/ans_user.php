<?php
//page where i send user(admin(god admin)) when he want to sign in/just registered

//this part is same for all pages
//I will rewrite evrything
session_start();

//user status
$user_status = 0; //new user
if(isset($_SESSION[$_COOKIE["blog"]]))
  if($_SESSION[$_COOKIE["blog"]] != "")
    $user_status = $_SESSION[$_COOKIE["blog"]]; //real status

//---here can be some code

//for unique cookies
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

//connect to db
$data= json_decode(file_get_contents('server'), true);
$connection = mysqli_connect($data[0], $data[1], $data[2]);
mysqli_select_db($connection, 'blog');
mysqli_set_charset($connection, 'utf8');

$body = "<div class='alert alert-danger' role='alert'>Error: No such user!</div>";

//user wants to login/change and all post data is ok
if(isset($_POST["username"]) and isset($_POST["password"])){
//check the status of user
    if(isset($_POST["email"]) and isset($_POST["text"])){//new user/ or change
      if(isset($_POST["id"])){//want to change
        if($user_status > 2 or $_SESSION[$_COOKIE["blog"] . "id"] == $_POST["id"]){// to do
          }
      }
      else{
        $query_result = mysqli_query($connection, 'SELECT id FROM users WHERE username = "' . $_POST["username"] . '"');
        if(!isset(mysqli_fetch_all($query_result)[0]))
          mysqli_query($connection, 'INSERT INTO users (username, password, email, about) VALUES ("' . strip_tags($_POST["username"])  . '", "' . $_POST["password"] . '", "' . $_POST["email"] . '", "' . $_POST["text"] . '")');
        else
          $body = "<div class='alert alert-danger' role='alert'>Error: User already exists!</div>";
      }
    }
    $query_result = mysqli_query($connection, 'SELECT status, id FROM users WHERE username = "' . $_POST["username"] . '" AND password = "' . $_POST["password"] . '"');
    $valid_users = mysqli_fetch_all($query_result);
    if($valid_users){
      $session = generateRandomString();
      $_SESSION[$session] = $valid_users[0][0];
      $_SESSION[$session . "id"] = $valid_users[0][1];
      $user_status = $valid_users[0][0];
      setcookie("blog", $session , time()+3600);
      $body = "<div class='alert alert-success' role='alert'>You are in as " . $_POST["username"] . "!</div>";
    }
  }
else{
  $body = "<div class='alert alert-success' role='alert'>You signed out!</div>";
  $_SESSION[$_COOKIE["blog"]] = 0; //wanted to log out or just refreshed the page(his mistake) )
  $_SESSION[$_COOKIE["blog"] . "id"] = -1;
  $user_status = 0;
}
//code ends

//choose header
$header = ['<a class="p-2" href="index.php"><strong>Best blog you have ever met!</strong></a>', 'Sign out'];
//new user
if($user_status == 0){
  $header[1] = 'Sign in';
}
//loged in user
else if($user_status == 1){
  $header[0] = '
  <a class="p-2" href="user_articles.php"><strong>My artciles</strong></a>
  <a class="p-2" href="new_article.php"><strong>New article</strong></a>
  <a class="p-2" href="user_profile.php"><strong>My profile</strong></a>';
}
//admin
else if($user_status == 2){
  $header[0] = '
  <a class="p-2" href="user_articles.php"><strong>My artciles</strong></a>
  <a class="p-2" href="new_article.php"><strong>New article</strong></a>
  <a class="p-2" href="all_users.php"><strong>All users</strong></a>
  <a class="p-2" href="user_profile.php"><strong>My profile</strong></a>';
}
//god admin
  else if($user_status == 3){
    $header[0] = '
    <a class="p-2" href="user_articles.php"><strong>My artciles</strong></a>
    <a class="p-2" href="new_article.php"><strong>New article</strong></a>
    <a class="p-2" href="all_users.php"><strong>Edit users</strong></a>
    <a class="p-2" href="user_profile.php"><strong>My profile</strong></a>';
}
//header ends
//same part ends

//have to generate body
?>

<meta charset="utf-8">
<link rel = "stylesheet" href = "main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class = "container-fluid">
  <div class = "row menu">
      <div class = "col logo"><a href = index.php><h1>Welcome to BB!</h1></a></div>
      </div>
  <div class = "row menu">
    <div class="float-right col">
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <?php echo $header[0];?>
        </nav>
      </div>
    </div>
    <div class = "col-2 sign_out">
      <form action = "<?php if($user_status == 0) echo "sign_in"; else echo "ans_user"?>.php">
        <button class="btn btn-outline-dark"><?php echo $header[1]; ?></button>
      </form>
    </div>
  </div>
</div>
  <!-- same heading ends -->

  <?php echo $body;?>
