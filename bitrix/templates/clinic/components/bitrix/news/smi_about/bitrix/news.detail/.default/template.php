<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="smi_about_detail reset">
    <?if ($arResult["DISPLAY_ACTIVE_FROM"]):?>
        <div class="date">
            <?=$arResult["DISPLAY_ACTIVE_FROM"];?>
        </div>
    <?endif;?>
    <?if ($arResult["PREVIEW_PICTURE"]):?>
        <div class="picture">
            <?$picture = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"]["ID"], Array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
            <a data-fancybox="detail" href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>">
                <img src="<?=$picture["src"];?>">
            </a>
        </div>
    <?endif;?>
    <?if ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]):?>
        <div class="video">
            <?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["~VALUE"]["TEXT"]?>
        </div>
    <?endif;?>
    <?if ($arResult["PREVIEW_TEXT"]):?>
        <div class="text content">
            <?=$arResult["PREVIEW_TEXT"]?>
        </div>
    <?endif;?>
</div>
