$('.styler').styler();
$('#index_banner').slick({
    infinite:true,
    fade:true,
    arrows:false,
    slidesToShow:1,
    slidesToScroll:1,
    dots:true,
    appendDots:$('#slider_dots'),
    autoplay: true,
    autoplaySpeed: 5000
});
$('#ia_gallery').slick({
    infinite:true,
    fade:false,
    arrows:false,
    slidesToShow:3,
    slidesToScroll:1,
    dots:true,
    appendDots:$('#adv_dots'),
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
});
$('#places_banner').slick({
    infinite:true,
    slidesToShow:1,
    slidesToScroll:1,
    arrows:false,
    dots:false,
    fade:true,
});
$('.places .nav').find('li').on('click', function(e){
    e.preventDefault();
    var next_slide = $(this).index();
    $('#places_banner').slick('slickGoTo',parseInt(next_slide));
});
$('#places_banner').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    var prev_slide = $('#places_banner .item.slick-active').attr('data-item');
    $('.places .nav').find('.active').removeClass('active');
    $('.places .nav').find('[data-item="'+nextSlide+'"]').addClass('active');
});
$('#reviews_banner').slick({
    infinite:true,
    slidesToShow:3,
    slidesToScroll:3,
    arrows:false,
    dots:true,
    appendDots:$('#reviews_dots'),
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
});
$('.doctors .nav ul').on('click', 'li:not(.active)', function() {
    $(this)
        .addClass('active').siblings().removeClass('active')
        .closest('.doctors .list').find('.page').removeClass('active').eq($(this).index()).addClass('active');
});
$('[data-mask="phone"]').mask("+7 (999) 999 - 99 - 99");
$('[data-mask="date"]').mask("99.99.9999");
$('[data-mask="time"]').mask("99:99");
$('.questions .list .item .button').on('click', function (e){
    e.preventDefault();
    var desc = $(this).parents('.item').children('.desc');
    if ($(this).hasClass('hide')){
        desc.stop().slideDown();
        $(this).removeClass('hide');
    } else {
        desc.stop().slideUp();
        $(this).addClass('hide');
    }
});
$('#question_form').on('submit', function(e){
    e.preventDefault();
    $(this).find('input[type="submit"]').val('Подождите...');

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072';   


    $.ajax({
        type: "POST",
        url: "/bitrix/templates/clinic/ajax/cons.php",
        data: $(this).serialize() + '&called_did='+ $smart_mail,
        success: function(data){
            if (data == true){
                $('#question_result').html('Ваш вопрос отправлен специалистам. Мы постараемся ответить на него в ближайшее время!');
                $('#question_form').find('input, textarea').not(':input[type="submit"]').val('');
                yaCounter37694735.reachGoal('question');
                ga('send', 'event', 'submit', 'S2');
            } else {
                $('#question_result').html(data);
            }
        }
    });
    $('#question_form').find('input[type="submit"]').val('Задать вопрос');
});
$('#ur_cons_form').on('submit', function(e){
    e.preventDefault();
    $(this).find('input[type="submit"]').val('Подождите...');

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072'; 

    $.ajax({
        type: "POST",
        url: "/bitrix/templates/clinic/ajax/ur_cons.php",
        data: $(this).serialize()  + '&called_did='+ $smart_mail,
        success: function(data){
            if (data == true){
                $('#ur_cons_result').html('Ваш вопрос отправлен специалистам. Мы постараемся ответить на него в ближайшее время!');
                $('#ur_cons_form').find('input, textarea').not(':input[type="submit"]').val('');
            } else {
                $('#ur_cons_result').html(data);
            }
        }
    });
    $('#ur_cons_form').find('input[type="submit"]').val('Задать вопрос');
});
$('#reviews_form').on('submit', function(e){
    e.preventDefault();
    $(this).find('input[type="submit"]').val('Подождите...');

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072'; 

    $.ajax({
        type: "POST",
        url: "/bitrix/templates/clinic/ajax/reviews.php",
        data: $(this).serialize()  + '&called_did='+ $smart_mail,
        success: function(data){
            if (data == true){
                $('#reviews_result').html('Спасибо за ваш отзыв! Надеемся, вы остались довольны нашими услугами!');
                $('#reviews_form').find('input, textarea').not(':input[type="submit"]').val('');
                 ga('send', 'event', 'submit', 'S4');
            } else {
                $('#reviews_result').html(data);
            }
        }
    });
    $('#reviews_form').find('input[type="submit"]').val('Оставить отзыв');
});
$('.feedback_button').on('click', function(e){
    e.preventDefault();
    var overlay = $('.overlay'),
        place = $(this).attr('data-place');
    if (!overlay.hasClass('show')) {
        $('#footer_form input[name="place"]').val(place);
        overlay.addClass('show');
        $('html').css('overflow-y', 'hidden');
    }
});
$('.overlay').on('click', function(e){
    if (($(this).is(e.target)) && ($(this).has(e.target).length === 0)){
        $(this).removeClass('show');
        $('html').css('overflow-y', 'inherit');
    }
});
$('.footer_form .close').on('click', function(e){
    e.preventDefault();
    $('.overlay').removeClass('show');
    $('html').css('overflow-y', 'inherit');
});
$('#footer_form').on('submit', function(e){
    var result = $(this).find('.result'),
        form = $(this);
    e.preventDefault();
    $(this).find('input[type="submit"]').attr('disabled', true).val('Пожалуйста, подождите...');
    $(this).find('input[name="url"]').val(location.href);

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072'; 

    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/feedback.php',
        data: $(this).serialize() + '&called_did='+ $smart_mail,
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val('Записаться');
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время!');
                $(form).find('input, textarea').not(':input[type="submit"]').not(':input[name="check_2"]').val('');
                yaCounter37694735.reachGoal('zapisnapriem');
                ga('send', 'event', 'submit', 'S1');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});
$('#index_form').on('submit', function(e){
    var result = $(this).find('.result'),
        form = $(this);
    e.preventDefault();
    $(this).find('input[type="submit"]').attr('disabled', true).val('Пожалуйста, подождите...');
    $(this).find('input[name="url"]').val(location.href);

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072'; 

    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/feedback.php',
        data: $(this).serialize()  + '&called_did='+ $smart_mail,
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val('Записаться');
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время!');
                $(form).find('input, textarea').not(':input[type="submit"]').not(':input[name="check_2"]').val('');
                yaCounter37694735.reachGoal('zapisnapriem');
                ga('send', 'event', 'submit', 'S6');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});
$('#detail_to_doctor').on('submit', function(e){
    var result = $(this).find('.result'),
        form = $(this);
    e.preventDefault();
    $(this).find('input[type="submit"]').attr('disabled', true).val('Пожалуйста, подождите...');
    $(this).find('input[name="url"]').val(location.href);

    $smart=localStorage.getItem('smart'); 
    if ($smart=='yandex') $smart_mail='73472588856';
    if ($smart=='gugl') $smart_mail='73472588032';
    if (($smart!='yandex') && ($smart!='gugl')) $smart_mail='73472588072'; 
    
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/feedback.php',
        data: $(this).serialize()  + '&called_did='+ $smart_mail,
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val('Записаться');
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время!');
                $(form).find('input, textarea').not(':input[type="submit"]').not(':input[name="check_2"]').val('');
                yaCounter37694735.reachGoal('zapisnapriem');
                ga('send', 'event', 'submit', 'S7');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});
$('.nav_button').on('click', function(e){
    e.preventDefault();
    var nav = $('.nav_parent'),
        button = $(this),
        overlay = $('.nav_overlay');
    if (button.hasClass('close')){
        nav.removeClass('show');
        overlay.removeClass('show');
        button.removeClass('close');
        $('html').css('overflow-y', 'inherit');
    } else {
        nav.addClass('show');
        overlay.addClass('show');
        button.addClass('close');
        $('html').css('overflow-y', 'hidden');
    }
});
$('.nav_overlay').on('click', function(e){
    e.preventDefault();
    var nav = $('.nav_parent'),
        button = $('.nav_button'),
        overlay = $(this);
    if (overlay.hasClass('show')){
        nav.removeClass('show');
        overlay.removeClass('show');
        button.removeClass('close');
        $('html').css('overflow-y', 'inherit');
    }
});
$('.main_nav .arrow').on('click', function(e){
    e.preventDefault();
    var button = $(this),
        list = $(this).siblings('ul');
    if (button.hasClass('show')){
        list.slideUp(400);
        button.removeClass('show');
    } else {
        list.slideDown(400);
        button.addClass('show');
    }
});
$("#donor_women, #donor_surmama, #donor_sperm").find('textarea').keyup(function(){
    var max = 500;
    if (this.value.length > max){
        this.value = this.value.substr(0, max);
    }
    if (this.value.length > (max - 50)){
        if (!$(this).siblings('span').is('.text_error')){
            $(this).after('<span class="text_error">Максимальная длина текста - <b>' + max + '</b> символов.</span>')
        }
    } else {
        $(this).siblings('span').remove();
    }
});
$('#donor_women, #donor_surmama, #donor_sperm').on('submit', function(e){
    e.preventDefault();
    var hidden_first = $(this).attr('data-hidden'),
        hidden_second = $(this).find('input[name="hidden"]').val(),
        data = {
            elements: {},
            params: {},
            hidden: {
                first: hidden_first,
                second: hidden_second
            }
        },
        form = $(this),
        result = $(this).find('.result'),
        i = 0;
    $(this).find('.line').each(function(){
        var name = $(this).find('label').attr('data-name'),
            value = $(this).find('input, textarea, select').val(),
            code = $(this).find('label').attr('data-code');
            type = '',
            clear = $(this).find('input, textarea').attr('data-clear');
        if ($(this).find('input').length != 0){
            type = $(this).find('input').attr('type');
        } else if ($(this).find('textarea').length != 0){
            type = 'textarea';
        } else if ($(this).find('select').length != 0){
            type = 'select';
        }
        data.elements[i] = {
            name: name,
            value: value,
            code: code,
            type: type,
            clear: clear
        }
        i++;
    });
    $i = 0;
    $(this).find('input[type="hidden"]').each(function(){
        var name = $(this).attr('name'),
            value = $(this).val();
        data.params[name] = value;
        i++;
    });
    e.preventDefault();
    $(this).find('input[type="submit"]').attr('disabled', true).val('Пожалуйста, подождите...');
    $(this).find('input[name="url"]').val(location.href);
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/anketa.php',
        data: data,
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val('Отправить');
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время!');
                $(form).find('input, textarea').not(':input[type="submit"]').not(':input[name="check_2"]').not(':input[name="date_active"]').not(':input[name="hidden"]').val('');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});
$('.prices_list .title').on('click', function(e){
    e.preventDefault();
    var title = $(this);
        table = $(this).siblings('.main');
    if (title.hasClass('show')){
        table.stop().slideUp();
        title.removeClass('show');
    } else {
        table.stop().slideDown();
        title.addClass('show');
    }
});
//Price List
$('.price_cart_button').on('click', function(e){
    e.preventDefault();
    var overlay = $('.price_overlay');
    if (!overlay.hasClass('show')) {
        overlay.addClass('show');
        $('html').css('overflow-y', 'hidden');
    }
});
$('.price_overlay').on('click', function(e){
    if (($(this).is(e.target)) && ($(this).has(e.target).length === 0)){
        $(this).removeClass('show');
        $('html').css('overflow-y', 'inherit');
    }
});
$('.price_list_cart .close').on('click', function(e){
    e.preventDefault();
    $('.price_overlay').removeClass('show');
    $('html').css('overflow-y', 'inherit');
});
$('.pl_add_to_list').on('click', function(e){
    e.preventDefault();
    var name = $(this).closest('tr').find('td:eq(2)').text(),
        price = $(this).closest('tr').find('td:eq(3)').text(),
        line = $(this).closest('tr'),
        add_button = $(this),
        delete_button = $(this).siblings('a.pl_delete'),
        id = line.attr('data-id'),
        number = $(this).closest('tr').attr('data-number');
    line.addClass('added');
    add_button.hide();
    delete_button.show();
    price = Number(price.replace(/[^0-9]/gim,''));
    pl_add(id, name, price, number);
});
$(document).on('click', '.pl_delete, .pl_table_close', function(e){
    e.preventDefault();
    var id = $(this).closest('tr').attr('data-id'),
        number = $(this).closest('tr').attr('data-number'),
        price = $(this).closest('tr').attr('data-price');
    if (number == 'true'){
        pl_remove(id, price);
    } else {
        pl_remove(id);
    }
});
function pl_add(id, name, price, number){
    var button = $('.price_cart_button'),
        count = button.find('.count'),
        summ_block = $('#p_summ'),
        summ = Number($('#p_summ').text());
    if (!button.hasClass('show')){
        button.addClass('show');
        count.text(Number(count.text()) + 1);
    } else {
        count.text(Number(count.text()) + 1);
    }
    var list = $('.price_list_cart table'),
        close = '<a href="#" class="pl_table_close"><i class="fas fa-times"></i></a>';
    if (number == 'true'){
        summ = summ + price;
        summ_block.text(summ);
        list.find('tr:last').after('<tr data-number="true" data-price="'+price+'" data-id="'+id+'"><td>'+name+'</td><td>'+price+'</td><td>'+close+'</td></tr>');
    } else {
        list.find('tr:last').after('<tr data-id="'+id+'"><td>'+name+'</td><td>-</td><td>'+close+'</td></tr>');
    }
    //var service_value = $('#price_form').find('input[name="services"]').val();
    $('<input>').attr({
        name: 'services['+id+']',
        value: name+' - '+price,
        type: 'hidden',
    }).appendTo('#price_form');
}
function pl_remove(id, price){
    var button = $('.price_cart_button'),
        count = button.find('.count'),
        real_count = $('.price_list_cart table tr').length;
    if (real_count > 2){
        count.text(Number(count.text()) - 1);
    } else {
        $('.price_overlay').removeClass('show');
        $('html').css('overflow-y', 'inherit');
        button.removeClass('show');
        count.text(Number(count.text()) - 1);
    }
    var price_list_tr = $('.prices_list table').find('tr[data-id="'+id+'"]');
    price_list_tr.removeClass('added');
    price_list_tr.find('.pl_add_to_list').show().siblings('a.pl_delete').hide();
    $('.price_list_cart table').find('tr[data-id="'+id+'"]').remove();
    $('#price_form').find('input[name="services['+id+']"]').remove();
    if (price){
        var summ_block = $('#p_summ'),
            summ = Number($('#p_summ').text());
        summ_block.text(summ - price);
    }
}
$('#price_more').on('click', function(e){
    e.preventDefault();
    if (!$('#price_more_form').hasClass('show')){
        $('#price_more_form').slideDown().addClass('show');
    } else {
        $('#price_more_form').slideUp().removeClass('show');
    }

});
$('#price_form').on('submit', function(e){
    e.preventDefault();
    var result = $(this).find('.result'),
        form = $(this);
    $(this).find('input[type="submit"]').attr('disabled', true).val('Пожалуйста, подождите...');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/price_form.php',
        data: $(this).serialize(),
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val('Записаться');
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время!');
                $(form).find('input[name="name"], input[name="phone"]').val('');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});
//ВДС
$('#version_on').on('click', function(e){
    e.preventDefault();
    var version = $(this).attr('data-version');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/version.php',
        dataType:'json',
        data: {
            version: version
        },
        success: function(data){
            if (data == 1){
                document.location.reload();
            }
        }
    });
});
$('.wv_color_link').on('click', function(e){
    e.preventDefault();
    var color = $(this).attr('data-color');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/version_color.php',
        dataType:'json',
        data: {
            color: color
        },
        success: function(data){
            if (data == 1){
                document.location.reload();
            }
        }
    });
});
$('.wv_font_size_link').on('click', function(e){
    e.preventDefault();
    var font_size = $(this).attr('data-font-size');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/version_font_size.php',
        dataType:'json',
        data: {
            font_size: font_size
        },
        success: function(data){
            if (data == 1){
                document.location.reload();
            }
        }
    });
});
$('.wv_kerning_link').on('click', function(e){
    e.preventDefault();
    var kerning = $(this).attr('data-kerning');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/version_kerning.php',
        dataType:'json',
        data: {
            kerning: kerning
        },
        success: function(data){
            if (data == 1){
                document.location.reload();
            }
        }
    });
});
$('.js_slider_p').each(function(){
    var slider = $(this).find('.js_slider'),
        prev = $(this).find('.js_slider_prev'),
        next = $(this).find('.js_slider_next'),
        dots = $(this).find('.js_slider_dots');
    slider.slick({
        infinite:true,
        fade:false,
        arrows:false,
        slidesToShow:6,
        slidesToScroll:3,
        dots:true,
        appendDots:dots,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
        ]
    });
});
$(window).on('scroll', function(){
    var button = $('.js_up_button');
    if ($(window).scrollTop() > 150){
        button.addClass('show');
    } else {
        button.removeClass('show');
    }
});
$('.js_up_button').on('click', function(e){
    e.preventDefault();
    $('body, html').animate({scrollTop: 0}, 1500);
});
//Nalog
$('.js_nalog_form').on('submit', function(e){
    e.preventDefault();
    var result = $(this).find('.result'),
        form = $(this),
        button_text = $(this).find('input[type="submit"]').val();
    $(this).find('input[type="submit"]').attr('disabled', true).val('Подождите...');
    $.ajax({
        type: 'POST',
        url: '/bitrix/templates/clinic/ajax/nalog_form.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            $(form).find('input[type="submit"]').attr('disabled', false).val(button_text);
            if (data == true){
                $(result).removeClass('error');
                $(result).html('Заявка на налоговый вычет подана. Ожидайте уведомления о готовности документов в течении 10 дней.');
                $(form).find('input[name="nalog_name"], input[name="nalog_name_second"], input[name="nalog_email"], input[name="nalog_phone"], input[name="nalog_place"]').val('');
            } else {
                $(result).addClass('error');
                $(result).html(data);
            }
        }
    });
});