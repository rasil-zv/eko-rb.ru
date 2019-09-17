<form id="detail_to_doctor" class="feedback_form">
    <input type="hidden" name="check" value="">
    <input type="hidden" name="check_2" value="check">
    <input type="hidden" name="url" value="">
    <input type="hidden" name="active_from" value="<?=date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")));?>">
    <input type="hidden" name="place" value="Форма обратной связи внизу страницы">
    <h3 class="to_doctor_title">
        Записаться на прием:
    </h3>
    <?if ($_SESSION["version"]["value"] == 'wv_normal'):?>
        <?$col = "col-lg-3";?>
    <?else:?>
        <?$col = "col-lg-6";?>
    <?endif;?>
    <div class="to_doctor row no-gutters">
        <div class="column <?=$col?> input">
            <p>Ваше имя: <span class="red">*</span></p>
            <input type="text" name="name" required>
        </div>
        <div class="column <?=$col?> input">
            <p>Ваш номер телефона: <span class="red">*</span></p>
            <input type="text" name="phone" placeholder="+7 (___) ___ - __ - __" data-mask="phone" required>
        </div>
        <div class="column <?=$col?> date">
            <p>Дата приема: <span class="red">*</span></p>
            <input type="text" class="datepicker-here" data-position="bottom left" name="date" required>
        </div>
        <div class="column <?=$col?> button">
            <input type="submit" class="btn no_shadow no_animate purple" value="Записаться">
        </div>
        <div class="line col-lg-12">
            <div class="desc">Нажимая кнопку "Записаться", я даю <a target="_blank" href="/soglasie_na_obrabotky_personalnyh_dannyh.docx">согласие на передачу и обработку персональных данных</a>, а также подтверждаю, что ознакомлен с
                <a target="_blank" href="/pologhenie-o-zashcite-personalnih-dannih.doc">Положением о защите персональных данных</a>.</div>
            <div class="result" id="index_result"></div>
        </div>
    </div>
</form>