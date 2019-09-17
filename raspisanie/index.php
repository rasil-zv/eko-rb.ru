<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "В медицинском центре «Здоровье женщины и мужчины» в Уфе и Стерлитамаке платный прием ведут врачи различных специальностей, среди которых врачи высшей квалификации, кандидаты и доктора медицинских наук, профессора. Записаться на прием к врачу можно через online-форму или по телефону.");
$APPLICATION->SetPageProperty("title", "Расписание приема специалистов");
$APPLICATION->SetTitle("Расписание приема специалистов");
CModule::IncludeModule("iblock");
$iblock_id = 13;
$rsSect = CIBlockSection::GetList(
    Array("SORT"=>"ASC"),
    Array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y"),
    false,
    Array("NAME", "ID")
);
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
        } else {
            $dates[$i]["MONTH"] = $date_m + 1;
        }
        $new_m_d++;
    }
}
$result["SELECT"][] = "NAME";
$result["SELECT"][] = "IBLOCK_ID";
$result["SELECT"][] = "ID";
$result["SELECT"][] = "PROPERTY_DOCTOR";
foreach ($dates as $date){
    $eng_d = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    $rus_d = array("ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ", "ВС");
    $result["DATES"][] = str_replace($eng_d, $rus_d, $date);
}
while($arSect = $rsSect->GetNext()){
    $arSections[$arSect["ID"]] = $arSect;
    $rsElem = CIBlockElement::GetList(
        Array("SORT"=>"ASC"),
        Array("IBLOCK_ID" => $iblock_id, "SECTION_ID" => $arSect["ID"], "ACTIVE" => "Y"),
        false,
        false,
        $result["SELECT"]
    );
    while($arRes = $rsElem->GetNextElement()){
		$arElem = $arRes->GetFields();
		$arSections[$arSect["ID"]]["ELEMENTS"][$arElem["ID"]] = $arElem;
		$arProps = $arRes->GetProperties();
		foreach($arProps as $arProp){
			if ($arProp["DESCRIPTION"]){
				$arSections[$arSect["ID"]]["ELEMENTS"][$arElem["ID"]]["PROPERTY_".$arProp["CODE"]."_DESCRIPTION"] = $arProp["DESCRIPTION"];
			}
		}
        if ($arElem["PROPERTY_DOCTOR_VALUE"]){
            $rsDoc = CIBlockElement::GetByID($arElem["PROPERTY_DOCTOR_VALUE"]);
            if($arDoc = $rsDoc->GetNext())
                $arSections[$arSect["ID"]]["ELEMENTS"][$arElem["ID"]]["DOCTOR"]["NAME"] = $arDoc["NAME"];
                $arSections[$arSect["ID"]]["ELEMENTS"][$arElem["ID"]]["DOCTOR"]["LINK"] = $arDoc["DETAIL_PAGE_URL"];
        }
    }
}
?>
<div class="times_page reset">
    <h2 class="title">Ближайшие часы приема:</h2>
    <table>
        <tr>
            <td>Фамилия, Имя, Отчество</td>
            <?foreach ($result["DATES"] as $date):?>
                <td><?=$date["WEEK_DAY"]?></td>
            <?endforeach;?>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <?foreach ($result["DATES"] as $date):?>
                <td><?=$date["DATE"].' '.strtolower(FormatDate("F", mktime(0, 0, 0, $date["MONTH"], 1, date("Y"))));?></td>
            <?endforeach;?>
            <td></td>
        </tr>
        <?foreach ($arSections as $arSection):?>
            <tr class="section">
                <td colspan="9"><?=$arSection["NAME"]?></td>
            </tr>
            <?foreach ($arSection["ELEMENTS"] as $arElement):?>
                <tr>
                    <td>
                        <?if ($arElement["DOCTOR"]):?>
                            <a href="<?=$arElement["DOCTOR"]["LINK"]?>"><?=$arElement["DOCTOR"]["NAME"]?></a>
                        <?else:?>
                            <?=$arElement["NAME"]?>
                        <?endif;?>
                    </td>
                    <?foreach ($result["DATES"] as $date):?>
                        <td>
							<?=$arElement[$date["PROP_NAME"].'_VALUE']?>
							<?if ($arElement[$date["PROP_NAME"].'_DESCRIPTION']):?>
							<br>
							<span style="font-style:italic;font-weight:normal;"><?=$arElement[$date["PROP_NAME"].'_DESCRIPTION'];?></span>
							<?endif;?>
						</td>
                    <?endforeach;?>
                    <td><a href="#" class="feedback_button" data-place="Записаться на прием | <?=$arElement["NAME"]?>">записаться на прием</a></td>
                </tr>
            <?endforeach;?>
        <?endforeach;?>
    </table>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
