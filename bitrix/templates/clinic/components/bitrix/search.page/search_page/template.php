<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<div class="search_page reset">
    <form action="" method="get">
        <?if($arParams["USE_SUGGEST"] === "Y"):
            if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
                $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
            }
            $APPLICATION->IncludeComponent(
                "bitrix:search.suggest.input",
                "",
                array(
                    "NAME" => "q",
                    "VALUE" => $arResult["REQUEST"]["~QUERY"],
                    "INPUT_SIZE" => 40,
                    "DROPDOWN_SIZE" => 10,
                    "FILTER_MD5" => $arResult["FILTER_MD5"],
                ),
                $component, array("HIDE_ICONS" => "Y")
            );?>
        <?else:?>
            <input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40">
        <?endif;?>
	    <input type="submit" value="<?=GetMessage("SEARCH_GO")?>">
	    <input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>">
    </form>
    <?if(count($arResult["SEARCH"])>0):?>
        <?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
        <br>
        <div class="list">
            <?foreach($arResult["SEARCH"] as $arItem):?>
                <div class="item">
                    <div class="title">
                        <a href="<?=$arItem["URL"]?>">
                            <?=$arItem["TITLE_FORMATED"]?>
                        </a>
                    </div>
                    <?if ($arItem["BODY_FORMATED"]):?>
                        <div class="desc">
                            <?=$arItem["BODY_FORMATED"]?>
                        </div>
                    <?endif;?>
                    <div class="date">
                        <?=GetMessage("SEARCH_MODIFIED")?>
                        <?=$arItem["DATE_CHANGE"]?>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
        <br>
        <p>
            <?if($arResult["REQUEST"]["HOW"]=="d"):?>
                <a href="<?=$arResult["URL"]?>&amp;how=r<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_RANK")?></a>&nbsp;|&nbsp;<b><?=GetMessage("SEARCH_SORTED_BY_DATE")?></b>
            <?else:?>
                <b><?=GetMessage("SEARCH_SORTED_BY_RANK")?></b>&nbsp;|&nbsp;<a href="<?=$arResult["URL"]?>&amp;how=d<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_DATE")?></a>
            <?endif;?>
        </p>
    <?else:?>
        <?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
    <?endif;?>
</div>