<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
$col = 4;
switch (count($arResult["ITEMS"])){
    case 1:
        $col = 12;
        break;
    case 2:
        $col = 6;
        break;
}
?>
<div class="ia_gallery">
    <div class="main row no-gutters" id="ia_gallery">
        <?foreach ($arResult["ITEMS"] as $arItem):?>
            <div class="item col-lg-<?=$col;?>">
                <?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 350, "height" => 300), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                <div class="picture" style="background-image:url(<?=$picture["src"]?>);"></div>
            </div>
        <?endforeach;?>
    </div>
    <div class="style_dots" id="adv_dots"></div>
</div>