<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");?>
<div class="undefined_page reset">
    <div class="up_number">404</div>
    <div class="up_desc">
        Упс! Кажется такой страницы не существует.
    </div>
    <div class="up_link">
        Для поиска нужной страницы вы можете воспользоваться <a href="/search/">поиском по сайту</a> или найти необходимую информацию на
            <a href="/">главной странице.</a>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>