<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
$arSections = array();
$ob = CIBlockSection::GetList(
    Array("SORT" => "ASC"),
    Array("IBLOCK_ID" => 1, "DEPTH_LEVEL" => 1, "ACTIVE" => "Y"),
    false,
    Array("NAME", "ID", "SECTION_PAGE_URL"),
    false
);
while($res = $ob->GetNext()){
    $arSections["SECTIONS"][$res["ID"]] = $res;
    $ob_1 = CIBlockSection::GetList(
        Array("SORT" => "ASC"),
        Array("IBLOCK_ID" => 1, "SECTION_ID" => $res["ID"], "ACTIVE" => "Y"),
        false,
        Array("NAME", "ID", "SECTION_PAGE_URL"),
        false
    );
    while($res_1 = $ob_1->GetNext()){
        $arSections["SECTIONS"][$res["ID"]]["SECTIONS"][] = $res_1;
    }
    $ob_2 = CIBlockElement::GetList(
        Array("SORT" => "ASC"),
        Array("IBLOCK_ID" => 1, "SECTION_ID" => $res["ID"], "ACTIVE" => "Y"),
        false,
        false,
        Array("NAME", "ID", "DETAIL_PAGE_URL")
    );
    while($res_2 = $ob_2->GetNextElement()){
        $arFields = $res_2->GetFields();
        $arSections["SECTIONS"][$res["ID"]]["ELEMENTS"][] = $arFields;
    }
}
//dump($arSections);
?>
<div class="reset">
    <div class="content_title">
        Выберите интересующую вас услугу:
    </div>
    <div class="sections_list_list">
        <ul>
            <?foreach ($arSections["SECTIONS"] as $arSection):?>
                <li>
                    <div class="title">
                        <a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
                    </div>
                    <ul>
                        <?foreach ($arSection["SECTIONS"] as $arSect):?>
                            <li class="section">
                                <a href="<?=$arSect["SECTION_PAGE_URL"]?>"><?=$arSect["NAME"]?></a>
                            </li>
                        <?endforeach;?>
                        <?foreach ($arSection["ELEMENTS"] as $arElem):?>
                            <li class="element">
                                <a href="<?=$arElem["DETAIL_PAGE_URL"]?>"><?=$arElem["NAME"]?></a>
                            </li>
                        <?endforeach;?>
                    </ul>
                </li>
            <?endforeach;?>
        </ul>
    </div>
</div>
<?/*
<div class="reset">
	<h2 class="content_title">
		Выберите интересующее вас направление:
	</h2>
	<div class="sections_list row no-gutters">
		<?foreach ($arResult["SECTIONS"] as $arSection):?>
		<?
		if ($arSection["DEPTH_LEVEL"] != 1)
			continue;
		if ($arSection["PICTURE"]){
			$picture = $arSection["PICTURE"]["SRC"];
		} else {
			$picture = SITE_TEMPLATE_PATH.'/img/no_photo.png';
		}
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
		<div class="item_parent col-xl-3 col-lg-4" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="item">
				<div class="picture" style="background-image:url(<?=$picture?>)"></div>
				<div class="title">
					<?=$arSection["NAME"]?>
				</div>
			</a>
		</div>
		<?endforeach;?>
	</div>
</div>
*/?>