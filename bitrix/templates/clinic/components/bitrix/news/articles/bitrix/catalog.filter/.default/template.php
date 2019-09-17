<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
global $arrFilter;
$arrFilter = array();
foreach($arResult["arrProp"] as $arrNumber => $arPropVals){
	if($arPropVals["MULTIPLE"]=="Y")
		$arrValues[$arPropVals["CODE"]] = $arPropVals["VALUE_LIST"];

	if ($_GET[$arPropVals["CODE"]]){
		$arrFilter["PROPERTY_".$arPropVals["CODE"]] = $_GET[$arPropVals["CODE"]];
	}
}
?>
<div class="articles_filter reset">
	<ul>
		<li><a href="index.php">Все</a></li>
		<?foreach($arPropVals["VALUE_LIST"] as $key => $value):?>
			<?if($_GET[$arPropVals["CODE"]] == $key):?>
				<li class="active"><a href="index.php?<?=$arPropVals["CODE"]?>=<?=$key?>"><?=$value?></a></li>
			<?else:?>
			<li><a href="index.php?<?=$arPropVals["CODE"]?>=<?=$key?>"><?=$value?></a></li>
			<?endif;?>
		<?endforeach;?>
	</ul>
</div>
