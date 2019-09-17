<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line">
    <div class="container">
        <div class="numbers row no-gutters">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div class="item col-lg-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="number"><?=$arItem["PROPERTIES"]["NUMBER"]["VALUE"]?></div>
                <div class="desc"><?=$arItem["NAME"]?></div>
            </div>
			<?endforeach;?>
        </div>
    </div>
</div>