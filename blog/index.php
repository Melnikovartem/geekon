<?php
//main page where user can see all articles

//this part is same for all pages
//I will rewrite evrything
session_start();

//user status
$user_status = 0; //new user
if(isset($_SESSION[$_COOKIE["blog"]]))
  $user_status = $_SESSION[$_COOKIE["blog"]]; //real status

//---here can be some code

//code ends

//choose header
$header = "";
//new user
if($user_status = 0){
  $header = '';
}
//loged in user
else if($user_status = 1){
  $header = '
  <a class="p-2" href="sign_in.php"><strong>My artciles</strong></a>
  <a class="p-2" href="#"><strong>New article</strong></a>
  <a class="p-2" href="#"><strong>My profile</strong></a>';
}
//admin
else if($user_status = 2){
  $header = '
  <a class="p-2" href="#"><strong>My artciles</strong></a>
  <a class="p-2" href="#"><strong>New article</strong></a>
  <a class="p-2" href="#"><strong>Edit users</strong></a>
  <a class="p-2" href="#"><strong>My profile</strong></a>';
}
//god admin
  else if($user_status = 3){
    $header = '
    <a class="p-2" href="#"><strong>My artciles</strong></a>
    <a class="p-2" href="#"><strong>New article</strong></a>
    <a class="p-2" href="#"><strong>Edit users</strong></a>
    <a class="p-2" href="#"><strong>Edit admins</strong></a>
    <a class="p-2" href="#"><strong>My profile</strong></a>';
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
      <div class = "col logo"><a href = "/"><h1>Welcome to BB!</h1></a></div>
      </div>
  <div class = "row menu">
    <div class="float-right col">
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <?php echo $header?>
        </nav>
      </div>
    </div>
    <div class = "col-2 sign_out"><button class='btn btn-outline-dark'>Sign out</button></div>
  </div>
  <!-- same heading ends -->


  <div class = "row article">
    <div class = "col-1"></div>
    <div class="card col">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          <a class="text-dark" href="#">Featured post</a>
        </h3>
        <div class="mb-1 text-muted">Nov 12</div>
        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        <a href="#">Continue reading</a>
      </div>
    </div>
    <div class = "col-1 "></div>
  </div>
  <div class = "row article">
    <div class = "col-1"></div>
    <div class="card col">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          <a class="text-dark" href="#">Featured post</a>
        </h3>
        <div class="mb-1 text-muted">Nov 12</div>
        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        <a href="#">Continue reading</a>
      </div>
    </div>
    <div class = "col-1 "></div>
  </div>
</div>
