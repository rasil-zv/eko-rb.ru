<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news_list reset">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?><br>
<?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="item row no-gutters" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?if ($arItem["PREVIEW_PICTURE"]):?>
    <?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 300, "height" => 150), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
        <div class="picture col-lg-3">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$picture["src"]?>"></a>
        </div>
        <div class="main col-lg-9">
            <?else:?>
        <div class="main col-lg-12">
            <?endif;?>
            <div class="title">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
            </div>
            <?if ($arItem["DISPLAY_ACTIVE_FROM"]):?>
                <div class="date">
                    <?=$arItem["DISPLAY_ACTIVE_FROM"]?>
                </div>
            <?endif;?>
            <div class="text">
                <?if ($arItem["PREVIEW_TEXT"]):?>
                    <?=$arItem["PREVIEW_TEXT"]?>
                <?else:?>
                    <?=mb_strimwidth($arItem["DETAIL_TEXT"], 0, 150, "...");?>
                <?endif;?>
            </div>
        </div>
    </div>
    <?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>