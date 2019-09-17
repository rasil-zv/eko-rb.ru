<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$version = $_POST["version"];

$_SESSION["version"]["value"] = $version;

echo true;