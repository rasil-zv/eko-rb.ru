<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$fz = $_POST["font_size"];

$_SESSION["version"]["size"] = $fz;

echo true;