<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule('iblock');?>
<?
$check = htmlspecialchars($_POST["check"]);
$check_2 = htmlspecialchars($_POST["check_2"]);
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$phone = htmlspecialchars($_POST["phone"]);
$review = htmlspecialchars($_POST["review"]);
$date = htmlspecialchars($_POST["date"]);

if (($check_2 == 'check') && ($check == '')){
    $el = new CIBlockElement;
    $PROP = array();
    $PROP[11] = $name;
    $PROP[12] = $phone;
    $PROP[13] = $email;
    $arLoadProductArray = Array(
        "MODIFIED_BY"       => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"         => 7,
        "PROPERTY_VALUES"   => $PROP,
        "NAME"              => $date." | ".$name,
        "ACTIVE"            => "N",
        "PREVIEW_TEXT"      => $review,
        "ACTIVE_FROM"       => $date,
    );
    /**/
    $to = $GLOBALS["wc_mail"];
    $subject = 'Здоровье женщины и мужчины - новый отзыв.';
    $message = '
        <html>
            <head>
                <title>'.$subject.'</title>
            </head>
            <body>
                <p>На вашем сайте "Здоровье женщины и мужчины" была заполнена форма отзыва, с данными отправителя вы можете ознакомиться ниже:</p>
                <p>Имя: '.$name.'</p>
                <p>Телефон: '.$phone.'</p>
                <p>E-Mail: '.$email.'</p>
                <p>Отзыв: '.$review.'</p>
                <p>Ответить на вопрос вы можете через панель администратора в разделе Отзывы.</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Здоровье женщины и мужчины <mail@eko-rb.ru>\r\n";
    /**/
    if(($id = $el->Add($arLoadProductArray)) && (mail($to, $subject, $message, $headers))){
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