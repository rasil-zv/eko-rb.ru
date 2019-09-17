<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line grd">
    <div class="container">
        <div class="news">
            <h2 class="title">Последние новости</h2>
            <div class="list row no-gutters">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="item col-lg-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="contain">
                        <?if ($arItem["PREVIEW_PICTURE"]):?>
                            <?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 500, "height" => 300), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                            <a class="picture" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background-image:url(<?=$picture["src"]?>)"></a>
                        <?endif;?>
                        <div class="main">
                            <div class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                            <?if ($arItem["DISPLAY_ACTIVE_FROM"]):?>
                                <div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"];?></div>
                            <?endif;?>
                            <?if ($arItem["PREVIEW_TEXT"]):?>
                                <div class="text"><?=$arItem["PREVIEW_TEXT"]?></div>
							<?elseif ($arItem["DETAIL_TEXT"]):?>
								<div class="text">
									<?
									$text = strip_tags($arItem["DETAIL_TEXT"]);
									$text = $text = substr($text, 0, 200);
									$text = rtrim($text, "!,.-");
									$text = substr($text, 0, strrpos($text, ' '));
									echo $text."...";
									?>
								</div>
							<?endif;?>
                            <div class="button"><a class="btn purple no_shadow" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a></div>
                        </div>
                    </div>
                </div>
                <?endforeach;?>
            </div>
            <div class="link"><a href="/novosti/">Читать все новости</a></div>
        </div>
    </div>
</div>