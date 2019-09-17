<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<?
$head_picture = '';
if ($head_picture == ''){
    $head_picture = SITE_TEMPLATE_PATH.'/img/head_title/'.rand(1,4).'.jpg';
}
//session_unset($_SESSION["version"]);
session_start();
if (!isset($_SESSION["version"])){
    $_SESSION["version"]["value"] = "wv_normal";
    $_SESSION["version"]["color"] = "wv_white";
    $_SESSION["version"]["size"] = "min";
    $_SESSION["version"]["kerning"] = "kern_1";
}
//dump($_SESSION["version"]);
?>
<!DOCTYPE html >
<html <?if ($_SESSION["version"]["value"] == 'wv_weak'):?>class="wv"<?endif;?> lang="ru">
	<head>
		<?$APPLICATION->ShowHead();?>
        <meta name="geo.placename" content="ул. Кирова, 52, Уфа, Респ. Башкортостан, Россия, 450078">
        <meta name="geo.position" content="54.7276860;55.9682970">
        <meta name="geo.region" content="RU-Республика Башкортостан">
        <meta name="ICBM" content="54.7276860, 55.9682970">
        <!--<meta name="google-translate-customization" content="aa796eb136fe4766-ed3142d3c4655083-g4bf69edee41df017-9">-->
        <meta name="cmsmagazine" content="e6a6457111f0a237227f5a9147c8e0ab">
		<title><?$APPLICATION->ShowTitle();?></title>
        <link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon/safari-pinned-tab.svg" color="#b8609d">
        <meta name="msapplication-TileColor" content="#eeeeee">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/libs.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/fontawesome.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/style.css?v=14052019" rel="stylesheet">
        <?if ($_SESSION["version"]["value"] == "wv_weak"):?>
            <link href="<?=SITE_TEMPLATE_PATH?>/css/wv/font_size/<?=$_SESSION["version"]["size"]?>.css?v=14052019" rel="stylesheet">
            <link href="<?=SITE_TEMPLATE_PATH?>/css/wv/kerning/<?=$_SESSION["version"]["kerning"]?>.css?v=14052019" rel="stylesheet">
            <link href="<?=SITE_TEMPLATE_PATH?>/css/wv/color/<?=$_SESSION["version"]["color"]?>.css?v=14052019" rel="stylesheet">
        <?endif;?>
        <!--new-->
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
        <?if ($_SESSION["version"]["value"] == "wv_normal"):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/include/normal/header.php"
                )
            );?>
        <?else:?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/include/weak/header.php"
                )
            );?>
        <?endif;?>
        <?if ($APPLICATION->GetCurPage(false) != '/'):?>
            <div class="line head_title_parent" style="background-image:url(<?=$head_picture;?>);">
                <div class="container">
                    <div class="head_title">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "breadcrumbs",
                            Array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "1"
                            )
                        );?>
                        <h1><?$APPLICATION->ShowTitle(false);?></h1>
                    </div>
                </div>
            </div>
            <div class="line p25">
                <div class="container">
                    <div class="content">
        <?endif;?>