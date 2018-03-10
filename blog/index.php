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
if($user_status = 0){
  $header = "";
}
else if($user_status = 1){
  $header = "";
}
else if($user_status = 2){
  $header = "";
}
//header ends
//same part ends

//have to generate body

?>
