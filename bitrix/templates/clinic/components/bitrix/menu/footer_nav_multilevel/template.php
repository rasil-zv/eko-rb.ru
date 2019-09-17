<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
    <div class="footer_nav">
        <ul>
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):
                if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):
                    echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
                endif;
                if ($arItem["IS_PARENT"]):
                    if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <li>
                            <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>active<?endif?> <?=$arItem["PARAMS"]["CLASS"]?>">
                                <?=$arItem["TEXT"]?>
                            </a>
                            <ul>
                    <?else:?>
                        <li>
                            <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>active<?endif?> <?=$arItem["PARAMS"]["CLASS"]?>">
                                <?=$arItem["TEXT"]?>
                            </a>
                            <ul>
                    <?endif;
                else:
                    if ($arItem["PERMISSION"] > "D"):
                        if ($arItem["DEPTH_LEVEL"] == 1):?>
                            <li>
                                <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>active<?endif?> <?=$arItem["PARAMS"]["CLASS"]?>">
                                    <?=$arItem["TEXT"]?>
                                </a>
                            </li>
                        <?else:?>
                            <li>
                                <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>active<?endif?> <?=$arItem["PARAMS"]["CLASS"]?>">
                                    <?=$arItem["TEXT"]?>
                                </a>
                            </li>
                        <?endif;
                    else:
                        if ($arItem["DEPTH_LEVEL"] == 1):?>
                            <li>
                                <a href="" class="<?if ($arItem["SELECTED"]):?>active<?endif?> <?=$arItem["PARAMS"]["CLASS"]?>">
                                    <?=$arItem["TEXT"]?>
                                </a>
                            </li>
                        <?else:?>
                            <li>
                                <a href="">
                                    <?=$arItem["TEXT"]?>
                                </a>
                            </li>
                        <?endif;
                    endif;
                endif;
                $previousLevel = $arItem["DEPTH_LEVEL"];
            endforeach;
            if ($previousLevel > 1):
                echo str_repeat("</ul></li>", ($previousLevel-1) );
            endif;?>
        </ul>
    </div>
<?endif;?>