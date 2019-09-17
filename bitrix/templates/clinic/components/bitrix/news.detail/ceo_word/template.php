<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="line grd">
    <div class="container">
        <div class="ceo_word row no-gutters">
            <div class="picture col-lg-5">
                <?$picture = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"]["ID"], Array("width" => 500, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
                <img src="<?=$picture["src"]?>">
            </div>
            <div class="text col-lg-7">
                <div class="title">
					<?if ($arResult["PROPERTIES"]["DOCTOR_WORD_1"]["VALUE"]):?>
						<?=$arResult["PROPERTIES"]["DOCTOR_WORD_1"]["VALUE"];?>
					<?endif;?>
					<?if ($arResult["PROPERTIES"]["DOCTOR_WORD_2"]["VALUE"]):?>
						<br>
						<?=$arResult["PROPERTIES"]["DOCTOR_WORD_2"]["VALUE"];?>
					<?endif;?>
                    <br>
                </div>
                <div class="content">
                    <?=$arResult["PREVIEW_TEXT"]?>
                </div>
            </div>
        </div>
    </div>
</div>