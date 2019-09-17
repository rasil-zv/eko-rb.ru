<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="banner">
    <div class="main" id="index_banner">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
		<?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 1920), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
		<div class="item" style="background-image:url(<?=$picture["src"]?>); <?if ($arItem["PROPERTIES"]["POSITION"]["VALUE"]):?>background-position:<?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?>;<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="container">
                <div class="text">
                    <div class="title">
                        <?$name = str_replace('[', '<b>', $arItem["NAME"]);?>
                        <?$name = str_replace(']', '</b>', $name);?>
                        <?$name = str_replace('br', '</br>', $name);?>
                        <?=$name;?>
                    </div>
					<?if ($arItem["PREVIEW_TEXT"]):?>
                        <div class="desc">
                            <?=$arItem["PREVIEW_TEXT"]?>
                        </div>
					<?endif;?>
                    <?if ($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
						<div class="button">
							<a class="btn purple small" href="<?=$arItem["PROPERTIES"]["LINK"]["DESCRIPTION"]?>">
								<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>
							</a>
						</div>
                    <?endif;?>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
	<div class="style_dots" id="slider_dots"></div>
	<!--
    <div class="nav slick_nav">
        <button class="left" id="banner_left_nav"><i class="fas fa-angle-left"></i></button>
        <button class="right" id="banner_right_nav"><i class="fas fa-angle-right"></i></button>
    </div>
	-->
</div>