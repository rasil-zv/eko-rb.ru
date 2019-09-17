<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="smi_about reset">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br>
    <?endif;?>
    <div class="list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="item row no-gutters" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if (
                    ($arItem["DISPLAY_PROPERTIES"]["VIDEO"] != '') ||
                    ($arItem["PREVIEW_PICTURE"]["SRC"] != '')
                ):?>
                <div class="col-lg-5 left">
                    <?if ($arItem["DISPLAY_PROPERTIES"]["VIDEO"]):?>
                        <?=$arItem["DISPLAY_PROPERTIES"]["VIDEO"]["~VALUE"]["TEXT"]?>
                    <?else:?>
                        <?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <div class="picture" style="background-image:url(<?=$picture["src"]?>)"></div>
                        </a>
                    <?endif;?>
                </div>
                <div class="left col-lg-7 right">
            <?else:?>
                <div class="left col-lg-12 right">
            <?endif;?>
                    <div class="title">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <?=$arItem["NAME"]?>
                        </a>
                    </div>
                    <?if ($arItem["DISPLAY_ACTIVE_FROM"]):?>
                        <div class="date">
                            <?=$arItem["DISPLAY_ACTIVE_FROM"];?>
                        </div>
                    <?endif;?>
                    <?if ($arItem["PREVIEW_TEXT"]):?>
                        <div class="desc">
                            <div class="text content">
                                <?
                                $text = strip_tags($arItem["PREVIEW_TEXT"]);
                                $text = $text = substr($text, 0, 330);
                                $text = rtrim($text, "!,.-");
                                $text = substr($text, 0, strrpos($text, ' '));
                                echo $text."...";
                                ?>
                            </div>
                        </div>
                    <?endif;?>
                    <div class="button">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">подробнее...</a>
                    </div>
                </div>
        </div>
        <?endforeach;?>
    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>