<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$color = $_POST["color"];

$_SESSION["version"]["color"] = $color;

echo true;