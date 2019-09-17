<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="article_detail reset">
    <?if ($arResult["DETAIL_PICTURE"]):?>
        <?$picture = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 1200, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 100);?>
        <div class="detail_picture">
            <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-fancybox="<?=$arResult["ID"]?>">
                <img src="<?=$picture["src"]?>">
            </a>
        </div>
    <?endif;?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/detail_cons.php"
        )
    );?>
    <?if ($arResult["DISPLAY_ACTIVE_FROM"]):?>
        <div class="date">
            <?=$arResult["DISPLAY_ACTIVE_FROM"];?>
        </div>
    <?endif;?>
    <div class="desc content">
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/detail_to_doctor.php"
        )
    );?>
</div>