<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if ($_GET["price_list_section"] != ""):?>
    <?$to_section = $_GET["price_list_section"];?>
    <script>
        window.onload = function(){
            $('html, body').animate({
                scrollTop: $('[data-id="<?=$to_section?>"]').offset().top
            }, 1000);
        }
    </script>
<?endif;?>
<?if ($_GET["search"] == "1"):?>
    <input type="text" id="price_filter">
<?endif;?>
<div class="prices_list reset">
    <?foreach($arResult as $arSection):?>
        <?$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <?if ($arSection["ELEMENT_CNT"] != 0):?>
            <div class="item" id="<?=$this->GetEditAreaId($arSection['ID']);?>" data-id="<?=$arSection["ID"]?>">
                <div class="title <?if ($arSection["ID"] == $to_section):?>show<?endif;?>"><?=$arSection["NAME"];?></div>
                <div class="main" <?if ($arSection["ID"] == $to_section):?>style="display:block;"<?endif;?>>
                    <table>
                        <?foreach($arSection["SECTIONS"] as $arSecTwo):?>
                            <?if ($arSecTwo["ELEMENT_CNT"] != 0):?>
                                <tr>
                                    <th colspan="5">
                                        <?=$arSecTwo["NAME"]?>
                                    </th>
                                </tr>
                                <?$counter = 1;?>
                                <?foreach ($arSecTwo["ELEMENTS"] as $arItem):?>
                                    <tr data-id="<?=$arItem["ID"]?>" <?if (is_numeric($arItem["PROPERTY_PRICE_VALUE"])):?>data-number="true" data-price="<?=str_replace(" ", "", $arItem["PROPERTY_PRICE_VALUE"]);?>"<?endif;?>>
                                        <td><?=$counter;?></td>
										<td>
                                            <?=$arItem["PROPERTY_CODE_VALUE"];?>
                                        </td>
                                        <td><?=$arItem["NAME"]?></td>
                                        <td>
                                            <?if (is_numeric($arItem["PROPERTY_PRICE_VALUE"])):?>
                                                <?$price = str_replace(" ", "", $arItem["PROPERTY_PRICE_VALUE"]);?>
                                                <?=number_format($price, 0, '', ' ');?>
                                            <?else:?>
                                                <?=$arItem["PROPERTY_PRICE_VALUE"];?>
                                            <?endif;?>
                                        </td>
                                        <td>
                                            <a href="#" class="pl_add_to_list">
                                                <span class="desc">Больше об услуге</span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                            <a href="#" class="pl_delete">
                                                <span class="desc">Убрать из корзины</span>
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?if ($arItem["PREVIEW_TEXT"]):?>
                                        <tr>
                                            <td colspan="4" class="desc">
                                                <i><?=$arItem["PREVIEW_TEXT"]?></i>
                                            </td>
                                        </tr>
                                    <?endif;?>
                                    <?$counter++;?>
                                <?endforeach;?>
                            <?endif;?>
                        <?endforeach;?>
                    </table>
                </div>
            </div>
        <?endif;?>
    <?endforeach;?>
</div>
<div class="price_overlay reset">
    <div class="price_list_cart">
        <a class="close" href="#">
            <i class="fas fa-times"></i>
        </a>
        <div class="title">
            Интересующие услуги
        </div>
        <div class="main">
            <table>
                <tr>
                    <td colspan="3"><b>Выбранные услуги:</b></td>
                </tr>
            </table>
            <div class="p_summ">
                <p>Итого:</p>
                <p><span id="p_summ">0</span> руб.</p>
            </div>
        </div>
        <div class="foot">
            <a href="#" id="price_more">Узнать подробнее об услугах</a>
        </div>
        <div class="form" id="price_more_form">
            <form id="price_form">
                <input type="hidden" name="check" value="">
                <input type="hidden" name="check_2" value="check">
                <div class="inputs row no-gutters">
                    <div class="item col-lg-6">
                        <input type="text" name="name" placeholder="Ваше Имя *" required>
                    </div>
                    <div class="item col-lg-6">
                        <input type="text" data-mask="phone" required name="phone" placeholder="+7 (___) ___ - __ - __">
                    </div>
                </div>
                <div class="check">Нажимая кнопку "Отправить", я даю <a target="_blank" href="#">согласие на передачу и обработку персональных данных</a>, а также подтверждаю, что ознакомлен с
                    <a target="_blank" href="#">Положением о защите персональных данных</a>.</div>
                <div id="price_result" class="result"></div>
                <div class="submit">
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>
<a href="#" class="price_cart_button">
    <div class="cart">
        <i class="fas fa-shopping-cart"></i>
    </div>
    <div class="count">
        0
    </div>
</a>
<?//dump($arResult);?>
