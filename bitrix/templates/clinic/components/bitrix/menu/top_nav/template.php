<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div class="main_nav">
	<a class="mobile_button mobile">
		<i class="fas fa-bars"></i>
		Меню
	</a>
	<div class="mobile_par">
		<ul>
		<?
		$previousLevel = 0;
		foreach($arResult as $arItem):?>
			<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
			<?endif?>
			<?if ($arItem["IS_PARENT"]):?>
				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?>class="active"<?endif?>><?=$arItem["TEXT"]?></a>
						<ul>
				<?else:?>
					<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?>class="active"<?endif?>><?=$arItem["TEXT"]?></a>
						<ul>
				<?endif?>
			<?else:?>
				<?if ($arItem["PERMISSION"] > "D"):?>
					<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?>class="active"<?endif?>><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<?if ($arItem["DEPTH_LEVEL"] == 1):?>
						<li><a href="" <?if ($arItem["SELECTED"]):?>class="active"<?endif?>><?=$arItem["TEXT"]?></a></li>
					<?else:?>
						<li><a href=""><?=$arItem["TEXT"]?></a></li>
					<?endif?>
				<?endif?>
			<?endif?>
			<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
		<?endforeach?>
		<?if ($previousLevel > 1):?>
			<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
		<?endif?>
		</ul>
	</div>
</div>
<?endif?>