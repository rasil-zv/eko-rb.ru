<?php
include_once 'include.php';
$login="admin"; //логин для входа в систему
$pass="smart_sh";//пароль для входа в систему
$numbers = array("yandex direct" => "78462192745", "seo" => "78462192854", "google advert" => "78462192984");// массив номеров название=>номер
?>

<?if ($_GET['go']!=''){?>

		<?foreach($numbers as $value):?>
			<?if($value!=""):?>
				<?
				$names=file('stat/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
       <?

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
if ($pieces3[1]=='78462192745')$canal='yandex direct';
if ($pieces3[1]=='78462192854')$canal='seo';
if ($pieces3[1]=='78462192984')$canal='google advert';

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
    curl_setopt($curl, CURLOPT_POSTFIELDS, "obmen=1&table=table_stoavto&canal={$canal}&date={$date}&time={$time}&phone={$pieces3[0]}&talk={$flag}");
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
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
