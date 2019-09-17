<?php
include_once 'include.php';
?>
<?
$pieces1 = explode(";", $_POST['date4']);
$pieces2 = explode(";", $_POST['date5']);
//$_POST['date1']=$_POST['date2'];
?>
<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
	<?if(strcmp($_POST['date3'], '0')==0):?>
		<?$i=0;?>
		<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <thead>
                                                <tr>
                                                    <th>Кто звонил</th>
                                                    <th>Куда звонил</th>
                                                    <th>Когда звонил</th>
													<th>Запись</th>
													<th>Статус</th>
                                                </tr>
                                            </thead>
                                            </thead>
                                            <tbody>
		<?foreach($pieces1 as $value):?>
			<?if($value!=""):?>
				<?
				$count=0;
				$names=file('stat/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
        <?$pieces3 = explode("|", $name);?> 
                      <?
                      $d=new DateTime($pieces3[2]);
                      $d1=new DateTime($_POST['date1']." 00:00:00");
                      $d2=new DateTime($_POST['date2']." 23:59:59");
                      if($d2 >= $d && $d1 <= $d):?>
                      <tr>
                        <th><?=$pieces3[0]?></th>
                        <th><?=$pieces3[1]?></th>
                        <th><?=$pieces3[2]?></th>
						<th>
                          <?
						  $status1='';					  
                          $params = array(
    //'call_id' => '1458832388.1585217',
    'pbx_call_id' => $pieces3[4],
//    'lifetime' => 180,
);
$zd = new \Zadarma_API\Client(KEY, SECRET);
$answer = $zd->call('/v1/pbx/record/request/', $params);
$answerObject = json_decode($answer);
if ($answerObject->status == 'success') {
    foreach ($answerObject->links as $value) {
      echo "<audio src='".$value."' controls></audio>";
    }
	 $status1='Вызов был принят';
} else {
    $tt=$answerObject->message;
    if(stristr($tt, 'Requested file not found') === FALSE){
      echo $tt;
	   $status1='Вызов был не принят';
    }else{
      echo "Записи нет";
	  $status1='Вызов был не принят';
    }
}?>
                        </th>
						<th><?=$status1;?></th>
                  </tr>
                      <?endif;?>
                       
        <?endforeach;?>
			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
                                            </tbody>
                                        </table>
	






	<?else:?>
		<?$i=0;?>
		<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Кто звонил</th>
                                                    <th>Куда звонил</th>
                                                    <th>Когда звонил</th>
                                                    <th>Запись</th>
                                                </tr>
                                            </thead>
                                            <tbody>

				<?
				$count=0;
				$names=file('stat/'.$_POST['date3'].'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
                   		<?
                   		$d=new DateTime($pieces3[2]);
                   		$d1=new DateTime($_POST['date1']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d):?>
                      <tr>
                        <th><?=$pieces3[0]?></th>
                        <th><?=$pieces3[1]?></th>
                        <th><?=$pieces3[2]?></th>
                         <th>
                          <?
                          $params = array(
    //'call_id' => '1458832388.1585217',
    'pbx_call_id' => $pieces3[4],
//    'lifetime' => 180,
);
$zd = new \Zadarma_API\Client(KEY, SECRET);
$answer = $zd->call('/v1/pbx/record/request/', $params);
$answerObject = json_decode($answer);
if ($answerObject->status == 'success') {
    foreach ($answerObject->links as $value) {
      echo "<audio src='".$value."' controls></audio>";
    }
} else {
    $tt=$answerObject->message;
    if(stristr($tt, 'Requested file not found') === FALSE){
      echo $tt;
    }else{
      echo "Записи нет";
    }
}?>
                        </th>
                  </tr>
                   		<?endif;?>
                       
				<?endforeach;?>
					
		
                                            </tbody>
                                        </table>
	<?endif;?>
<?else:?>
		<span style="color:red;">Выберите дату!!!</span>
<?endif;?>
