<?php
//page where i send user(admin(god admin)) when he want to sign in/just registered

//this part is same for all pages
//I will rewrite evrything
session_start();

//user status
$user_status = 0; //new user
if(isset($_SESSION[$_COOKIE["blog"]]))
  $user_status = $_SESSION[$_COOKIE["blog"]]; //real status

//---here can be some code
$body = "";
//user wants to login/change and all post data is ok
if(iseet($_POST["username"]) and isset($_POST["password"]))
  //for unique cookies
  function generateRandomString($length = 30) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;

    //check the status of user
  }
else if{
  $_SESSION[$_COOKIE["blog"]] = 0; //wanted to log out or just refreshed the page(his mistake) )
  $body = "";
}



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

?>
