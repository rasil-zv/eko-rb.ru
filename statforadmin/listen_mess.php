<?
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include ('amocrm/src/Entity.php');
include ('amocrm/src/Handler.php');
include ('amocrm/src/Note.php');
include ('amocrm/src/Request.php');
include ('amocrm/src/Task.php');
include ('amocrm/src/Webhook.php');
include ('amocrm/src/Lead.php');
include ('amocrm/src/Contact.php');
use \AmoCRM\Handler;
use \AmoCRM\Request;
use \AmoCRM\Lead;
use \AmoCRM\Contact;
use \AmoCRM\Note;
use \AmoCRM\Task;
$method = $_SERVER['REQUEST_METHOD'];
$c = true;
$email = NULL;
$utm_campaign = NULL;
$utm_term = NULL;
$utm_source = NULL;
$question = NULL;
$date = NULL;
?>

<?php ob_start(); ?>
<?
$numbers = array('mail' => '73472588170', "yandex direct" => "78005512436", "seo" => "73472588231", "google advert" => "73472588942", "vk" => "73472588275", "facebook" => "73472588230", "instagramm" => "73472588923");// массив номеров название=>номер
$crm_type="AMO";// пусто - ничего не отправляет, AMO - crm amo, BITRIX - crm Битрикс
$bitrix_webhook=""; //адрес вебхука в битрикс24 например, https://2apps.bitrix24.ru/rest/1/4l2lyf6rly5zbxjg/
$amo_domain="rmdsm";//префикс домена amocrm
$amo_login="marketing@dsmled.ru";//логин пользователя амо



if($_POST['name']!=""){
	
/*	
    $aaa=$_POST['call_start'];
    $d=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt");
    $lines = count(file($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt"));
    $f = fopen($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat/".$_POST['called_did'].".txt", "w+");
	$text2 = $_POST['caller_id']."|".$_POST['called_did']."|".$_POST['call_start']."|".$_POST['event']."|".$_POST['pbx_call_id']."|".$_POST['internal'];
  fwrite($f, $text2."\n".$d);
    fclose($f);
    $current_ist="";
    foreach ($numbers as $key => $value) {
      if(strcmp($_POST['called_did'], $value)==0){
        $current_ist=$key;
      }
    }
*/

//если crm AMO
  /*
  $lead->setCustomField(
			$api->config['LeadFieldCustom'], // ID поля
			$api->config['LeadFieldCustomValue1'] // ID значения поля
		)
		*/
	
echo '<p>тут</p>';
	
	$istochnik='';
	if ($_POST['called_did']=="78005512436") {$istochnik='Яндекс директ';}
	if ($_POST['called_did']=="73472588942") {$istochnik='Гугл реклама';}
	if ($_POST['called_did']=="73472588170") {$istochnik='E-mail рассылки';}
	if ($_POST['called_did']=="73472588231") {$istochnik='SEO';}	
		
		
if(strcmp($crm_type, 'AMO')==0){
    try {
echo '<p>тут AMO</p>';
  $api = new Handler($amo_domain,$amo_login, true);
  $lead = new Lead();
  $lead
    ->setName('Новое сообщение от '.$_POST['name'].', источник '.$istochnik)	
    ->setResponsibleUserId($api->config['ResponsibleUserId'])
    ->setStatusId($api->config['LeadStatusId']);
      $api->request(new Request(Request::SET, $lead));
      $lead = $api->last_insert_id;
} catch (\Exception $e) {
  echo $e->getMessage();
}
}
//если crm AMO конец

//если crm Битрикс
    if(strcmp($crm_type, 'BITRIX')==0){
        $queryUrl  = $bitrix_webhook.'crm.lead.add.json';
        $queryData = http_build_query(array(
        'fields' => array(
          'TITLE' => 'Новый звонок с сайта',
          'NAME' => $_POST['caller_id'],
          'COMMENTS' => 'Новый звонок с сайта.'.$_POST['caller_id'].', источник '.$current_ist,
        ),
    ));
    $curl      = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, 1);
    }
}
//если crm Битрикс конец
?>
