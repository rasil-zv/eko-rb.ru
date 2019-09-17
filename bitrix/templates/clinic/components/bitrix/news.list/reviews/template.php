<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="list">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br>
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="main">
            <div class="head">
                <div class="date">
                    <?=$arItem["DISPLAY_ACTIVE_FROM"]?>
                </div>
                <div class="name">
                    <?=$arItem["DISPLAY_PROPERTIES"]["NAME"]["VALUE"]?>
                </div>
            </div>
            <div class="title">
                <?=$arItem["PREVIEW_TEXT"]?>
            </div>
        </div>
        <?if ($arItem["DETAIL_TEXT"]):?>
            <div class="desc">
                <?=$arItem["DETAIL_TEXT"]?>
            </div>
        <?endif;?>
    </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>