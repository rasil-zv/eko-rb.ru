<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NAME'),
		'section' => array('columns', 'tiles'),
	),
	'cards' => array(
		'.landing-block-card' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODE_CARD'),
			'label' => array('.landing-block-node-img', '.landing-block-node-title'),
		),
	),
	'nodes' => array(
		'.landing-block-node-bgimg' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODEBGIMG'),
			'type' => 'img',
			'dimensions' => array('width' => 1920, 'height' => 1073),
		),
		'.landing-block-node-subtitle' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODESUBTITLE'),
			'type' => 'text',
		),
		'.landing-block-node-title' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODETITLE'),
			'type' => 'text',
		),
		'.landing-block-node-img' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODEIMG'),
			'type' => 'img',
			'dimensions' => array('width' => 1000, 'height' => 565),
		),
		'.landing-block-node-text' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODETEXT'),
			'type' => 'text',
		),
		'.landing-block-node-button' => array(
			'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODEBUTTON'),
			'type' => 'link',
		),
	),
	'style' => array(
		'block' => array(
			'type' => array('block-default-background-overlay'),
		),
		'nodes' => array(
			'.landing-block-card' => array(
				'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODE_CARD'),
				'type' => array('columns', 'animation'),
			),
			'.landing-block-node-subtitle' =>
				array(
					'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_STYLE_LANDINGBLOCKNODESUBTITLE'),
					'type' => 'typo',
				),
			'.landing-block-node-title' =>
				array(
					'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_STYLE_LANDINGBLOCKNODETITLE'),
					'type' => 'typo',
				),
			'.landing-block-node-text' =>
				array(
					'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_STYLE_LANDINGBLOCKNODETEXT'),
					'type' => 'typo',
				),
			'.landing-block-node-button' =>
				array(
					'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODEBUTTON'),
					'type' => 'button',
				),
			'.landing-block-node-button-container' =>
				array(
					'name' => Loc::getMessage('LANDING_BLOCK_8_FOUR_COLS_FIX_BIGBGIMG_NODES_LANDINGBLOCKNODEBUTTON'),
					'type' => 'text-align',
				),
		),
	),
);