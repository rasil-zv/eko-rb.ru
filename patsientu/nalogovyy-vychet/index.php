<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Налоговый вычет");
?><p>
	Отправьте заявку на получение справок на налоговый вычет.
</p>
<p>
	Все очень просто:
</p>
<ol>
	<li>Вам нужно заполнить <a href="#nalog_form">форму заявления</a></li>
	<li>Прикрепить сканы (или четкие фотографии) необходимых документов&nbsp;(Паспорт, ИНН, договор)⁠</li>
	<li>Подождать уведомления на почту или мобильный о готовности документов в течении 10 рабочих дней</li>
	<li>Явиться за справками по удобному адресу наших клиник</li>
</ol>
<div class="nalog_form reset" id="nalog_form">
	<form class="js_nalog_form">
        <input type="hidden" name="check" value="">
        <input type="hidden" name="check_2" value="check">
        <input type="hidden" name="active_from" value="<?=date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")));?>">
		<div class="item">
 <label for="nalog_name">ФИО пациента: <span class="red">*</span></label> <input type="text" id="nalog_name" name="nalog_name" required="">
		</div>
		<div class="item">
 <label for="nalog_name_second">ФИО налогоплательщика (кто платил за услугу): <span class="red">*</span></label> <input type="text" id="nalog_name_second" name="nalog_name_second" required="">
		</div>
		<div class="item">
 <label for="nalog_for">За кого будет налоговый вычет? <span class="red">*</span></label>
			<select class="styler" name="nalog_for" id="nalog_for" required="">
				<option value="" disabled="" selected="">Не выбрано</option>
				<option value="за себя">за себя</option>
				<option value="за ребенка">за ребенка</option>
				<option value="за супруга">за супруга</option>
				<option value="за родителя">за родителя</option>
			</select>
		</div>
		<div class="item">
 <label for="nalog_email">E-Mail:</label> <input type="email" id="nalog_email" name="nalog_email">
		</div>
		<div class="item">
 <label for="nalog_phone">Телефон: <span class="red">*</span></label> <input type="text" id="nalog_phone" name="nalog_phone" required="">
		</div>
		<div class="item">
 <label for="nalog_place">Где удобно забрать справки? <span class="red">*</span></label> <input type="text" id="nalog_place" name="nalog_place" required="">
		</div>
		<div class="item">
 <label for="nalog_docs">Документы: <span class="red">*</span></label> <input class="styler" type="file" id="nalog_docs" name="nalog_docs[]" required="" multiple="">
		</div>
		<div class="item">
			<div class="desc">
				 Нажимая кнопку "Отправить", я даю <a target="_blank" href="/soglasie_na_obrabotky_personalnyh_dannyh.docx">согласие на передачу и обработку персональных данных</a>, а также подтверждаю, что ознакомлен(-a) c <a target="_blank" href="/pologhenie-o-zashcite-personalnih-dannih.doc">Положением о защите персональных данных</a>.
			</div>
		</div>
		<div class="result">
		</div>
		<div class="item submit">
 <input type="submit" value="Отправить">
		</div>
	</form>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>