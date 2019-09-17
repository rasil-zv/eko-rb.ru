<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$kern = $_POST["kerning"];

$_SESSION["version"]["kerning"] = $kern;

echo true;