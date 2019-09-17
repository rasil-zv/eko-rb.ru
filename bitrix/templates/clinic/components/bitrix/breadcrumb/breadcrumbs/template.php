<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
if(empty($arResult))
	return "";
$strReturn .= '<div class="breadcrumbs"><ul><li><a href="/"><i class="fas fa-home"></i></a></li>';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++){
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
		$strReturn .= '
			<li><a href="'.$arResult[$index]["LINK"].'">'.$title.'</a></li>';
	} else {
		$strReturn .= '
			<li>'.$title.'</li>';
	}
}
$strReturn .= '</ul></div>';
return $strReturn;
