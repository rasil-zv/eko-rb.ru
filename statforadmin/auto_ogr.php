<?php
include_once 'include.php';
$login="admin"; //логин для входа в систему
$pass="smart_eko";//пароль для входа в систему
$numbers = array("yandex direct" => "73472588856", "seo" => "73472588072", "google advert" => "73472588032");// массив номеров название=>номер
?>

<?if ($_GET['go']!=''){?>
<?
$date=date("Y-m-d");
$mounth=date("m");
$year=date("Y");
$day=date("d");
// $day='01';
// $day2='31';
// $mounth='08';

$_POST['date1']=$year.'-'.$mounth.'-'.$day;
$_POST['date2']=$year.'-'.$mounth.'-'.$day;

?>
		<?foreach($numbers as $value):?>
			<?if($value!=""):?>
				<?
				$names=file('stat/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
                   		<?
                   		$d=new DateTime($pieces3[2]);
                   		$d1=new DateTime($_POST['date1']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d){
$flag=1;							
$params = array(
    'pbx_call_id' => $pieces3[4],
);
$zd = new \Zadarma_API\Client(KEY, SECRET);
$answer = $zd->call('/v1/pbx/record/request/', $params);
$answerObject = json_decode($answer);
if ($answerObject->status == 'success') {

} else {
	$flag=0;
	
}							
						

//if ($pieces3[1]=='73472588974')$canal='mail';
if ($pieces3[1]=='73472588856')$canal='yandex direct';
if ($pieces3[1]=='73472588072')$canal='seo';
if ($pieces3[1]=='73472588032')$canal='google advert';

$date=substr($pieces3[2], 0, 10);
$time=substr($pieces3[2], -8);
echo '<p>$canal= '.$pieces3[2].'</p>';	
echo '<p>$date= '.$date.'</p>';	
echo '<p>$time= '.$time.'</p>';	
echo '<p>$phone= '.$pieces3[0].'</p>';	
echo '<p>$flag= '.$flag.'</p>';	
	
  if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://online.fvds.ru/add.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "obmen=1&table=table_eko&canal={$canal}&date={$date}&time={$time}&phone={$pieces3[0]}&talk={$flag}");
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
  }
                   		}

							

                   		?>                       
				<?endforeach;?>
			<?endif;?>				
		<?endforeach;?>		
<?


 echo 'ok'; 
 
?>
<?
}
?>
