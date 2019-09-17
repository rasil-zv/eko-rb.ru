<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
            <div class="icon">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="mainthings">
            </div>
            <div class="title"><?=$arItem["NAME"]?></div>
        </a>
    <?endforeach;?>
</div>