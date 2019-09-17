<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div class="main_nav">
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
                    <p class="<?/*if ($arItem["SELECTED"]):?>active<?endif*/?> <?=$arItem["PARAMS"]["CLASS"]?>">
                        <?=$arItem["TEXT"]?>
                    </p>
                    <span class="arrow"></span>
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
                        <a href="<?=$arItem["LINK"]?>" class="<?/*if ($arItem["SELECTED"]):?>active<?endif*/?> <?=$arItem["PARAMS"]["CLASS"]?>">
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
                        <a href="" class="<?/*if ($arItem["SELECTED"]):?>active<?endif*/?> <?=$arItem["PARAMS"]["CLASS"]?>">
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
        /*
        if ($arItem["DEPTH_LEVEL"] == 1){
            $i++;
            if ($i == (count($arNav) - 1)){
                echo '<li class="add_nav"><p>Пациенту</p>';
                $APPLICATION->IncludeComponent("bitrix:menu", "add_nav", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "patient",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                            0 => "",
                        ),
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "ROOT_MENU_TYPE" => "patient",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                    false
                );
                echo '</li>';
            }
        }
        */
    endforeach;
    if ($previousLevel > 1):
        echo str_repeat("</ul></li>", ($previousLevel-1) );
    endif;?>
    </ul>
</div>
<?endif;?>