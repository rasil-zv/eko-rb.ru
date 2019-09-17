<?php if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']); ?>
<?php ob_start(); ?> 
<?
if($_POST['called_did']!=""){
	$aaa=$_POST['call_start'];
	$d=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt");
	$lines = count(file($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt"));
	$f = fopen($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt", "w+");
	$text2 = $_POST['caller_id']."|".$_POST['called_did']."|".$_POST['call_start']."|".$_POST['event']."|".$_POST['pbx_call_id']."|".$_POST['internal'];



  fwrite($f, $text2."\n".$d); 
	fclose($f);
}  
?>