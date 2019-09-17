<?php
header('Content-Type: text/html; charset=windows-1251');
//echo "<pre>";
//print_r($_POST);
//print_r($_GET);
?>

<html>
<head>
<link rel="icon" href="favv.ico" type="image/x-icon" />
<title>Платеж успешно совершен</title>
</head>
<center>
<br><br><br>
<img src="ok.png">
<br><br><br>
<font color="#3BB54A" size="11">
  <?php
  @require_once("class/main.php");
  $m = new m();

  $id = @preg_replace ("/[^a-zA-Z0-9]/","",$_GET['id']);
   if($id!=""){
   	print $m->finalIDtxt($id);
   }
  ?>
</font>
</center>
</html>