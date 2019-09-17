<?php
?>
<?
$pieces1 = explode(";", $_POST['date4']);
$pieces2 = explode(";", $_POST['date5']);
?>
<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
	<?if(strcmp($_POST['date3'], '0')==0):?>
		<?$i=0;?>
		<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Поток</th>
                                                    <th>Количество сообщений</th>
                                                </tr>
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
                   		if($d2 >= $d && $d1 <= $d){
                   			$count++;
                   		}
                   		?>
                       
				<?endforeach;?>
					<tr>
                        <th><?=$pieces2[$i]?></th>
                        <th><?=$count?></th>
                	</tr>
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
                                                    <th>Поток</th>
                                                    <th>Количество сообщений</th>
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
                   		if($d2 >= $d && $d1 <= $d){
                   			$count++;
                   		}
                   		?>
                       
				<?endforeach;?>
					<tr>
                        <th><?=$_POST['date3v']?></th>
                        <th><?=$count?></th>
                	</tr>
		
                                            </tbody>
                                        </table>
	<?endif;?>
<?else:?>
		<span style="color:red;">Выберите интервал дат!!!</span>
<?endif;?>
