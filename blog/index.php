<?php
//I will rewrite evrything
session_start();


$user_status = 0; //new user
if(isset($_SESSION[$_COOKIE["blog"]]) )
  $user_status = $_SESSION[$_COOKIE["blog"]] //real status

//choose header (same faor all pages)
$header = ""
if($user_status = 0){
  $header = ""
}
else if($user_status = 1){
  $header = ""
}
else if($user_status = 2){
  $header = ""
}
//header ends

?>
