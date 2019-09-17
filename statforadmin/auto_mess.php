<?php
include_once 'include.php';
$login="admin"; //логин для входа в систему
$pass="smart_fors";//пароль для входа в систему
$numbers = array("yandex direct" => "78462192745", "seo" => "78462192854", "google advert" => "78462192984");// массив номеров название=>номер
?>
<?if ($_GET['go']!=''){?>
		<?foreach($numbers as $value):?>
			<?if($value!=""):?>
				<?
				$names=file('stat_mail/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
                   		<?				
						

//if ($value=='73472588974')$canal='mail';
if ($value=='78462192745')$canal='yandex direct';
if ($value=='78462192854')$canal='seo';
//if ($value=='73472588451')$canal='fb';
//if ($value=='73472588452')$canal='instagramm';
if ($value=='78462192984')$canal='google advert';
//if ($value=='73472588417')$canal='vk';


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
    curl_setopt($curl, CURLOPT_POSTFIELDS, "obmen=1&table=table_stoavto_mess&canal={$canal}&date={$date}&time={$time}&kontakt={$pieces3[3]}&name={$pieces3[2]}&thema={$pieces3[1]}&text={$pieces3[4]}");
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
