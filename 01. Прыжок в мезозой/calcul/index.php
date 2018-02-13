
<form action='/' method='GET'>
    <input type='text' name='a' />
<select name='option'>
<option value = 'plus'>+</option>
<option value = 'minus'>-</option>
<option value = 'mult'>*</option>
<option value = 'dev'>/</option>
</select>
<input type='text' name='b' />
    <input type='submit' value='Отправить!' />
</form>
<p>ans:
<?php
if (isset($_GET["a"]) and isset($_GET["b"]) and isset($_GET["option"])) {
    $a = intval($_GET["a"]);
    $b = intval($_GET["b"]);
    $ans = 0;
    switch($_GET["option"]){
	case "plus":
		$ans = $a + $b;
		break;
	case "minus":
		$ans = $a - $b;
    break;
  case "dev":
    if ($b != 0)
      $ans = $a / $b;
    else {
      $ans = "error";
    }
    break;
  case "mult":
      $ans = $a * $b;
      break;
    }
    echo $ans;
}
?>
</p>
