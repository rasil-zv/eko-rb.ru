<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line places_back" style="background-image:url('<?=SITE_TEMPLATE_PATH?>/img/n_back.jpg')">
    <div class="container">
        <div class="places row no-gutters">
            <?/*
                <div class="nav col-lg-3">
                    <!--
                    <h3>Направления</h3>
                    -->
                    <ul>
                        <?$i=0;?>
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                            <li <?if ($i == 0):?>class="active"<?endif;?> data-item="<?=$i?>"><?=$arItem["NAME"]?></li>
                            <?$i++;?>
                        <?endforeach;?>
                    </ul>
                </div>
                <div class="places_banner col-lg-6" id="places_banner">
                    <?$i=0;?>
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="item" data-item="<?=$i;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="title">
                                <?$name = str_replace('[', '<b>', $arItem["PROPERTIES"]["TITLE"]["VALUE"]);?>
                                <?$name = str_replace(']', '</b>', $name);?>
                                <?$name = str_replace('br', '<br>', $name);?>
                                <?=$name;?>
                            </div>
                            <div class="text content">
                                <?=$arItem["PREVIEW_TEXT"]?>
                            </div>
                            <div class="buttons">
                                <a class="btn purple big" href="<?=$arItem["PROPERTIES"]["LINK_PRICE"]["DESCRIPTION"]?>"><?=$arItem["PROPERTIES"]["LINK_PRICE"]["VALUE"]?></a>
                                <a class="btn white big" href="<?=$arItem["PROPERTIES"]["LINK_DETAIL"]["DESCRIPTION"]?>"><?=$arItem["PROPERTIES"]["LINK_DETAIL"]["VALUE"]?></a>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
                <!--<div class="picture col-lg-3"><img src="<?=SITE_TEMPLATE_PATH?>/img/doctor.png"></div>-->
            */?>
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="n_item_p col-lg-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="n_item">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="иконки">
                        <?=$arItem["NAME"];?>
                    </a>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>