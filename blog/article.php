<?php
//page to look and comment an article

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
  <a class="p-2" href="edit_users.php"><strong>All users</strong></a>
  <a class="p-2" href="user_profile.php"><strong>My profile</strong></a>';
}
//god admin
  else if($user_status == 3){
    $header[0] = '
    <a class="p-2" href="user_articles.php"><strong>My artciles</strong></a>
    <a class="p-2" href="new_article.php"><strong>New article</strong></a>
    <a class="p-2" href="edit_users.php"><strong>Edit users</strong></a>
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
      <div class = "col logo"><a href = "/"><h1>Welcome to BB!</h1></a></div>
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
  <!-- same heading ends -->


<?php
if(isset($_GET["id"]) ){

  $query_result = mysqli_query($connection, 'SELECT header, text, time, user_id FROM articles WHERE id = ' . intval($_GET["id"]) );
  $article = mysqli_fetch_all($query_result)[0];
  if(isset($article)){
    $username = mysqli_fetch_all(mysqli_query($connection, 'SELECT username FROM users WHERE id = ' . $article[3]))[0];
    if(!$username)
      $username = ["Deleted User"];
    echo "<div id = 'article'><div class = 'name'><h1>" . $article[0] . "</h1>";
    if($user_status > 1 or $_GET['id'] == $_SESSION[$_COOKIE["blog"] . "id"]){
      echo'<h2><a href = "edit_article.php?id=' . $_GET['id'] . '">Edit</a></h2>';
    }
    echo "</div><p><a class = 'user_link' href='user.php?id=" . $article[2] . "'>by ". $username[0] . "</a> at " . $article[2] . "</p>
          <p>" . $article[1] . "</p>
        </div>";

    if(isset($_SESSION[$_COOKIE["blog"] . "id"]) != 0){
      echo "
        <div id = 'leave_comment'>
          <h3>Leave a comment:</h3>
          <form method = 'POST'>
            <div class='form-group'>
              <label for='exampleFormControlTextarea1'>Your comment:</label>
              <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name = 'text'></textarea>
            </div>
            <button type='submit' class='btn btn-outline-success'>Post it</button>
          </form>
        </div>";
        if(isset($_POST["text"]))
          if($_POST["text"] != ""){
            mysqli_query($connection, 'INSERT INTO comments (article_id, user_id, text) VALUES ('. intval($_GET["id"]) . ', ' . $_SESSION[$_COOKIE["blog"] . "id"] . ', "' . strip_tags($_POST["text"]) . '") ');
            echo "<div class='alert alert-success' role='alert'>Your comment was published!</div>";
        }
    }
  }
  else
    echo "<div class='alert alert-danger' role='alert'>Error: Not valid article id!</div>";
}
else
  echo "<div class='alert alert-danger' role='alert'>Error: Empty article id!</div>";
?>

  <div id = "comments">
    <h3>Comments:</h3>
    <?php
    $query_result = mysqli_query($connection, 'SELECT user_id, text, time FROM comments WHERE article_id = ' . $_GET["id"]);
    $comments = mysqli_fetch_all($query_result);
    echo '<ul>';
    foreach ($comments as $comment)
    {
        $user = mysqli_fetch_all(mysqli_query($connection, 'SELECT username FROM users WHERE id = "' . $comment[0] . '"'))[0];
        if(!$user)
          $user = ["Deleted User"];
        echo '<li>'. $user[0] . " " . $comment[2] . ': '.$comment[1].'</li>';
    }
    echo '</ul>';
    ?>
  </div>
</div>
