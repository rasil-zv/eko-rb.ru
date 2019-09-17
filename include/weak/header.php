<div class="line bb">
    <div class="container">
        <div class="header_top">
            <div class="wv_change">
                <div class="wv_color wv_c_item">
                    <p class="title">Схема: </p>
                    <a href="#" data-color="wv_white" class="wv_color_link white <?if ($_SESSION["version"]["color"] == "wv_white"):?>active<?endif;?>">
                        C
                    </a>
                    <a href="#" data-color="wv_black" class="wv_color_link black <?if ($_SESSION["version"]["color"] == "wv_black"):?>active<?endif;?>">
                        C
                    </a>
                    <a href="#" data-color="wv_b_yellow" class="wv_color_link b_yellow <?if ($_SESSION["version"]["color"] == "wv_b_yellow"):?>active<?endif;?>">
                        C
                    </a>
                    <a href="#" data-color="wv_blue" class="wv_color_link blue <?if ($_SESSION["version"]["color"] == "wv_blue"):?>active<?endif;?>">
                        C
                    </a>
                </div>
                <div class="wv_c_item wv_font_size">
                    <p class="title">Шрифт:</p>
                    <a href="#" data-font-size="min" class="wv_font_size_link font_16 <?if ($_SESSION["version"]["size"] == "min"):?>active<?endif;?>">
                        A
                    </a>
                    <a href="#" data-font-size="middle" class="wv_font_size_link font_20 <?if ($_SESSION["version"]["size"] == "middle"):?>active<?endif;?>">
                        A
                    </a>
                    <a href="#" data-font-size="max" class="wv_font_size_link font_24 <?if ($_SESSION["version"]["size"] == "max"):?>active<?endif;?>">
                        A
                    </a>
                </div>
                <div class="wv_c_item wv_font_kerning">
                    <p class="title">Кернинг:</p>
                    <a href="#" data-kerning="kern_1" class="wv_kerning_link kern_1 <?if ($_SESSION["version"]["kerning"] == "kern_1"):?>active<?endif;?>">
                        0
                    </a>
                    <a href="#" data-kerning="kern_2" class="wv_kerning_link kern_2 <?if ($_SESSION["version"]["kerning"] == "kern_2"):?>active<?endif;?>">
                        1
                    </a>
                    <a href="#" data-kerning="kern_3" class="wv_kerning_link kern_3 <?if ($_SESSION["version"]["kerning"] == "kern_3"):?>active<?endif;?>">
                        2
                    </a>
                </div>
            </div>
            <a href="#" id="version_on" data-version="wv_normal">
                <i class="fas fa-eye"></i>
                <p>Полная версия сайта</p>
            </a>
            <!--
            <div class="mobile_par">
                <a class="user" href="#">
                    <i class="fas fa-user"></i>
                    <p>Личный кабинет</p>
                </a>
                <a class="contacts mobile" href="#">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
            </div>
            -->
        </div>
    </div>
</div>
<div class="line">
    <div class="container">
        <div class="header row no-gutters">
            <div class="block logo col-lg-4">
                <a href="/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png">
                </a>
            </div>
            <div class="block search col-lg-4">
                <?$APPLICATION->IncludeComponent("bitrix:search.title", "search", Array(
                    "CATEGORY_0" => array(	// Ограничение области поиска
                        0 => "main",
                        1 => "iblock_content",
                    ),
                    "CATEGORY_0_TITLE" => "",	// Название категории
                    "CATEGORY_0_iblock_content" => array(	// Искать в информационных блоках типа "iblock_content"
                        0 => "1",
                        1 => "2",
                        2 => "3",
                        3 => "4",
                        4 => "5",
                        5 => "6",
                    ),
                    "CATEGORY_0_main" => array(	// Путь к файлу начинается с любого из перечисленных
                        0 => "",
                    ),
                    "CHECK_DATES" => "Y",	// Искать только в активных по дате документах
                    "CONTAINER_ID" => "title_search",	// ID контейнера, по ширине которого будут выводиться результаты
                    "INPUT_ID" => "title_search_input",	// ID строки ввода поискового запроса
                    "NUM_CATEGORIES" => "1",	// Количество категорий поиска
                    "ORDER" => "date",	// Сортировка результатов
                    "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                    "SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
                    "SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
                    "TOP_COUNT" => "5",	// Количество результатов в каждой категории
                    "USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
                ),
                    false
                );?>
                <div class="block contacts">
                    <ul>
                        <li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/adress/adress_1.php"
                                )
                            );?>
                        </li>
                        <li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/adress/adress_2.php"
                                )
                            );?>
                        </li>
                        <li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/adress/adress_3.php"
                                )
                            );?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="block phone col-lg-4">
                <div class="phone_number">
                    <?$regexp = '/[^0-9+]+/';?>
                    <?$str = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/include/phone.php', true);?>
                    <?$result = preg_replace($regexp, '', $str);?>
                    <a href="tel:<?=$result;?>">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/phone.php"
                            )
                        );?>
                    </a>
                </div>
                <a class="feedback_button feedback" href="#" data-place="Записаться на прием | Шапка">Записаться на прием</a>
            </div>
        </div>
    </div>
</div>
<div class="nav_button"><div class="button"></div></div>
<div class="line grd rotate nav_parent">
    <div class="container">
        <?$APPLICATION->IncludeComponent("bitrix:menu", "top_nav_multilevel", Array(
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "2",	// Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
            "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            "COMPONENT_TEMPLATE" => "horizontal_multilevel"
        ),
            false
        );?>
    </div>
</div>