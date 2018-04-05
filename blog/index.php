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
      <form action = "<?php if($user_status == 0) echo "sign_in"; else echo "ans_user"?>.php">
        <button class="btn btn-outline-dark"><?php echo $header[1]; ?></button>
      </form>
    </div>
  </div>
  <!-- same heading ends -->

  <?php
  $query_result = mysqli_query($connection, 'SELECT header, id, user_id, time, text FROM articles ORDER BY time DESC');
  $articles = mysqli_fetch_all($query_result);
  foreach ($articles as $article) {
    $username = mysqli_fetch_all(mysqli_query($connection, 'SELECT username FROM users WHERE id = ' . $article[2]))[0];
    if(!$username)
      $username = ["Deleted User"];
    echo '<div class = "row article">
            <div class = "col-1"></div>
            <div class="card col">
              <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0">
                  <a class="text-dark" href="article.php?id=' . $article[1] . '">' . $article[0] . '</a>
                </h3>';

    if($user_status > 1 or $article[1] == $_SESSION[$_COOKIE["blog"] . "id"]){
      echo'<h4><a href = "edit_article.php?id=' . $article[1] . '">Edit</a></h4>';
    }
    echo       '<a class = "user_link" href="user_profile.php?id=' . $article[2] . '">by '. $username[0] . '</a>
                <div class="mb-1 text-muted"> ' . $article[3] . '</div>
                <p class="card-text mb-auto">' . substr($article[4], 0, 80) . '</p>
                <a href="article.php?id=' . $article[1] . '">Continue reading</a>
              </div>
            </div>
            <div class = "col-1 "></div>
          </div>';
  }
  ?>
</div>
