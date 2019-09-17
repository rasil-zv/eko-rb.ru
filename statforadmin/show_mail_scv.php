<?php
include_once 'include.php';
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
<?
$pieces1 = explode(";", $_POST['date4']);
$pieces2 = explode(";", $_POST['date5']);
?>
<?if($_POST['date1']!=""&&$_POST['date2']!=""):?>
	<?if(strcmp($_POST['date3'], '0')==0):?>
		<?$i=0;?>

<?
$array[] =array('Канал','Дата отправки','Тема сообщения','Имя','Номер телефона','Текст сообщения');
$array[] =array('','','','','','');
?>

		<?foreach($pieces1 as $value):?>
			<?if($value!=""):?>
				<?
				$count=0;
				$names=file('stat_mail/'.$value.'.txt');
				
	
if ($value=='78462192745') $kanal='yandex direct';		
if ($value=='78462192854') $kanal='seo';		
if ($value=='78462192984') $kanal='google advert';


				
				?>
				<?foreach($names as $name):?>
        <?$pieces3 = explode("|", $name);?> 
                      <?
                      $d=new DateTime($pieces3[0]);
                      $d1=new DateTime($_POST['date1']." 00:00:00");
                      $d2=new DateTime($_POST['date2']." 23:59:59");
                      if($d2 >= $d && $d1 <= $d):?>
<?
$array[]=array(iconv("UTF-8", "windows-1251", $kanal),iconv("UTF-8", "windows-1251", $pieces3[0]),iconv("UTF-8", "windows-1251", $pieces3[1]),iconv("UTF-8", "windows-1251", $pieces3[2]),iconv("UTF-8", "windows-1251", $pieces3[3]),iconv("UTF-8", "windows-1251", $pieces3[4]));
?>					  

                      <?endif;?>
                       
				<?endforeach;?>
			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
<?
$dd = new CsvWriter('file.csv',$array);
$dd->GetCsv();
?>
<a href="file.csv">file.csv</a>

	<?else:?>
		<?$i=0;?>

<?
$array[] =array('Канал','Дата отправки','Тема сообщения','Имя','Номер телефона','Текст сообщения');
$array[] =array('','','','','','');
?>

		<?foreach($pieces1 as $value):?>
			<?if($value!=""):?>
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
<?
$array[]=array(iconv("UTF-8", "windows-1251", $_POST['date3']),iconv("UTF-8", "windows-1251", $pieces3[0]),iconv("UTF-8", "windows-1251", $pieces3[1]),iconv("UTF-8", "windows-1251", $pieces3[2]),iconv("UTF-8", "windows-1251", $pieces3[3]),iconv("UTF-8", "windows-1251", $pieces3[4]));
?>					  

                      <?endif;?>
                       
				<?endforeach;?>
			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
<?
$dd = new CsvWriter('file.csv',$array);
$dd->GetCsv();
?>
<a href="file.csv">file.csv</a>		
		
		
		
	<?endif;?>
<?else:?>
		<span style="color:red;">Выберите дату!!!</span>
<?endif;?>
