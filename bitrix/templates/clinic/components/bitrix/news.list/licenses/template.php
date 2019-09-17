<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="licenses reset">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br>
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="title">
            <?=$arItem["NAME"]?>
        </div>
        <?if ($arItem["PREVIEW_TEXT"]):?>
            <div class="desc">
                <?=$arItem["PREVIEW_TEXT"];?>
            </div>
        <?endif;?>
        <div class="photos row no-gutters">
            <?foreach ($arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $arPicture):?>
            <div class="picture col-6 col-lg-2">
                <a href="<?=$arPicture["SRC"];?>" data-fancybox="<?=$arItem["ID"]?>">
					<?$picture = CFile::ResizeImageGet($arPicture, Array("width" => 150, "height" => 150), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                    <img src="<?=$picture["src"];?>">
                </a>
            </div>
            <?endforeach;?>
        </div>
    </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>