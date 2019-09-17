<form id="detail_to_doctor">
        <h3 class="to_doctor_title">
            Записаться на прием:
        </h3>
        <div class="to_doctor row no-gutters">
            <div class="column col-lg-3 input">
                <p>Ваше имя:</p>
                <input type="text" name="name">
            </div>
            <div class="column col-lg-3 input">
                <p>Ваш номер телефона:</p>
                <input type="text" name="phone" placeholder="+7 (___) ___ - __ - __" data-mask="phone">
            </div>
            <div class="column col-lg-3 date">
                <p>Дату приема:</p>
                <input type="text" class="datepicker-here" data-position="bottom left">
            </div>
            <div class="column col-lg-3 button">
                <input type="submit" class="btn no_shadow no_animate purple" value="Записаться на прием">
            </div>
        </div>
    </form>