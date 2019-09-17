<?php
$arUrlRewrite=array (
  17 => 
  array (
    'CONDITION' => '#^/uslugi/(.+?)/([^/]+?)/\\??(.*)#',
    'RULE' => 'SECTION_CODE_PATH=$1&ELEMENT_CODE=$2&$3',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/bitrix/templates/clinic/components/bitrix/catalog/services/section.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/about/smi-o-nas/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/about/smi-o-nas/index.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/spetsialisti/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/spetsialisti/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/novosti/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/novosti/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/aktsii/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/aktsii/index.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/uslugi/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/stati/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/stati/index.php',
    'SORT' => 100,
  ),
);
