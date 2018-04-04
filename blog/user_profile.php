<?php
//main page where user can see all articles

//this part is same for all pages
//I will rewrite evrything
session_start();

//user status
$user_status = 0; //new user
if(isset($_SESSION[$_COOKIE["blog"]]))
  if($_SESSION[$_COOKIE["blog"]] != "")
    $user_status = $_SESSION[$_COOKIE["blog"]]; //real status
//---here can be some code

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

//connect to db
$data= json_decode(file_get_contents('server'), true);
$connection = mysqli_connect($data[0], $data[1], $data[2]);
mysqli_select_db($connection, 'blog');
mysqli_set_charset($connection, 'utf8');

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
      <form action = "<?php if($user_status == 0) echo "sign_in"; else echo "ans"?>.php">
        <button class="btn btn-outline-dark"><?php echo $header[1]; ?></button>
      </form>
    </div>
  </div>
</div>
  <!-- same heading ends -->

<?php
if(isset($_GET["id"])){
  $id = [intval($_GET["id"]), 0]; //just another user
  if($user_status > 1)// admin
    $id = [intval($_GET["id"]), 1];
}
else if(isset($_SESSION[$_COOKIE["blog"] . "id"]))
  $id = [$_SESSION[$_COOKIE["blog"] . "id"], 1]; //owner of artcles

if(isset($id)){
  $query_result = mysqli_query($connection, 'SELECT id, username, email, about, status FROM users WHERE id = ' . $id[0]);
  $user = mysqli_fetch_all($query_result)[0];
  if(isset($user)){
    echo ' <div class = "col"> <h1 class="mb-0" style = "margin-bottom:.5rem!important;  margin-top: 10px;">
            <a class="text-dark" href="user_profile.php?id=' . $user[0] . '">' . $user[1] . '</a>
          </h1>';
    if($user_status > 2 or $_SESSION[$_COOKIE["blog"] . "id"] == $user[0]){
        echo'<h6>' . $user[2] . '</h6>';
    }
    echo       '<p style = "margin-bottom:.5rem"><big>About:</big> '. ($user[3]=='' ? "---" :$user[3]) . '</p><h4> status: ';
    if($user[4] == 1)
      echo 'basic user';
    else if($user[3] == 2)
      echo 'admin';
    else if($user[4] == 3)
      echo 'god admin';
    else
      echo 'error';
    echo    '</h4><a href = "user_articles.php?id=' . $user[0] . '">User’s articles</a></div>';
  }
}
else{
  echo "<div class='alert alert-danger' role='alert'>Error: Empty id!</div>";
}
?>
