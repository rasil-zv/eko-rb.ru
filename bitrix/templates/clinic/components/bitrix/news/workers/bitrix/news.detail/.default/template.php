<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="workers_list reset detail">
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
    <div class="item row no-gutters">
        <?if ($arResult["PREVIEW_PICTURE"]):?>
        <div class="picture col-lg-4">
            <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>">
        </div>
        <div class="main col-lg-8">
        <?else:?>
            <div class="main col-lg-12">
        <?endif;?>
            <div class="title">
                <?=$arResult["NAME"]?>
            </div>
            <?if ($arResult["DISPLAY_PROPERTIES"]["WHATS_DOING"]):?>
                <div class="work w_block content">
                    <h3>Направления деятельности:</h3>
                    <ul>
                        <?foreach ($arResult["DISPLAY_PROPERTIES"]["WHATS_DOING"]["VALUE"] as $arWhatsDoing):?>
                            <li><?=$arWhatsDoing?></li>
                        <?endforeach;?>
                    </ul>
                </div>
            <?endif;?>
            <?if ($arResult["DISPLAY_PROPERTIES"]["YEARS"]):?>
                <div class="work_count w_block">
                    <p>Стаж работы - <b><?=$arResult["DISPLAY_PROPERTIES"]["YEARS"]["VALUE"];?></b></p>
                </div>
            <?endif;?>
            <div class="desc content w_block">
                <?=$arResult["PREVIEW_TEXT"]?>
            </div>
            <?if ($arResult["DISPLAY_PROPERTIES"]["ADD_EDUCATION"]):?>
                <div class="education">
                    <h3>Дополнительное обучение:</h3>
                    <ul>
                        <?foreach ($arResult["DISPLAY_PROPERTIES"]["ADD_EDUCATION"]["VALUE"] as $arEducation):?>
                            <li><?=$arEducation;?></li>
                        <?endforeach;?>
                    </ul>
                </div>
            <?endif;?>
			<?if ($arResult["DISPLAY_PROPERTIES"]["ADD_TEXT"]):?>
				<div class="w_block">
					<h3>Специализация:</h3>
					<div class="content">
						<?=$arResult["DISPLAY_PROPERTIES"]["ADD_TEXT"]["VALUE"]["TEXT"]?>
					</div>
				</div>
			<?endif;?>
            <?
            $date_d = date(d);
            $date_m = date(n);
            $date_count = date(t);
            $month_count = 12;
            $new_m_d = 1;
            $dates = array();
            for ($i = 0; $i <= 6; $i++){
                $new_month = false;
                if (($date_d + $i) > $date_count){
                    $new_month = true;
                } else {
                    $dates[$i]["DATE"] = $date_d + $i;
                    $dates[$i]["PROP_NAME"] = 'PROPERTY_D_'.($date_d + $i);
                    $result["SELECT"][] = 'PROPERTY_D_'.($date_d + $i);
                    $dates[$i]["MONTH"] = $date_m;
                };
                $dates[$i]["WEEK_DAY"] = date("D", strtotime("+".$i." day"));
                if ($new_month == true){
                    $dates[$i]["DATE"] = $new_m_d;
                    $dates[$i]["PROP_NAME"] = 'PROPERTY_D_'.$new_m_d;
                    $result["SELECT"][] = 'PROPERTY_D_'.$new_m_d;
                    if ($date_m == '12'){
                        $dates[$i]["MONTH"] = '1';
                    }
                    $new_m_d++;
                }
            }
            $result["SELECT"][] = "NAME";
            $result["SELECT"][] = "ID";
            $result["SELECT"][] = "IBLOCK_SECTION_ID";
            $result["SELECT"][] = "PROPERTY_DOCTOR";
            foreach ($dates as $date){
                $eng_d = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
                $rus_d = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
                $result["DATES"][] = str_replace($eng_d, $rus_d, $date);
            }
            CModule::IncludeModule("iblock");
            $rsTimes = CIBlockElement::GetList(
                Array("SORT"=>"ASC"),
                Array("IBLOCK_ID" => 13, "PROPERTY_DOCTOR" => $arResult["ID"]),
                false,
                false,
                $result["SELECT"]
            );
            ?>
            <?if ($rsTimes->SelectedRowsCount() != 0):?>
                <div class="times w_block content">
                    <div class="l_title">
                        Ближайшие часы приема:
                    </div>
                    <div class="main">
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="list">
                            <table>
                                <?
                                while($arTimes = $rsTimes->GetNext()){
                                    $rsSect = CIBlockSection::GetByID($arTimes["IBLOCK_SECTION_ID"]);
                                    if ($arSect = $rsSect->GetNext()):?>
                                        <tr>
                                            <td colspan="2" class="section"><?=$arSect["NAME"]?></td>
                                        </tr>
                                    <?endif;?>
                                    <?foreach ($result["DATES"] as $date):?>
                                        <tr>
                                            <td><?=$date["WEEK_DAY"]?> (<?=$date["DATE"].' '.strtolower(FormatDate("F", mktime(0, 0, 0, $date["MONTH"], 1, date("Y"))));?>)</td>
                                            <td><?=$arTimes[$date["PROP_NAME"].'_VALUE']?></td>
                                        </tr>
                                    <?endforeach;?>
                                <?}?>
                            </table>
                        </div>
                    </div>
                </div>
            <?endif;?>
            <?if ($arResult["DISPLAY_PROPERTIES"]["TIMES"]):?>
                <div class="times w_block content">
                    <div class="l_title">
                        Часы приема:
                    </div>
                    <div class="main">
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="list">
                            <?$i = 0;?>
                            <table>
                                <?foreach ($arResult["DISPLAY_PROPERTIES"]["TIMES"]["VALUE"] as $arTime):?>
                                    <tr>
                                        <td><?=$arTime?></td>
                                        <td><?=$arResult["DISPLAY_PROPERTIES"]["TIMES"]["DESCRIPTION"][$i]?></td>
                                    </tr>
                                    <?$i++;?>
                                <?endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
            <?endif;?>
            <?if ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]):?>
                <div class="video">
                    <?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["~VALUE"]["TEXT"];?>
                </div>
            <?endif;?>
        </div>
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
</div>