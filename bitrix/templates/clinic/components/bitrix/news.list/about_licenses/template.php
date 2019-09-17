<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="about_licenses reset">
    <h2 class="title">Наши лицензии:</h2>
    <div class="list row no-gutters">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="item col-lg-2" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <?$i = 0;?>
                <?foreach ($arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $arPicture):?>
                    <?if ($i == 0):?>
                        <a href="<?=$arPicture["SRC"];?>" data-caption="<?=$arItem["NAME"]?>" data-fancybox="<?=$arItem["ID"]?>" data-thumbs='{"autoStart":true}'>
                            <?$picture = CFile::ResizeImageGet($arPicture, Array("width" => 150, "height" => 150), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                            <img src="<?=$picture["src"];?>">
                        </a>
                        <div style="display:none;">
                    <?else:?>
                        <a href="<?=$arPicture["SRC"];?>" data-caption="<?=$arItem["NAME"]?>" data-fancybox="<?=$arItem["ID"]?>" data-thumb="<?=$arPicture["SRC"];?>"></a>
                    <?endif;?>
                    <?$i++;?>
                <?endforeach;?>
                </div>
            </div>
        <?endforeach;?>
    </div>
    <div class="button">
        <a href="/licenzii/" class="btn small purple">
            Смотреть все лицензии
        </a>
    </div>
</div>