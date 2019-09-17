<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line">
    <div class="container">
        <div class="reviews">
			<h2 class="title">Отзывы</h2>
            <div class="reviews_banner" id="reviews_banner">
				<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
                <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="main">
						<div class="text">
                            <?
                            $text = strip_tags($arItem["PREVIEW_TEXT"]);
                            $text = $text = substr($text, 0, 330);
                            $text = rtrim($text, "!,.-");
                            $text = substr($text, 0, strrpos($text, ' '));
                            echo $text."...";
                            ?>
                        </div>
                        <div class="foot">
                            <div class="name"><?=$arItem["PROPERTIES"]["NAME"]["VALUE"]?></div>
                            <div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
                        </div>
                    </div>
                </div>
				<?endforeach;?>
            </div>
            <div class="style_dots" id="reviews_dots"></div>
            <div class="buttons">
				<a class="btn green small" href="/otzivi/">Написать отзыв</a>
				<a class="btn grey small" href="/otzivi/">Все отзывы</a>
			</div>
        </div>
    </div>
</div>