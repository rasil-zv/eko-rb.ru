<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line grey">
    <div class="container">
        <div class="doctors row no-gutters">
            <div class="desc col-lg-3">
                <div class="title">Специалисты<br><b>Клиники</b></div>
                <div class="text">
					
				</div>
                <div class="button"><a class="btn purple" href="/spetsialisti/">Подробнее</a></div>
            </div>
            <div class="list col-lg-9">
                <div class="page row no-gutters active">
                    <?$i = 1;?>
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="item col-lg-3">
                        <div class="picture">
                            <div class="main">
								<?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 200, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
								<img src="<?=$picture["src"]?>">
							</div>
                        </div>
                        <div class="back">
                            <div class="main">
                                <div class="name"><?=$arItem["NAME"]?></div>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
                            </div>
                        </div>
                    </div>
					<?if (($i == 8) || ($i == 16) || ($i == 24)):?>
                        </div><div class="page row no-gutters">
                    <?endif;?>
                    <?$i++;?>
                    <?endforeach;?>
                </div>
                <div class="nav">
                    <ul>
                        <li class="active"></li>
                        <?if (count($arResult["ITEMS"]) > 8):?>
                            <li></li>
                        <?endif;?>
						<?if (count($arResult["ITEMS"]) > 16):?>
                            <li></li>
                        <?endif;?>
						<?if (count($arResult["ITEMS"]) > 24):?>
                            <li></li>
                        <?endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>