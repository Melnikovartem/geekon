<?php
  if(isset($_GET["style"])){
    setcookie("style", $_GET["style"], time()+1000);
  }
  else{
    setcookie("style", "base", time()+1000);
  }
?>

<meta charset="utf-8">
<link rel="stylesheet" href="my.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class = "change" id = <?php echo $_COOKIE["style"] ?>>
  <form action = "index.php" method = "GET">
    <select id = "inputState" class="form-control" name="style">
      <option value = "base" selected>Choose your style</option>
      <option value = "tech">Техно - мой стайл</option>
      <option value = "heya">HEYYEYAAEYAAAEYAEYAA</option>
      <option value = "yellow">Yellow</option>
    </select>
    <input type = "submit" value = "Я готов к преобразованиям (возможно мир не готов, нажать дважды)">
  </form>
</div>
