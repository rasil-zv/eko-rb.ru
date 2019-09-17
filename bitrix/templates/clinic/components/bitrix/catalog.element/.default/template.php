<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>
<div class="service_detail reset">
    <?if ($arResult["DETAIL_PICTURE"]):?>
        <?$picture = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 1200, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
        <div class="detail_picture">
            <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-fancybox="<?=$arResult["ID"]?>">
                <img src="<?=$picture["src"]?>">
            </a>
        </div>
    <?endif;?>
    <?if ($arResult["DISPLAY_PROPERTIES"]["SIMPTOMI"]["VALUE"]):?>
        <div class="style_list">
            <p>Симптомы:</p>
            <ul>
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["SIMPTOMI"]["VALUE"] as $arLi):?>
                    <li><?=$arLi;?></li>
                <?endforeach;?>
            </ul>
        </div>
    <?endif;?>
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
    <?if ($arResult["DETAIL_TEXT"]):?>
        <div class="content">
            <?=$arResult["DETAIL_TEXT"]?>
        </div>
    <?endif;?>
    <?
    $arDoctors = array();
    $iblock_id = 6;
    $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y", "ACTIVE_DATE"=>"Y", "ID" => $arResult["PROPERTIES"]["DOCTOR_TO"]["VALUE"]);
    $arSelect = array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
    $arRes = CIBlockElement::GetList(
        Array("SORT" => "ASC"),
        $arFilter,
        false,
        Array("nPageSize" => 18),
        $arSelect
    );
    while($ob = $arRes->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $arDoctors[] = $arFields;
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
    <?if (($arResult["DISPLAY_PROPERTIES"]["ADD_SERVICES"]["LINK_ELEMENT_VALUE"]) || ($arResult["DISPLAY_PROPERTIES"]["ADD_SERVICES_SECTIONS"]["VALUE"])):?>
        <div class="content">
            <h2>Дополнительные услуги:</h2>
            <ul>
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["ADD_SERVICES_SECTIONS"]["VALUE"] as $arAddSect):?>
                    <?
                    $res = CIBlockSection::GetByID($arAddSect);
                    if($ar_res = $res->GetNext()){
                        echo '<li><a href="'.$ar_res["SECTION_PAGE_URL"].'">'.$ar_res["NAME"].'</a></li>';
                    }
                    ?>
                <?endforeach;?>
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["ADD_SERVICES"]["LINK_ELEMENT_VALUE"] as $arAddS):?>
                    <li><a href="<?=$arAddS["DETAIL_PAGE_URL"];?>"><?=$arAddS["NAME"];?></a></li>
                <?endforeach;?>
            </ul>
        </div>
    <?endif;?>
    <?if ($arResult["PROPERTIES"]["FOR_FILTER"]["VALUE"] != ""):?>
        <?$doctor_f = '';?>
        <?$i = 0;?>
        <?foreach($arResult["PROPERTIES"]["FOR_FILTER"]["VALUE"] as $val):?>
            <?if ($i == 0):?>
                <?$doctor_f = $doctor_f.$val?>
            <?else:?>
                <?$doctor_f = $doctor_f.'___'.$val;?>
            <?endif;?>
            <?$i++;?>
        <?endforeach;?>
    <?endif;?>
    <div class="prev_buttons">
        <?if ($arResult["PROPERTIES"]["BUTTON_PRICE"]["VALUE"] != ""):?>
            <a href="/prices/<?if ($arResult["PROPERTIES"]["PRICE_TO"]["VALUE"] != ""):?>?price_list_section=<?=$arResult["PROPERTIES"]["PRICE_TO"]["VALUE"]?><?endif;?>" class="btn small purple">Посмотреть стоимость</a>
        <?endif;?>
        <?/*if ($arResult["PROPERTIES"]["BUTTON_DOCTOR"]["VALUE"] != ""):?>
            <a href="/spetsialisti/" class="btn small green">Все врачи</a>
        <?endif;*/?>
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/detail_to_doctor.php"
        )
    );?>
    <div class="buttons">
        <a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>">Вернуться в раздел "<?=$arResult["SECTION"]["NAME"]?>"</a>
        <a href="/uslugi/">Вернуться к списку услуг</a>
    </div>
</div>