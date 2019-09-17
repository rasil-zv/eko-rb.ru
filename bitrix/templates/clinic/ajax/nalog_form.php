<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule('iblock');?>
<?
$check = htmlspecialchars($_POST["check"]);
$check_2 = htmlspecialchars($_POST["check_2"]);
$name = htmlspecialchars($_POST["nalog_name"]);
$second_name = htmlspecialchars($_POST["nalog_name_second"]);
$for = htmlspecialchars($_POST["nalog_for"]);
$email = htmlspecialchars($_POST["nalog_email"]);
$phone = htmlspecialchars($_POST["nalog_phone"]);
$place = htmlspecialchars($_POST["nalog_place"]);
$active_from = $_POST["active_from"];

if (($check_2 == 'check') && ($check == '')){
    $PROP = array();
    for($i = 0; $i < count($_FILES["nalog_docs"]["name"]); $i++){
        if ($_FILES['nalog_docs']["error"][$i] == 0){
            if (($_FILES['nalog_docs']["type"][$i] == 'image/png') || ($_FILES['nalog_docs']['type'][$i] == 'image/jpeg')){
                $PROP["DOCUMENTS"][] = CFile::MakeFileArray($_FILES['nalog_docs']['tmp_name'][$i]);
            } else {
                echo 'Неверный формат файла. Файл должен быть формата PNG или JPG (JPEG)';
                exit();
            }
        } else {
            echo 'Ошибка в загрузке документов. Попробуйте обновить страницу и попробовать снова.';
            exit();
        }
    }
    $el = new CIBlockElement;
    $PROP["NAME"] = $name;
    $PROP["NAME_SECOND"] = $second_name;
    $PROP["FOR"] = $for;
    $PROP["EMAIL"] = $email;
    $PROP["PHONE"] = $phone;
    $PROP["PLACE"] = $place;
    $arLoadProductArray = Array(
        "MODIFIED_BY"       => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"         => 24,
        "PROPERTY_VALUES"   => $PROP,
        "NAME"              => $active_from." | ".$name,
        "ACTIVE"            => "Y",
        "ACTIVE_FROM"       => $active_from,
    );
    $product_id = $el->Add($arLoadProductArray);
    $res = CIBlockElement::GetProperty(
        24,
        $product_id,
        array(),
        Array("CODE" => "DOCUMENTS")
    );
    $links = '<p>Ссылки на файлы:<br>';
    while ($ob = $res->GetNext()){
        $links .= '<a href="https://www.eko-rb.ru'.CFile::GetPath($ob["VALUE"]).'">Ссылка</a><br>';
    }
    $links .= '</p>';
    /**/
    //$to = $GLOBALS["wc_mail"];
    $to = 'reg@eko-rb.ru';
    $subject = 'Здоровье женщины и мужчины - заявка с сайта - Налоговый вычет';
    $message = '
        <html>
            <head>
                <title>'.$subject.'</title>
            </head>
            <body>
                <p>На вашем сайте "Здоровье женщины и мужчины" была заполнена форма обратной связи, с данными отправителя вы можете ознакомиться ниже:</p>
                <p>ФИО: '.$name.'</p>
                <p>ФИО налогоплательщика: '.$second_name.'</p>
                <p>За кого будет налоговый вычет: '.$for.'</p>
                <p>E-Mail: '.$email.'</p>
                <p>Телефон: '.$phone.'</p>
                <p>Где удобно забрать справки: '.$place.'</p>
                '.$links.'
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Здоровье женщины и мужчины <mail@eko-rb.ru>\r\n";
    /**/
    if(mail($to, $subject, $message, $headers)){
        echo true;
    } else {
        echo 'Проблема соединения с сервером. Попробуйте оставить свой отзыв позже.';
    }
} else {
    echo 'Неверно заполнены поля формы. Попробуйте обновить страницу и ввести данные заного.';
}
?>