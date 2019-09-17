<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
    <?if ($APPLICATION->GetCurPage(false) != '/'):?>
           </div>
        </div>
    </div>
    <?endif;?>
    <?if (
        ($APPLICATION->GetCurPage(false) == '/') ||
        ($APPLICATION->GetCurPage(false) == '/kontakti/') ||
        ($APPLICATION->GetCurPage(false) == '/kontakti2/')
        ):?>
        <div class="map_hr wv_none"></div>
        <div class="line map" id="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9f0db27879a0e2070fe1dead1b1a8dab0c132b8f81fb6a9c8e4b72ad7d207eed&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    <?endif;?>
    <div class="up_button fixed js_up_button"><i class="fas fa-angle-up"></i></div>
    <div class="line grd wv_none">
        <div class="container">
            <div class="footer row no-gutters">
                <div class="block col-lg-4">
                    <div class="footer_contacts">
                        <div class="phone">
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
                        <div class="button">
                            <a class="btn lightgrey small feedback_button" href="#" data-place="Записаться на прием | Подвал">Записаться на прием</a>
                        </div>
                        <div class="socials">
                            <a href="https://vk.com/club43081993">
                                <i class="fab fa-vk"></i>
                            </a>
                            <a href="https://ok.ru/group/54410369237020">
                                <i class="fab fa-odnoklassniki"></i>
                            </a>
                            <a href="https://www.facebook.com/EkoRBclinic">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/clinica_womens_health/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block col-lg-8">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "footer_nav_multilevel", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "2",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="line purple_dark last_line">
        <div class="container">
            <div class="copyright">
                Имеются противопоказания. Необходима консультация специалиста.
            </div>
        </div>
    </div>
    <div class="overlay">
        <div class="footer_form">
            <form id="footer_form">
                <input type="hidden" name="check" value="">
                <input type="hidden" name="check_2" value="check">
                <input type="hidden" name="url" value="">
                <input type="hidden" name="place" value="Форма обратной связи внизу страницы">
                <input type="hidden" name="active_from" value="<?=date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")));?>">
                <a class="close" href="#">
                    <i class="fas fa-times"></i>
                </a>
                <div class="title">
                    Запишитесь на прием онлайн! Менеджер свяжется с вами для уточнения подробностей.
                </div>
                <div class="input">
                    <label for="footer_name">
                        <b>Фамилия и  Имя:</b> <span class="red">*</span>
                    </label>
                    <input type="text" id="footer_name" name="name" required>
                </div>
                <div class="input">
                    <label for="footer_phone">
                        Ваш <b>Телефон:</b> <span class="red">*</span>
                    </label>
                    <input type="text" id="footer_phone" name="phone" data-mask="phone" placeholder="+7 (___) ___ - __ - __" required>
                </div>
                <div class="input">
                    <label for="footer_date">
                        Желаемая <b>дата</b> визита: <span class="red">*</span>
                    </label>
                    <input type="text" id="footer_date" class="datepicker-here" data-position="bottom left" name="date" placeholder="__.__.____" required>
                </div>
                <div class="input">
                    <label for="footer_doctor">
                        <b>ФИО</b> врача:
                    </label>
                    <input type="text" id="footer_doctor" name="doctor">
                </div>
                <div class="input">
                    <label for="footer_doctor_work">
                        <b>Специальность</b> врача:
                    </label>
                    <input type="text" id="footer_doctor_work" name="doctor_work">
                </div>
                <div class="input">
                    <label for="footer_time">
                        Удобное <b>время</b> для звонка оператора:
                    </label>
                    <input type="text" id="footer_time" name="time" data-mask="time" placeholder="__.__">
                </div>
                <div class="desc">Нажимая кнопку "Записаться", я даю <a target="_blank" href="/soglasie_na_obrabotky_personalnyh_dannyh.docx">согласие на передачу и обработку персональных данных</a>, а также подтверждаю, что ознакомлен с
                    <a target="_blank" href="/pologhenie-o-zashcite-personalnih-dannih.doc">Положением о защите персональных данных</a>.</div>
                <div id="footer_result" class="result"></div>
                <div class="submit">
                    <input type="submit" class="btn purple no_shadow no_animate" value="Записаться">
                </div>
            </form>
        </div>
    </div>
    <div class="nav_overlay"></div>


    <div style="display:none">
        <?
        if(CModule::IncludeModule('iblock')){               
        $arSelect_seo = Array('ID', 'NAME','PROPERTY_H1','PROPERTY_H2','PROPERTY_H3','PROPERTY_H4','PROPERTY_H5','PROPERTY_H6','PROPERTY_ALT_IMG1','PROPERTY_ALT_IMG2','PROPERTY_ALT_IMG3','PROPERTY_ALT_IMG4','PROPERTY_ALT_IMG5','PROPERTY_ALT_IMG6','PROPERTY_ALT_TEXT1','PROPERTY_ALT_TEXT2','PROPERTY_ALT_TEXT3','PROPERTY_ALT_TEXT4','PROPERTY_ALT_TEXT5','PROPERTY_ALT_TEXT6','PROPERTY_TITLE_MY','PROPERTY_DESCRIPTION_MY');
        $arFilter_seo = Array('IBLOCK_ID'=>25, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y', 'NAME'=>$_SERVER['REQUEST_URI']);
        $row_seo = CIBlockElement::GetList(Array("ACTIVE_FROM"=>"DESC"), $arFilter_seo, false, Array(), $arSelect_seo); 
        $flag=0;
        while($mass_seo = $row_seo->GetNext())
        {
            $flag++;
            $TITLE_MY=$mass_seo['PROPERTY_TITLE_MY_VALUE'];
            $DESCRIPTION_MY=$mass_seo['PROPERTY_DESCRIPTION_MY_VALUE'];
            $h1=$mass_seo['PROPERTY_H1_VALUE'];
            $h2=$mass_seo['PROPERTY_H2_VALUE'];
            $h3=$mass_seo['PROPERTY_H3_VALUE'];
            $h4=$mass_seo['PROPERTY_H4_VALUE'];
            $h5=$mass_seo['PROPERTY_H5_VALUE'];
            $h6=$mass_seo['PROPERTY_H6_VALUE'];
            $h6=$mass_seo['PROPERTY_H6_VALUE'];
            $alt_text1=$mass_seo['PROPERTY_ALT_TEXT1_VALUE'];
            $alt_text2=$mass_seo['PROPERTY_ALT_TEXT2_VALUE'];
            $alt_text3=$mass_seo['PROPERTY_ALT_TEXT3_VALUE'];
            $alt_text4=$mass_seo['PROPERTY_ALT_TEXT4_VALUE'];
            $alt_text5=$mass_seo['PROPERTY_ALT_TEXT5_VALUE'];
            $alt_text6=$mass_seo['PROPERTY_ALT_TEXT6_VALUE'];
            $alt_img1 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG1_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            $alt_img2 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG2_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            $alt_img3 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG3_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            $alt_img4 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG4_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            $alt_img5 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG5_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            $alt_img6 = CFile::ResizeImageGet($mass_seo['PROPERTY_ALT_IMG6_VALUE'], Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false); 
            if ($TITLE_MY!=''){$APPLICATION->SetPageProperty('title',$TITLE_MY);}
            if ($DESCRIPTION_MY!=''){$APPLICATION->SetPageProperty("description", $DESCRIPTION_MY);}
            if ($h1!=''){echo '<h1>'.$h1.'</h1>';}
            if ($h2!=''){echo '<h2>'.$h2.'</h2>';}
            if ($h3!=''){echo '<h3>'.$h3.'</h3>';}
            if ($h4!=''){echo '<h4>'.$h4.'</h4>';}
            if ($h5!=''){echo '<h5>'.$h5.'</h5>';}
            if ($h6!=''){echo '<h6>'.$h6.'</h6>';}
            if ($alt_text1!='' && $alt_img1!=''){echo '<img src="'.$alt_img1["src"].'" alt="'.$alt_text1.'" />';}
            if ($alt_text2!='' && $alt_img2!=''){echo '<img src="'.$alt_img2["src"].'" alt="'.$alt_text2.'" />';}
            if ($alt_text3!='' && $alt_img3!=''){echo '<img src="'.$alt_img3["src"].'" alt="'.$alt_text3.'" />';}
            if ($alt_text4!='' && $alt_img4!=''){echo '<img src="'.$alt_img4["src"].'" alt="'.$alt_text4.'" />';}
            if ($alt_text5!='' && $alt_img5!=''){echo '<img src="'.$alt_img5["src"].'" alt="'.$alt_text5.'" />';}
            if ($alt_text6!='' && $alt_img6!=''){echo '<img src="'.$alt_img6["src"].'" alt="'.$alt_text6.'" />';}
        }
        if($flag==0){?><h1><?$APPLICATION->ShowTitle(false);?></h1><h2><?$APPLICATION->ShowTitle(false);?></h2><?}
        }
        ?>
    </div>
    
    


    <script src="<?=SITE_TEMPLATE_PATH?>/js/libs.min.js"></script>
    <script>
      $(document).ready(function(){
      var strGET = window.location.search.replace( '?', ''); 
      var params = window
          .location
          .search
          .replace('?','')
          .split('&')
          .reduce(
              function(p,e){
                  var a = e.split('=');
                  p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                  return p;
              },
              {}
          );
        
      if (params['utm_source']!='undefined' && params['utm_source']!=null && params['utm_source']!="")
      { 
        if (params['utm_source'].indexOf("yandex") !== -1) localStorage.setItem('smart', 'yandex'); 
        if (params['utm_source'].indexOf("google") !== -1) localStorage.setItem('smart', 'gugl');
      }

        $smart=localStorage.getItem('smart'); 

        if ($smart=='yandex') {
            $(".smart_tel_a").text('+7 (347) 258-88-56');
            $(".smart_tel_a").attr('href','tel:+73472588856');
        }
        if ($smart=='gugl') {
            $(".smart_tel_a").text('+7 (347) 258-80-32');
            $(".smart_tel_a").attr('href','tel:+73472588032');
        }
        if (($smart!='gugl') && ($smart!='yandex')) {
            $(".smart_tel_a").text('+7 (347) 258-80-72');
            $(".smart_tel_a").attr('href','tel:+73472588072');
        }
      });
    </script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/script.js?v=<?=time();?>"></script>
    <!--<script src="//code.jivosite.com/widget.js" data-jv-id="eVM4vhhdGy" async></script>-->

    
  


    <script type="application/ld+json">
    {
        "@context" : "http://schema.org",
        "@type" : "Organization",
        "logo" : "http://www.eko-rb.ru/skins/main/images/top.png?20160823",
        "name" : "Медицинская клиника «Здоровье женщины»",
        "url" : "http://www.eko-rb.ru",
        "contactPoint" : [
            {
                "@type" : "ContactPoint",
                "telephone" : "+7-347-248-13-54",
                "contactType" : "customer service"
            }
        ],
        "sameAs" : [
            "https://vk.com/club43081993",
            "https://ok.ru/group/54410369237020",
            "https://www.facebook.com/EkoRBclinic"
        ]
    }
    </script>
 <!--    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-104055689-1', 'auto');
        ga('send', 'pageview');
    </script> -->
    <!-- Rating@Mail.ru counter -->
    <script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({id: "2922682", type: "pageView", start: (new Date()).getTime()});
    (function (d, w, id) {
      if (d.getElementById(id)) return;
      var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
      ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
      var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
      if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
    })(document, window, "topmailru-code");
    </script><noscript><div>
    <img src="//top-fwz1.mail.ru/counter?id=2922682;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
    </div></noscript>
    <!-- //Rating@Mail.ru counter
    <script src="https://mssg.me/widget/clinica_womens_health" async></script> -->
    <!-- Подписка на рассылку -->
    <script type="text/javascript">
        $(function(){$("#vopros input").focus(function(){if(focustime==0){var d=new Date();focustime=d.getTime();}});$("#form_podp").submit(function(){var error=false;$('#form_podp .inp').each(function(){if($(this).val()==''){alert('Поле E-mail обязательно к заполнению');$(this).focus();error=true;return false;}});if($('#fmail').val()!=''&&!error){var rg=new RegExp("^[a-z0-9_-]+[a-z0-9_.-]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$");var val=$('#fmail').val();if(!rg.test(val)){alert('Поле E-mail неверного формата');$('#fmail').focus();error=true;}}if(!error){var furl=$(this).attr("action");var fparams='';var aParams=new Array();for(var i=0;i<this.elements.length;i++){var sParam=encodeURIComponent(this.elements[i].name);sParam+="=";sParam+=encodeURIComponent(this.elements[i].value);aParams.push(sParam);}fparams=aParams.join("&");$.ajax({type:"POST",url:furl,data:fparams,success:function(msg){if(msg!='error'){alert("Ваш емайл подписан на рассылку");$('#fmail').val("")}else{$('#fmail').focus();alert('Данный емайл уже подписан на рассылку');}}});}return false;});});
    </script>
    <script type="text/javascript" src="https://cp.onicon.ru/loader/4fe87dc01ab788443d00cc3d.js"></script>
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?154",t.onload=function(){VK.Retargeting.Init("VK-RTRG-254300-58FV2"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-254300-58FV2"; style="position:fixed; left:-999px;" alt=""/></noscript>

    <!-- Yandex.Metrika informer -->
	<a style="position:absolute; left:-9999px;" href="https://metrika.yandex.ru/stat/?id=37694735&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/37694735/3_1_8E497BFF_8E497BFF_1_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="37694735" data-lang="ru" /></a>
    <!-- /Yandex.Metrika informer -->
    <!-- Yandex.Metrika counter -->
	<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter37694735 = new Ya.Metrika({ id:37694735, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/37694735" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

	<!-- Google Analytics -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-124243506-45', 'auto');
	ga('send', 'pageview');
	</script>
    </body>
</html>