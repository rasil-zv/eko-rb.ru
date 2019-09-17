<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule('iblock');?>
<?
$check = htmlspecialchars($_POST["check"]);
$check_2 = htmlspecialchars($_POST["check_2"]);
$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["phone"]);
$date = htmlspecialchars($_POST["date"]);
$place = htmlspecialchars($_POST["place"]);
$time = htmlspecialchars($_POST["time"]);
$doctor = htmlspecialchars($_POST["doctor"]);
$doctor_work = htmlspecialchars($_POST["doctor_work"]);
$url = $_POST["url"];
$active_from = $_POST["active_from"];

if (($check_2 == 'check') && ($check == '')){
    $el = new CIBlockElement;
    $PROP = array();
    $PROP["NAME"] = $name;
    $PROP["PHONE"] = $phone;
    $PROP["DATE"] = $date;
    $PROP["PLACE"] = $place;
    $PROP["URL"] = $url;
    $PROP["TIME"] = $time;
    $PROP["DOCTOR"] = $doctor;
    $PROP["DOCTOR_WORK"] = $doctor_work;
    $arLoadProductArray = Array(
        "MODIFIED_BY"       => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"         => 8,
        "PROPERTY_VALUES"   => $PROP,
        "NAME"              => $date." | ".$name,
        "ACTIVE"            => "Y",
        "ACTIVE_FROM"       => $active_from,
    );
    /**/

    $to = $GLOBALS["wc_mail"];
    //$to = 'verstka6@site-rb.ru';
    
    $subject = 'Здоровье женщины и мужчины - заявка с сайта - '.$place;
    $message = '
        <html>
            <head>
                <title>'.$subject.'</title>
            </head>
            <body>
                <p>На вашем сайте "Здоровье женщины и мужчины" была заполнена форма обратной связи, с данными отправителя вы можете ознакомиться ниже:</p>
                <p>Фамилия и Имя: '.$name.'</p>
                <p>Телефон: '.$phone.'</p>
                <p>Дата предполагаемой записи: '.$date.'</p>
                <p>ФИО врача: '.$doctor.'</p>
                <p>Специальность врача: '.$doctor_work.'</p>
                <p>Удобное время для звонка: '.$time.'</p>
                <p>Место на странице, где была оставлена заявка: '.$place.'</p>
                <p>Страница, на которой была оставлена заявка: '.$url.'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Здоровье женщины и мужчины <mail@eko-rb.ru>\r\n";
    /**/
    if(($el->Add($arLoadProductArray)) && (mail($to, $subject, $message, $headers))){
        echo true;

        //////// коллтрекинг смарт
        $name=$_POST['name'];
        $mess='';
        $mess=str_replace(chr(13),'_',$mess);
        $mess=str_replace(chr(10),'_',$mess);
        $date_mail=date("Y-m-d H:i:s");
        $d=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat_mail/".$_POST['called_did'].".txt");
        $lines = count(file($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat_mail/".$_POST['called_did'].".txt"));
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/statforadmin/stat_mail/".$_POST['called_did'].".txt", "w+");
        $text2 = $date_mail."|".$subject."|".$name."|".$phone."|".$mess;
            fwrite($f, $text2."\n".$d); 
        fclose($f);
        /////////  
        
    } else {
        echo 'Проблема соединения с сервером. Попробуйте оставить свой отзыв позже.';
    }
} else {
    echo 'Неверно заполнены поля формы. Попробуйте обновить страницу и ввести данные заного.';
}
?>