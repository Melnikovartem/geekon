<?php
  $color = $_COOKIE["style"];
  if(isset($_GET["style"])){
    setcookie("style", $_GET["style"], time()+10000);
    $color = $_GET["style"];
  }
  elseif (!isset($_COOKIE["style"])) {
    setcookie("style", "base", time()+10000);
  }
?>

<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class = "change" id = <?php echo $color ?>>
  <form action = "index.php" method = "GET">
    <select id = "inputState" class="form-control" name="style">
      <option value = "linux">Linux is better</option>
      <option value = "base" selected>Choose your style</option>
      <option value = "tech">Техно - мой стайл</option>
      <option value = "heya">HEYYEYAAEYAAAEYAEYAA</option>
      <option value = "yellow">Yellow</option>
      <option value = "tic-tac">Тик-так-тик-так</option>
    </select>
    <input type = "submit" value = "Я готов к преобразованиям">
  </form>
</div>
