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
<?php if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']); ?>
<?php ob_start(); ?>
<?
$numbers = array('mail' => '73472588297', "yandex direct" => "73472588982", "seo" => "73472588293", "google advert" => "73472588913");// массив номеров название=>номер
$crm_type="BITRIX";// пусто - ничего не отправляет, AMO - crm amo, BITRIX - crm Битрикс
$bitrix_webhook="https://fors.bitrix24.ru/rest/1072/hhg0qnz2ot90jyxt/"; //адрес вебхука в битрикс24 например, https://2apps.bitrix24.ru/rest/1/4l2lyf6rly5zbxjg/
$amo_domain="";//префикс домена amocrm
$amo_login="";//логин пользователя амо



//если crm Битрикс
    if(strcmp($crm_type, 'BITRIX')==0){
        $queryUrl  = $bitrix_webhook.'crm.status.list.json';
        $queryData = http_build_query(array(
        'fields' => array(
		  "filter" => array("ENTITY_ID" => "SOURCE" ),
		  "order" => array("SORT" => "ASC" ),

         // 'COMMENTS' => 'Новый заявка с сайта.'.$_POST['caller_id'].', источник '.$current_ist,
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
echo '<pre>';
Print_r($result);
echo '</pre>';


//если crm Битрикс конец
?>
