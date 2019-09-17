<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"section", 
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"PROPERTY_CODE" => array(
			0 => "",
			1 => $arParams["LIST_PROPERTY_CODE"],
			2 => "",
		),
		"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => "-",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"MESSAGE_404" => $arParams["~MESSAGE_404"],
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "N",
		"FILE_404" => $arParams["FILE_404"],
		"DISPLAY_COMPARE" => "N",
		"PAGE_ELEMENT_COUNT" => "0",
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
		"LOAD_ON_SCROLL" => "N",
		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
		"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
		"LABEL_PROP" => $arParams["LABEL_PROP"],
		"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
		"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
		"ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
		"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
		"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
		"PRODUCT_ROW_VARIANTS" => "[]",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
		"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
		"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
		"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
		"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
		"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
		"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
		"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
		"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
		"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
		"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
		"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
		"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
		"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
		"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
		"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
		"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
		"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
		"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => $basketAction,
		"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"COMPARE_NAME" => $arParams["COMPARE_NAME"],
		"USE_COMPARE_LIST" => "Y",
		"BACKGROUND_IMAGE" => (isset($arParams["SECTION_BACKGROUND_IMAGE"])?$arParams["SECTION_BACKGROUND_IMAGE"]:""),
		"COMPATIBLE_MODE" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "section",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_ALL_WO_SECTION" => "N",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SEF_MODE" => "Y",
		"SEF_RULE" => "/uslugi/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"SECTION_CODE_PATH" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	),
	false
);
$arElem = array();
$arFilter = Array("IBLOCK_ID" => 1, "CODE" => $arResult["VARIABLES"]["SECTION_CODE"]);
$rsSect = CIBlockSection::GetList(array('name' => 'asc'), $arFilter, false, array('UF_ADD_ELEMS', 'UF_ADD_SECTIONS', 'UF_TOP_INFO', 'UF_PRICE_TO', 'UF_DOCTOR_TO', 'UF_BUTTON_PRICE', 'UF_BUTTON_DOCTOR'));
if ($arSect = $rsSect->GetNext()){
    $arFilter1 = Array("IBLOCK_ID" => 1, "SECTION_ID" => $arSect['ID']);
	$rsSect1 = CIBlockSection::GetList(array('name' => 'asc'), $arFilter1, false, array('UF_ADD_ELEMS', 'UF_ADD_SECTIONS', 'UF_TOP_INFO', 'UF_PRICE_TO', 'UF_DOCTOR_TO', 'UF_BUTTON_PRICE', 'UF_BUTTON_DOCTOR'));
	while($arSect1 = $rsSect1->GetNext()){
		$arSect1 = getArrayElem($arSect1,true);
		$arSect1['ELEMENT'] = getElemSect($arSect1['ID']); 
		$arElem[$arSect1['SORT']][] = $arSect1;
	}
	$res2 = CIBlockElement::GetList(
        Array(),
        Array("IBLOCK_ID"=>1, "SECTION_ID"=>$arSect['ID'], "ACTIVE"=>"Y"),
        false,
        Array("nPageSize"=>250),
        Array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT")
	);
	while($ob2 = $res2->GetNextElement()){
		$arFields2 = $ob2->GetFields(); 
		$arFields2 = getArrayElem($arFields2,false);
		$arElem[$arFields2['SORT']][] = $arFields2;
	}
}
function getElemSect($id){
    $elem = array();
    $arFilter11 = Array("IBLOCK_ID"=>1, "SECTION_ID"=>$id);
    $rsSect11 = CIBlockSection::GetList(array('name' => 'asc'), $arFilter11, false, array('UF_ADD_ELEMS', 'UF_ADD_SECTIONS', 'UF_TOP_INFO', 'UF_PRICE_TO', 'UF_DOCTOR_TO', 'UF_BUTTON_PRICE', 'UF_BUTTON_DOCTOR'));
    while($arSect11 = $rsSect11->GetNext()){
        $arSect11 = getArrayElem($arSect11,true);
        $arSect11['ELEMENT'] = array();
        $arSect11['ELEMENT'] = getElemSect($arSect11['ID']);
        $elem[] = $arSect11;
    }
    $arSelect22 = Array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT");
    $arFilter22 = Array("IBLOCK_ID"=>1, "SECTION_ID"=>$id, "ACTIVE"=>"Y");
    $res22 = CIBlockElement::GetList(Array(), $arFilter22, false, Array("nPageSize"=>250), $arSelect22);
    while($ob22 = $res22->GetNextElement()){
        $arFields22 = $ob22->GetFields();
        $arFields22 = getArrayElem($arFields22,false);
        $elem[] = $arFields22;
    }
	return $elem;
}
function getArrayElem($arrayEl,$isSect){
	$ar = array();
	$ar['ID'] = $arrayEl['ID'];
	$ar['SORT'] = $arrayEl['SORT'];
	$ar['NAME'] = $arrayEl['NAME'];
	$ar['PICTURE'] = $arrayEl['PICTURE'];
	if (!empty($arrayEl['PREVIEW_PICTURE'])){
        $ar['PICTURE'] = $arrayEl['PREVIEW_PICTURE'];
    }
	$ar['DEPTH_LEVEL'] = $arrayEl['DEPTH_LEVEL'];
	$ar['CODE'] = $arrayEl['CODE'];
	$ar['DESCRIPTION'] = $arrayEl['DESCRIPTION'];
	if (!empty($arrayEl['PREVIEW_TEXT'])){
        $ar['DESCRIPTION'] = $arrayEl['PREVIEW_TEXT'];
    }
	$ar['DETAIL_PAGE_URL'] = $arrayEl['DETAIL_PAGE_URL'];
	if (!empty($arrayEl['SECTION_PAGE_URL'])){
        $ar['DETAIL_PAGE_URL'] = $arrayEl['SECTION_PAGE_URL'];
    }
	$ar['ISSECT'] = $isSect;
    $ar['DETAIL_TEXT'] = $arrayEl['DETAIL_TEXT'];
	return $ar;
}
ksort ($arElem);
function show_list($arItem){
    $l_link = '';
    $l_parent = '';
    if ($arItem["ISSECT"] == 1){
        $l_parent = true;
        if (!empty($arItem["ELEMENT"])){
            $l_link = true;
        }
    } else {
        if ($arItem["DETAIL_TEXT"]){
            $l_link = true;
        }
    }
    ?>
    <div class="item <?if ($l_link == true):?>with_link<?endif;?> item_in_list">
        <?if ($arItem["PICTURE"]):?>
            <div class="picture">
                <?if ($l_link == true):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=CFile::GetPath($arItem["PICTURE"]);?>"></a>
                <?else:?>
                    <img src="<?=CFile::GetPath($arItem["PICTURE"]);?>">
                <?endif;?>
            </div>
        <?endif;?>
        <div class="main">
            <div class="title <?if ($arItem["ISSECT"]):?>folder<?else:?>file<?endif;?>">
                <?if ($l_link == true):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                <?else:?>
                    <?=$arItem["NAME"]?>
                <?endif;?>
            </div>
            <?if (($l_parent == true) && ($arItem["ELEMENT"])):?>
                <div class="list">
                    <?foreach ($arItem["ELEMENT"] as $arListItem):?>
                        <?show_list($arListItem);?>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
    </div>
    <?
}
?>
<div class="section_list reset">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/detail_cons.php"
        )
    );?>
    <?if ($arSect["UF_TOP_INFO"]):?>
        <div class="desc content" style="border-bottom:1px solid #d8a3e2;padding-bottom:10px;margin-bottom:10px;">
            <?=$arSect["~UF_TOP_INFO"]?>
        </div>
    <?endif;?>
    <?foreach ($arElem as $arSort):?>
        <?foreach ($arSort as $arItem):?>
            <?
            $link = '';
            $parent = '';
            if ($arItem["ISSECT"]){
                $parent = true;
                if (!empty($arItem["ELEMENT"])){
                    $link = true;
                }
            } else {
                if ($arItem["DETAIL_TEXT"]){
                    $link = true;
                }
            }
            ?>
            <div class="item <?if ($link == true):?>with_link<?endif;?>">
                <?if ($arItem["PICTURE"]):?>
                <div class="picture">
                    <?if ($link == true):?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=CFile::GetPath($arItem["PICTURE"]);?>"></a>
                    <?else:?>
                        <img src="<?=CFile::GetPath($arItem["PICTURE"]);?>">
                    <?endif;?>
                </div>
                <?endif;?>
                <div class="main">
                    <div class="title <?if ($arItem["ISSECT"]):?>folder<?else:?>file<?endif;?>">
                        <?if ($link == true):?>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                        <?else:?>
                            <?=$arItem["NAME"]?>
                        <?endif;?>
                    </div>
                    <?if ($arItem["DESCRIPTION"]):?>
                        <div class="desc">
                            <?=$arItem["DESCRIPTION"]?>
                        </div>
                    <?endif;?>
                    <?if (($parent == true) && ($arItem["ELEMENT"])):?>
                        <div class="list">
                            <?foreach ($arItem["ELEMENT"] as $arListItem):?>
                                <?show_list($arListItem);?>
                            <?endforeach;?>
                        </div>
                    <?endif;?>
                </div>
            </div>
        <?endforeach;?>
    <?endforeach;?>
    <?
    $arDoctors = array();
    if (count($arSect["UF_DOCTOR_TO"]) != 0){
        $iblock_id = 6;
        $arFilterDoctors = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y", "ACTIVE_DATE"=>"Y", "ID" => $arSect["UF_DOCTOR_TO"]);
        $arSelectDoctors = array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
        $arResDoctors = CIBlockElement::GetList(
            Array("SORT" => "ASC"),
            $arFilterDoctors,
            false,
            Array("nPageSize" => 18),
            $arSelectDoctors
        );
        while($ob = $arResDoctors->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $arDoctors[] = $arFields;
        }
    }
    ?>
    <?if (count($arDoctors) != 0):?>
        <div class="doctors_slider_p js_slider_p reset">
            <h2>Специалисты клиники, которые помогут Вам в данном вопросе:</h2>
            <div class="doctors_slider js_slider row no-gutters">
                <?
                $col = 2;
                switch (count($arDoctors)){
                    case 1:
                        $col = 12;
                        break;
                    case 2:
                        $col = 6;
						break;
                    case 3:
                        $col = 4;
						break;
                    case 4:
                        $col = 3;
						break;
                }
                ?>
                <?foreach ($arDoctors as $doctor):?>
                    <div class="doctors_slider_item_p col-lg-<?=$col?>">
                        <a class="doctors_slider_item" href="<?=$doctor["DETAIL_PAGE_URL"]?>">
                            <div class="doctors_slider_picture">
                                <?$picture = CFile::ResizeImageGet($doctor["PREVIEW_PICTURE"], Array("width" => 200, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                                <img src="<?=$picture["src"]?>">
                                <div class="doctors_slider_title">
                                    <?=$doctor["NAME"]?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?endforeach;?>
            </div>
            <div class="style_dots js_slider_dots"></div>
        </div>
    <?endif;?>
    <?if (($arSect["UF_ADD_ELEMS"][0] != '') || ($arSect["UF_ADD_SECTIONS"][0] != '')):?>
        <div class="add_services content">
            <h2>Дополнительные услуги:</h2>
            <ul>
                <?foreach ($arSect["UF_ADD_SECTIONS"] as $arAddSect):?>
                    <?$res = CIBlockSection::GetByID($arAddSect);
                    if ($arRes = $res->GetNext()){
                        echo '<li><a href="'.$arRes["SECTION_PAGE_URL"].'">'.$arRes["NAME"].'</a></li>';
                    }
                    ?>
                <?endforeach;?>
                <?foreach ($arSect["UF_ADD_ELEMS"] as $arAddElem):?>
                    <?$res = CIBlockElement::GetByID($arAddElem);
                    if ($arRes = $res->GetNext()){
                        echo '<li><a href="'.$arRes["DETAIL_PAGE_URL"].'">'.$arRes["NAME"].'</a></li>';
                    }
                    ?>
                <?endforeach;?>
            </ul>
        </div>
    <?endif;?>
    <?if ($arSect["DESCRIPTION"]):?>
        <div class="desc content">
            <h2>Дополнительная информация:</h2>
            <?=$arSect["DESCRIPTION"]?>
        </div>
    <?endif;?>
</div>
<div class="service_detail reset">
    <div class="prev_buttons">
        <?if ($arSect["UF_BUTTON_PRICE"] != ""):?>
            <a href="/prices/<?if ($arSect["UF_PRICE_TO"] != ""):?>?price_list_section=<?=$arSect["UF_PRICE_TO"]?><?endif;?>" class="btn small purple">Посмотреть стоимость</a>
        <?endif;?>
        <?if ($arSect["UF_BUTTON_DOCTOR"] != ""):?>
            <a href="/spetsialisti/" class="btn small green">Все врачи</a>
        <?endif;?>
    </div>
</div>