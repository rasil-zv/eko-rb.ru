<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вопрос-ответ");
?><div class="questions reset">
	<div class="content">
		<p>
			Внимание! Ваш вопрос и ответ на него будут опубликованы на сайте клиники в разделе Вопрос-ответ. Если Вы по каким-либо причинам не хотите, чтобы Ваше обращение было опубликовано в открытом доступе, просим Вас отправить его по электронной почте <a href="mailto:ufadoctor@mail.ru">ufadoctor@mail.ru</a> c указанием в теме письма ФИО специалиста или других данных. Задавая вопрос на сайте клиники, пациент дает согласие на обработку персональных данных в соответствии с <a href="/zakonodatelnaya_baza/">Положением о защите персональных данных пациентов и работников клиники "Здоровье женщины"</a>.
		</p>
		<p>
			Обращаем Ваше внимание, что ответ на вопрос на сайте клиники носит предварительно-информативный характер и не может заменить очную консультацию специалиста. Постановка диагноза и назначение лечебных препаратов не производится.
		</p>
	</div>
	<h2 class="questions_title">
	    Задать вопрос
    </h2>
	<form id="question_form">
        <input type="hidden" value="" name="check">
        <input type="hidden" value="check" name="check_2">
        <input type="hidden" value="<?=date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")), time());?>" name="date">
		<div class="form row no-gutters">
			<div class="column col-lg-6">
				<div class="input">
 <input type="text" placeholder="Ваше имя *" name="name" required="">
				</div>
				<div class="input">
 <input type="email" placeholder="Ваш E-Mail*" name="email">
				</div>
				<div class="input">
 <input type="text" placeholder="+7 (___) ___ - __ - __ *" name="phone" data-mask="phone" required="">
				</div>
			</div>
			<div class="column col-lg-6">
				<div class="textarea">
 <textarea name="question" rows="5" placeholder="Ваш вопрос *" required=""></textarea>
				</div>
				<div class="check">
 <input class="styler" type="checkbox" id="question_check" checked="checked" required=""> <label for="question_check">
					Я даю согласие на передачу и обработку моих персональных данных, а также подтверждаю, что ознакомлен с <a href="/zakonodatelnaya_baza/">Положением о защите персональных данных</a>. </label>
				</div>
			</div>
			<div class="button col-lg-12">
 <input type="submit" class="btn purple" value="Задать вопрос">
			</div>
		</div>
		<div class="result" id="question_result">
		</div>
	</form>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"questions",
	Array(
		"ACTIVE_DATE_FORMAT" => "f j, Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "questions",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "50",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_TITLE" => "Вопросы",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"NAME",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>