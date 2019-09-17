<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="reset">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br>
    <?endif;?>
    <div class="articles_list row no-gutters">
        <?$count = 1;?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="item col-lg-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="main">
                    <?if ($arItem["PREVIEW_PICTURE"]):?>
                        <div class="picture">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
                        </div>
                    <?endif;?>
                    <div class="title">
                        <?=$arItem["NAME"]?>
                    </div>
                    <?if ($arItem["DISPLAY_ACTIVE_FROM"]):?>
                        <div class="date">
                            <?=$arItem["DISPLAY_ACTIVE_FROM"];?>
                        </div>
                    <?endif;?>
                    <div class="desc">
                        <?if ($arItem["PREVIEW_TEXT"]):?>
                            <?=mb_strimwidth($arItem["PREVIEW_TEXT"], 0, 150, "...");?>
                        <?else:?>
                            <?=mb_strimwidth($arItem["DETAIL_TEXT"], 0, 150, "...");?>
                        <?endif;?>
                    </div>
                    <div class="button">
                        подробнее...
                    </div>
                </a>
            </div>
            <?if (($count % 3) == 0):?>
                <div class="style_hr"></div>
            <?endif;?>
            <?$count++;?>
        <?endforeach;?>
    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>