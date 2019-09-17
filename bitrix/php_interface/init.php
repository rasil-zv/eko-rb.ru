<?
function dump($val){
   echo '<pre>';
   print_r($val);
   echo '</pre>';
}
$GLOBALS['wc_mail'] = 'ekorb.ufa@gmail.com, jenschiny@yandex.ru, cc@eko-rb.ru';

AddEventHandler("main", "OnEndBufferContent", "delete_type");
function delete_type(&$content) {
	$content = str_replace(" type=\"text/javascript\"", false, $content);
}
?>