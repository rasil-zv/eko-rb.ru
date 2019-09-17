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
                                                    <th>Дата отправки</th>
                                                    <th>Тема сообщения</th>
                                                    <th>Имя</th>
													<th>Номер телефона</th>
													<th>Текст сообщения</th>
                                                </tr>
                                            </thead>
                                            </thead>
                                            <tbody>
		<?foreach($pieces1 as $value):?>
			<?if($value!=""):?>
				<?
				$count=0;
				$names=file('stat_mail/'.$value.'.txt');
				?>
				<?foreach($names as $name):?>
        <?$pieces3 = explode("|", $name);?> 
                      <?
                      $d=new DateTime($pieces3[0]);
                      $d1=new DateTime($_POST['date1']." 00:00:00");
                      $d2=new DateTime($_POST['date2']." 23:59:59");
                      if($d2 >= $d && $d1 <= $d):?>
                      <tr>
                        <th><?=$pieces3[0]?></th>
                        <th><?=$pieces3[1]?></th>
                        <th><?=$pieces3[2]?></th>
						<th><?=$pieces3[3]?></th>
						<th><?=$pieces3[4]?></th>
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
                                                   <th>Дата отправки</th>
                                                    <th>Тема сообщения</th>
                                                    <th>Имя</th>
													<th>Номер телефона</th>
													<th>Текст сообщения</th>
                                                </tr>
                                            </thead>
                                            <tbody>
 
				<?
				$count=0;
				$names=file('stat_mail/'.$_POST['date3'].'.txt');
				?>
				<?foreach($names as $name):?>
				<?$pieces3 = explode("|", $name);?>	
                   		<?
                   		$d=new DateTime($pieces3[0]);
                   		$d1=new DateTime($_POST['date1']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d):?>
                      <tr>
                        <th><?=$pieces3[0]?></th>
                        <th><?=$pieces3[1]?></th>
                        <th><?=$pieces3[2]?></th>
                        <th><?=$pieces3[3]?></th>
						<th><?=$pieces3[4]?></th>

                  </tr>
                   		<?endif;?>
                       
				<?endforeach;?>
					
		
                                            </tbody>
                                        </table>
	<?endif;?>
<?else:?>
		<span style="color:red;">Выберите дату!!!</span>
<?endif;?>
