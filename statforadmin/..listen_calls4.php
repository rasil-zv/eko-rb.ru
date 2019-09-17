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
$amo_domain="rmdsm";//префикс домена amocrm
$amo_login="marketing@dsmled.ru";//логин пользователя амо

//require('autoload.php');

 $api = new Handler($amo_domain,$amo_login,true);
echo '<pre>';
 print_r($api->request(new Request(Request::INFO))->result);
echo '</pre>';
 ?>