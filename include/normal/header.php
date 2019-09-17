<div class="header_parent">
    <div class="line bb">
        <div class="container">
            <div class="header_top">
                <div class="left">
                    <a href="#" class="feedback_button btn small purple" data-place="Шапка сайта">
                        Записаться на прием
                    </a>
                    <a href="/konsultaciya/" class="btn small green">
                        Задать вопрос врачу
                    </a>
                    <a href="https://lk.eko-rb.ru" class="btn small purple p_big_btn">
                        Личный кабинет
                    </a>
                </div>
                <div class="right">
                    <!--
                    <a class="user" href="/lk/">
                        <i class="fas fa-user"></i>
                        <p>Личный кабинет</p>
                    </a>
                    -->
                    <a href="#" id="version_on" data-version="wv_weak">
                        <i class="fas fa-eye-slash"></i>
                        <p>Версия для слабовидящих</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="line">
        <div class="container">
            <div class="header row no-gutters">
                <div class="block logo col-lg-4">
                    <a href="/">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="logo">
                    </a>
                </div>
                <div class="block contacts col-lg-4">
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
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
                            <i class="fas fa-map-marker-alt"></i>
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
                            <i class="fas fa-map-marker-alt"></i>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/adress/adress_4.php"
                                )
                            );?>
                        </li>
                    </ul>
                </div>
                <div class="block phone col-lg-4">
                    <div class="phone_number">
                        <?$regexp = '/[^0-9+]+/';?>
                        <?$str = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/include/phone.php', true);?>
                        <?$result = preg_replace($regexp, '', $str);?>
                        <a href="tel:<?=$result;?>" class="smart_tel_a">
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
                    <div class="share_block">
                        <a href="https://tlgg.ru/EkoRB" target="_blank"><img src="<?=SITE_TEMPLATE_PATH;?>/img/share/telegram.png" alt="share"></a>
                        <a href="https://wa.me/+79875863164" target="_blank"><img src="/bitrix/templates/clinic/img/share/whatsapp.png" alt="share"></a>
                        <a href="viber://chat?number=79875863164" target="_blank"><img src="<?=SITE_TEMPLATE_PATH;?>/img/share/viber.png" alt="share"></a>
                        <a href="https://vk.com/club43081993" target="_blank"><img src="<?=SITE_TEMPLATE_PATH;?>/img/share/vk.png" alt="share"></a>
                        <a href="https://instagram.com/clinica_womens_health/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH;?>/img/share/instagram.png" alt="share"></a>
                        <a href="weixin://dl/chat?{79875863164}" target="_blank"><img src="<?=SITE_TEMPLATE_PATH;?>/img/share/wechat.png" alt="share"></a>
                    </div>
                    <div class="block search">
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
                    </div>
                    <!--
                    <a class="feedback_button feedback" href="#" data-place="Записаться на прием | Шапка">Записаться на прием</a>
                    -->
                </div>
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