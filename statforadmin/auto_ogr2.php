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
				$names=file('stat_mail/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
                   		<?
                   		$d=new DateTime($pieces3[0]);
                   		$d1=new DateTime($_POST['date1']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d){
					

if ($value=='73472588856')$canal='yandex direct';
if ($value=='73472588072')$canal='seo';
if ($value=='73472588032')$canal='google advert';



$date=substr($pieces3[0], 0, 10);
$time=substr($pieces3[0], -8);

echo '<p>$date= '.$date.'</p>';	
echo '<p>$time= '.$time.'</p>';	
echo '<p>$kontakt= '.$pieces3[3].'</p>';	
echo '<p>$name= '.$pieces3[2].'</p>';	
echo '<p>$thema= '.$pieces3[1].'</p>';	
echo '<p>$text= '.$pieces3[4].'</p>';	
	
  if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://online.fvds.ru/add_mess.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, "obmen=1&table=table_eko_mess&canal={$canal}&date={$date}&time={$time}&kontakt={$pieces3[3]}&name={$pieces3[2]}&thema={$pieces3[1]}&text={$pieces3[4]}");
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
