<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Development');

//echo $GLOBALS["wc_mail"];
//Новости - 3
//Отзывы - 7
//Услуги - 1
$iblock_id = 1;
if ($_GET["api"] == 'true') {
    CModule::IncludeModule('iblock');
    //$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "ACTIVE", "XML_ID", "PROPERTY_PHONE");
    //$arSelect = Array("ID", "NAME", "PROPERTY_BUTTON_DOCTOR", "PROPERTY_BUTTON_PRICE");
    //$arFilter = Array("IBLOCK_ID" => $iblock_id);
    //$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    //$counter = 0;
    //while ($ob = $res->GetNextElement()) {
        //$arFields = $ob->GetFields();
        //$arProps = $ob->GetProperties();
        //$name = $arFields["NAME"];
		//$arParams = array("replace_space"=>"-","replace_other"=>"-");
		//$code = Cutil::translit($name, "ru", $arParams);
		//$name = mb_convert_case($name, MB_CASE_LOWER);
		//$name = mb_convert_case($name, MB_CASE_TITLE);
        //$new_name = $name.' - Выгруженное';
		//$replace = array("&amp;amp;amp;quot;");
		//$name = str_replace($replace, "", $name);
		//$name = str_replace("&quot;", '"', $name);
		//$name = str_replace($replace, "", $name);
        //$el = new CIBlockElement;
        //$props = array();
		//$props["NAME"] = $name;
		//$props["PHONE"] = $arFields["PROPERTY_PHONE_VALUE"];
		//$props["BUTTON_PRICE"] = "TRUE";
        //$arLoadProductArray = Array(
			//"DETAIL_TEXT_TYPE" => 'html',
			//"PREVIEW_TEXT_TYPE" => 'html',
            //"ACTIVE" => "N",
			//"NAME" => $name,
            //"PROPERTY_VALUES" => $props,
			//"CODE" => $code,
        //);
        //$el_res = $el->Update($arFields["ID"], $arLoadProductArray);
        //$db_props = CIBlockElement::GetProperty($iblock_id, $arFields["ID"], array("sort" => "asc"), Array("CODE"=>"BUTTON_PRICE"));
        //if($ar_props = $db_props->Fetch()){
        //    $prop = IntVal($ar_props["VALUE"]);
        //}
        //CIBlockElement::SetPropertyValueCode($arFields["ID"], "BUTTON_PRICE", 18);
        //CIBlockElement::SetPropertyValueCode($arFields["ID"], "BUTTON_DOCTOR", 19);
        //$counter++;
    //}
    //echo $counter;
    /*
    $arFilter = Array("IBLOCK_ID" => $iblock_id);
    $rsSect = CIBlockSection::GetList(array('name' => 'asc'), $arFilter, false, array('UF_BUTTON_PRICE', 'UF_BUTTON_DOCTOR'));
    $counter = 0;
    while($arSect = $rsSect->GetNext()){
        dump($arSect);
        $sec = new CIBlockSection;
        $arFields = Array(
            "UF_BUTTON_PRICE" => 1,
            "UF_BUTTON_DOCTOR" => 2,
        );
        $sec->Update($arSect["ID"], $arFields);
        $counter++;
    }
    echo $counter;
    */
}
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
