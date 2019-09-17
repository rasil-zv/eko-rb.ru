<?php
include_once 'include.php';

$numbers = array("yandex direct" => "73472588051", "seo" => "73472588072", "google advert" => "73472588032");// массив номеров название=>номер
$date=date("Y-m-d");
$mounth=date("m");
$year=date("Y");
$_POST['date4']='';
$_POST['date5']='';
$_POST['date3']=0;
?>
<?

class CsvReader
{ 
    private $file;
    private $delimiter; 
    private $length;
    private $handle; 
    private $csvArray; 
    
    public function __construct($file, $delimiter=";", $length = 8000) 
    { 
       $this->file = $file; 
       $this->length = $length; 
       $this->delimiter = $delimiter; 
       $this->FileOpen(); 
    } 
    public function __destruct() 
    { 
       $this->FileClose(); 
    } 
    public function GetCsv()
    {
        $this->SetCsv();
        if(is_array($this->csvArray)) 
         return $this->csvArray;
    }
    
    private function SetCsv()
    {
        if($this->GetSize())
        {
            while (($data = @fgetcsv($this->handle, $this->length, $this->delimiter)) !== FALSE)
            {
                $this->csvArray[] = $data;
            }
        }
    }
    private function FileOpen()
    {
        $this->handle=($this->IsFile())?fopen($this->file, 'r'):null;
    }
    private function FileClose()
    {
        if($this->handle) 
         @fclose($this->handle); 
    }
    private function GetSize()
    {
        if($this->IsFile())
            return (filesize($this->file));
        else
            return false;
    }
    private function IsFile()
    {
        if(is_file($this->file) && file_exists($this->file))
            return true;
        else
            return false;
    }
} 

class CsvWriter
{
    private $file;
    private $delimiter;
    private $array;
    private $handle;
    public function __construct($file, $array, $delimiter=";")
    {
        $this->file = $file; 
        $this->array = $array; 
        $this->delimiter = $delimiter;
        $this->FileOpen();
    }
    public function __destruct()
    {
        $this->FileClose();
    }
    public function GetCsv()
    {
        $this->SetCsv();
    }
    
    private function IsWritable()
    {
        if(is_writable($this->file))
            return true;
        else
            return false;
    }
    private function SetCsv() 
    { 
      if($this->IsWritable())
      {
          $content = ""; 
          foreach($this->array as $ar) 
          { 
             $content .= implode($this->delimiter, $ar);
             $content .= "\r\n"; 
          } 
          if (fwrite($this->handle, $content) === FALSE) 
                 exit;
      }
    }
    private function FileOpen()
    {
        $this->handle=fopen($this->file, 'w+');
    }
    private function FileClose()
    {
        if($this->handle) 
         @fclose($this->handle); 
    } 
}
?>

<select class="form-control" id="date3">
    <option value="0">Все номера</option>
    <?foreach ( $numbers as $key => $value ):?>
        <option value="<?=$value?>"><?=$key?></option>
     <?endforeach;?>
 </select>
<?
foreach ( $numbers as $key => $value ):
$_POST['date4'].=$value.';';
$_POST['date5'].=$key.';';
endforeach;
?>
 

 
<?

if ($_GET['flag']==1)
{
$_POST['date1']=$year.'-'.$mounth.'-01';
$_POST['date2']=$date;





$pieces1 = explode(";", $_POST['date4']);
$pieces2 = explode(";", $_POST['date5']);
$count_zv=0;
$count_zv_seg=0;
$count_s=0;
$count_s_seg=0;
$lid_plan=100;
$lid_tek=0;
$mounth=date("m");
$day=date("d");
$day_tek=date("d.m.Y");
$no_call=0;
switch ($mounth) {
    case 1:
        $kol_mounth=31;
    case 2:
        $kol_mounth=29;
    case 3:
        $kol_mounth=31;
    case 4:
        $kol_mounth=30;
    case 5:
        $kol_mounth=31;
    case 6:
        $kol_mounth=30;
    case 7:
        $kol_mounth=31;
    case 8:
        $kol_mounth=31;
    case 9:
        $kol_mounth=30;
    case 10:
        $kol_mounth=31;
    case 11:
        $kol_mounth=30;
    case 12:
        $kol_mounth=31;	
}

?>
<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
		<?$i=0;?>

<?
$str='
<style>
	table.lid{border-collapse:collapse;}
	table.oblid{border-collapse:collapse;border:0;}
	th{padding:10px;border:solid 1px #000;}
	td{padding:10px;vertical-align:top;}
	.red{color:#ff0000;}
	.green{color:#7cd751;}
</style>
<table class="oblid">
	<tr>
	<td>
		<h2>Лиды по звонкам за '.$day_tek.'</h2>
		<table class="lid">
            <thead>
                <tr>
                    <th>Поток</th>
                    <th>Номер телефона</th>
                    <th>Количество сообщений</th>
                </tr>
            </thead>
			<tbody>
';
?>
<?
$array[]=array(iconv("UTF-8", "windows-1251", 'Поток'),iconv("UTF-8", "windows-1251", 'Номер телефона'),iconv("UTF-8", "windows-1251", 'Количество сообщений'),'','','');
?>

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
                   		$d1=new DateTime($_POST['date2']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d){
                   			$count++;
							$count_zv_seg++; 

								  
$params = array(
    'pbx_call_id' => $pieces3[4],
);
$zd = new \Zadarma_API\Client(KEY, SECRET);
$answer = $zd->call('/v1/pbx/record/request/', $params);
$answerObject = json_decode($answer);
if ($answerObject->status == 'success') {

} else {
	$no_call++;
	
}							
							
                   		}
                   		?>
                       
				<?endforeach;?>
<?
$array[]=array(iconv("UTF-8", "windows-1251", $pieces2[$i]),iconv("UTF-8", "windows-1251", $value),iconv("UTF-8", "windows-1251", $count),'','','');
$str.='
					<tr>
                        <th>'.$pieces2[$i].'</th>
                        <th>'.$value.'</th>
                        <th>'.$count.'</th>
                	</tr>
';
?>				

			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
<?
$str.='
            </tbody>
        </table>
';
?>		


<?endif;?>
<?
$str.='
<p style="font-size:24px;"><strong>Количество звонков за сегодня: '.$count_zv_seg; 
if ($no_call!=0){
$str.='<span style="color:#ff0000">(не принято: '.$no_call.')</span>';
	}
$str.='</strong></p>
	</td>
	<td>
';

?>	


<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>



	<?if(strcmp($_POST['date3'], '0')==0):?>

		<?$i=0;?>	
<?
$str.='
		<h2>Лиды по звонкам за текущий месяц</h2>
		<table  class="lid" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Поток</th>
                    <th>Номер телефона</th>
                    <th>Количество сообщений</th>
                </tr>
            </thead>
			<tbody>
';

?>		

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
                   		if($d2 >= $d && $d1 <= $d){
                   			$count++;
							$count_zv++;

                   		}
                   		?>
                       
				<?endforeach;?>
<?
$str.='
					<tr>
                        <th>'.$pieces2[$i].'</th>
                        <th>'.$value.'</th>
                        <th>'.$count.'</th>
                	</tr>
';
?>

			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
<?
$str.='
            </tbody>
        </table>
';
?>	


	<?endif;?>
<?endif;?>
<?
$str.='
<p style="font-size:24px;"><strong>Общее количество звонков: '.$count_zv.'</strong></p>
	</td>
	</tr>
	<tr>
	<td>
';
?>	


<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
		<?$i=0;?>
<?
$str.='
		<h2>Лиды по сообщениям за '.$day_tek.'</h2>
		<table class="lid">
            <thead>
                <tr>
                    <th>Поток</th>
                    <th>Количество сообщений</th>
                </tr>
            </thead>
			<tbody>
';
?>	

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
                   		$d1=new DateTime($_POST['date2']." 00:00:00");
                   		$d2=new DateTime($_POST['date2']." 23:59:59");
                   		if($d2 >= $d && $d1 <= $d){
                   			$count++;
							$count_s_seg++;
                   		}
                   		?>
                       
				<?endforeach;?>
<?
$str.='
					<tr>
                        <th>'.$pieces2[$i].'</th>
                        <th>'.$count.'</th>
                	</tr>
';
?>	

			<?endif;?>
			<?$i++;?>
		<?endforeach;?>

<?endif;?>
<?
$str.='
			</tbody>
        </table>
	<p style="font-size:24px;"><strong>Количество сообщений за сегодня: '.$count_s_seg.'</strong></p>
	</td>	
	<td>
';
?>	

<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
		<?$i=0;?>
<?
$str.='
		<h2>Лиды по сообщениям за текущий месяц</h2>
		<table class="lid">
            <thead>
                <tr>
                    <th>Поток</th>
                    <th>Количество сообщений</th>
                </tr>
            </thead>
			<tbody>
';
?>	

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
							$count_s++;
                   		}
                   		?>
                       
				<?endforeach;?>
<?
$str.='
					<tr>
                        <th>'.$pieces2[$i].'</th>
                        <th>'.$count.'</th>
                	</tr>
';
?>	

			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
<?
$str.='
			</tbody>
        </table>
';
?>	

<?endif;?>
<?
$str.='
<p style="font-size:24px;"><strong>Общее количество сообщений: '.$count_s.'</strong></p>
	</td>
	</tr>
</table>
';
?>


<?
$lid_tek=$count_zv+$count_s;
$lid_prognoz=($lid_tek/$day)*$kol_mounth;
if ($lid_prognoz<$lid_plan) {$class="red";$tema_pod='Отстаем от графика!';}
else {$class="green";$tema_pod='Идем по графику!';}
?>
<?
$str.='
		<hr/>
		<h2>Итоговая таблица по лидам</h2>
		<table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>План кол-во лидов</th>
                    <th>Текущее кол-во лидов</th>
                    <th>Прогноз на конец месяца</th>
                </tr>
            </thead>
			<tbody>
				<tr>
                    <th>'.$lid_plan.'</th>
                    <th>'.$lid_tek.'</th>
                    <th class="'.$class.'">'.$lid_prognoz.'</th>
                </tr>
			</tbody>
        </table>
';
?>
<?
//$dd = new CsvWriter('file_mail.csv',$array);
//$dd->GetCsv();
?>
		
<?
echo '<hr>';
echo $str;
echo '</hr>';


$date=date("d.m.Y");
$to="om@site-rb.ru";
$to2="web@site-rb.ru";
$to3="marketing@site-rb.ru";
$to4="admin@site-rb.ru";
$to5="design3@site-rb.ru";
$to6="marketolog@site-rb.ru";
$subject="Автоматический ежедневный отчет по stoavto-l.ru - ".$date."- ".$tema_pod;
	

		
$message = $str;


$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From:stoavto-l.ru<stoavto-l.ru>\r\n";
$headers .= "Reply-To:stoavto-l.ru\r\n";
mail($to, $subject, $message, $headers);
mail($to2, $subject, $message, $headers);
mail($to3, $subject, $message, $headers);
mail($to4, $subject, $message, $headers);
mail($to5, $subject, $message, $headers);
mail($to6, $subject, $message, $headers);

echo '<div class="rezd">Ваша заявка принята</div>';




}
?>