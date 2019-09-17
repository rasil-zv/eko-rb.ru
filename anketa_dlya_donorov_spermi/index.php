<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Анкета для доноров спермы");
?>
<?
$form = array();
$form[] = Array("NAME" => "Фамилия, Имя, Отчество", "CODE" => "FIO", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Дата рождения", "CODE" => "DATA_ROJD", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "date");
$form[] = Array("NAME" => "Профессиональные вредности", "CODE" => "PROF_VRED", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Какие", "CODE" => "KAKIE_VREDN", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "N", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Семейное положение", "CODE" => "SEM_POL", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Холост", "Женат", "Разведен"));
$form[] = Array("NAME" => "Национальность", "CODE" => "NAZIONAL", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "N", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Наличие детей", "CODE" => "DETI", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Наследственные заболевания в семье", "CODE" => "NASL_BOL", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Вредные привычки: Курение", "CODE" => "KURENIE", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Вредные привычки: Употребление алкоголя", "CODE" => "ALKOGOL", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Не употребляю", "Эпизодически"));
$form[] = Array("NAME" => "Вредные привычки: Употребление наркотиков и психотропных средств", "CODE" => "NARKOTIKI", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Никогда не употреблял", "Эпизодически", "Регулярно"));
$form[] = Array("NAME" => "Сифилис, гонорея, гепатит", "CODE" => "SIFILIS_GONOREYA", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Не болел", "Болел"));
$form[] = Array("NAME" => "Был ли когда-нибудь положительный или неопределенный ответ при обследовании на ВИЧ, гепатит В или С?", "CODE" => "VICH_GEPATIT", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Относитесь ли Вы к группе лиц с нетрадиционной сексуальной направленностью (гомосексуализм)?", "CODE" => "GOMOSEKSUALISM", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "Состоите ли Вы на диспансерном учете?", "CODE" => "DISPANSER", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Нет", "Да"));
$form[] = Array("NAME" => "У какого специалиста?", "CODE" => "KAKOI_SPEC", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "N", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Рост", "CODE" => "ROST", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Вес", "CODE" => "VES", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Волосы", "CODE" => "VOLOSI", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Прямые", "Вьющиеся", "Кудрявые"));
$form[] = Array("NAME" => "Цвет волос", "CODE" => "ZVET_VOLOS", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "N");
$form[] = Array("NAME" => "Разрез глаз", "CODE" => "RAZREZ_GLAZ", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Европейский", "Азиатский"));
$form[] = Array("NAME" => "Цвет глаз", "CODE" => "ZVET_GLAZ", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Голубые", "Зеленые", "Серые", "Карие", "Черные"));
$form[] = Array("NAME" => "Нос", "CODE" => "NOS", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Прямой", "С горбинкой", "Курносый", "Широкий"));
$form[] = Array("NAME" => "Лицо", "CODE" => "LIZO", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Круглое", "Овальное", "Узкое"));
$form[] = Array("NAME" => "Лоб", "CODE" => "LOB", "TYPE" => "select", "REQUIRED" => "Y", "OPTIONS" => Array("Высокий", "Низкий", "Обычный"));
$form[] = Array("NAME" => "Дополнительные сведения о себе", "CODE" => "DOP_SVED", "CLEAR" => "Y", "TYPE" => "textarea", "REQUIRED" => "N");
$form[] = Array("NAME" => "Контактный телефон", "CODE" => "TELEFON", "CLEAR" => "N", "TYPE" => "text", "REQUIRED" => "Y", "DATA_MASK" => "phone");
$form[] = Array("NAME" => "E-Mail", "CODE" => "EMAIL", "TYPE" => "email", "REQUIRED" => "N", "DATA_MASK" => "N");

$form_name = "donor_sperm";
$iblock = 16;
?>
<div class="form_page reset">
    <form id="<?=$form_name?>" data-hidden="7765626372616674_<?=$iblock;?>">
        <input type="hidden" name="check" value="">
        <input type="hidden" name="check_2" value="check">
        <input type="hidden" name="date_active" value="<?=date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")), time());?>">
        <input type="hidden" name="hidden" value="776562_<?=$iblock;?>_f0e0e7f0e0e1eef2eae0">
        <?$i = 1;?>
        <?foreach ($form as $input):?>
            <div class="line row no-gutters">
                <div class="label col-lg-7">
                    <label data-name="<?=$input["NAME"]?>" data-code="<?=$input["CODE"]?>" for="<?=$form_name.'_'.$i?>" <?if ($input["REQUIRED"] == "Y"):?>class="bold"<?endif;?>><?=$input["NAME"]?><?if ($input["REQUIRED"] == "Y"):?> <span class="red">*</span><?endif;?></label>
                </div>
                <div class="input col-lg-5">
                    <?switch ($input["TYPE"]){
                        case "text":
                        case "email":?>
                            <input <?if ($input["CLEAR"] == "Y"):?>data-clear="true"<?endif;?> type="<?=$input["TYPE"]?>" <?if ($input["REQUIRED"] == "Y"):?>required<?endif;?> <?if ($input["DATA_MASK"] != "N"):?>data-mask="<?=$input["DATA_MASK"]?>"<?endif;?> id="<?=$form_name.'_'.$i?>" name="<?=$form_name.'_'.$i?>">
                            <?break;?>
                        <?
                        case "select":?>
                            <select <?if ($input["CLEAR"] == "Y"):?>data-clear="true"<?endif;?> name="<?=$form_name.'_'.$i?>" id="<?=$form_name.'_'.$i?>" class="styler">
                                <?foreach ($input["OPTIONS"] as $option):?>
                                    <option value="<?=$option;?>"><?=$option;?></option>
                                <?endforeach;?>
                            </select>
                            <?break;?>
                        <?
                        case "textarea":?>
                            <textarea <?if ($input["CLEAR"] == "Y"):?>data-clear="true"<?endif;?> name="<?=$form_name.'_'.$i?>" id="<?=$form_name.'_'.$i?>" rows="5"></textarea>
                            <?break;?>
                        <?}?>
                </div>
            </div>
            <?$i++?>
        <?endforeach;?>
        <div class="desc">
            Нажимая кнопку "Отправить", я даю <a href="/soglasie_na_obrabotky_personalnyh_dannyh.docx">согласие на передачу и обработку персональных данных</a>, а также подтверждаю, что ознакомлен с
            <a href="/images/features/pologhenie-o-zashcite-personalnih-dannih.doc">Положением о защите персональных данных</a>.
        </div>
        <div class="result"></div>
        <div class="submit">
            <input type="submit" value="Отправить" class="btn purple">
        </div>
    </form>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>