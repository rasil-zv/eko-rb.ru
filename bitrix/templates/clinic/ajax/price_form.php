<?
$check = htmlspecialchars($_POST["check"]);
$check_2 = htmlspecialchars($_POST["check_2"]);
$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["phone"]);
$services = $_POST["services"];

$services_text = '';
foreach ($services as $service){
    $services_text .= $service.', ';
}
if (($check_2 == 'check') && ($check == '')){
    $to = $GLOBALS["wc_mail"];
    $subject = 'Здоровье женщины и мужчины - заявка с сайта - Запрос на услуги (Прайс-Лист)';
    $message = '
        <html>
            <head>
                <title>'.$subject.'</title>
            </head>
            <body>
                <p>На вашем сайте "Здоровье женщины и мужчины" была заполнена форма обратной связи, с данными отправителя вы можете ознакомиться ниже:</p>
                <p>Имя: '.$name.'</p>
                <p>Телефон: '.$phone.'</p>
                <p>Список выбранных услуг: '.$services_text.'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Здоровье женщины и мужчины <mail@eko-rb.ru>\r\n";
    if(mail($to, $subject, $message, $headers)){
        echo true;
    } else {
        echo 'Проблема соединения с сервером. Попробуйте оставить свой отзыв позже.';
    }
} else {
    echo 'Неверно заполнены поля формы. Попробуйте обновить страницу и ввести данные заного.';
}
?>