<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="workers_list reset">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br>
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="item row no-gutters" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?if ($arItem["PREVIEW_PICTURE"]):?>
            <div class="picture col-lg-4">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"></a>
            </div>
            <div class="main col-lg-8">
        <?else:?>
            <div class="main col-lg-12">
        <?endif;?>
            <div class="title">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <?=$arItem["NAME"]?>
                    <?if ($arItem["DISPLAY_PROPERTIES"]["VIDEO"]):?>
                    <span class="icon">
                        <i class="fas fa-video"></i>
                    </span>
                    <?endif;?>
                </a>
            </div>
			<?if ($arItem["DISPLAY_PROPERTIES"]["WHATS_DOING"]):?>
                <div class="work w_block content">
                    <h3>Направления деятельности:</h3>
					<ul>
						<?foreach ($arItem["DISPLAY_PROPERTIES"]["WHATS_DOING"]["VALUE"] as $arWhatsDoing):?>
						<li><?=$arWhatsDoing?></li>
						<?endforeach;?>
					</ul>
                </div>
            <?endif;?>
            <?if ($arItem["DISPLAY_PROPERTIES"]["YEARS"]):?>
                <div class="work_count w_block">
                    <p>Стаж работы - <b><?=$arItem["DISPLAY_PROPERTIES"]["YEARS"]["VALUE"];?></b></p>
                </div>
            <?endif;?>
            <div class="desc content w_block">
                <?=$arItem["PREVIEW_TEXT"]?>
            </div>
            <?if ($arItem["DISPLAY_PROPERTIES"]["ADD_EDUCATION"]):?>
                <div class="education">
                    <h3>Дополнительное обучение:</h3>
                    <ul>
                        <?foreach ($arItem["DISPLAY_PROPERTIES"]["ADD_EDUCATION"]["VALUE"] as $arEducation):?>
                            <li><?=$arEducation;?></li>
                        <?endforeach;?>
                    </ul>
                </div>
            <?endif;?>
            <div class="button">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn purple">Подробнее</a>
            </div>
        </div>
    </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>

<?//dump ($arResult);?>