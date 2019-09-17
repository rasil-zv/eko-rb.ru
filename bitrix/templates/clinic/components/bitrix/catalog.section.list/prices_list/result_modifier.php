<?
$flFilter = array('IBLOCK_ID' => 17, "DEPTH_LEVEL" => 1, "ACTIVE" => "Y");
$flSelect = array("ID", "NAME");
$flRes = CIBlockSection::GetList(Array("SORT" => "ASC"), $flFilter, true, $flSelect, false);
while ($fl = $flRes->GetNext()){
    $arSections[$fl["ID"]] = $fl;
    $slFilter = array('IBLOCK_ID' => 17, "DEPTH_LEVEL" => 2, "ACTIVE" => "Y", "SECTION_ID" => $fl["ID"]);
    $slSelect = array("ID", "NAME");
    $slRes = CIBlockSection::GetList(Array("SORT" => "ASC"), $slFilter, true, $slSelect, false);
    while ($sl = $slRes->GetNext()){
        $arSections[$fl["ID"]]["SECTIONS"][$sl["ID"]] = $sl;
        $elFilter = array('IBLOCK_ID' => 17, "ACTIVE" => "Y", "SECTION_ID" => $sl["ID"]);
        $elSelect = array("ID", "NAME", "PROPERTY_PRICE", "PREVIEW_TEXT", "PROPERTY_CODE");
        $elRes = CIBlockElement::GetList(Array("SORT" => "ASC"), $elFilter, false, Array(), $elSelect);
        while($el = $elRes->GetNextElement()){
            $elFields = $el->GetFields();
            $arSections[$fl["ID"]]["SECTIONS"][$sl["ID"]]["ELEMENTS"][$elFields["ID"]] = $elFields;
        }
    }
}
$arResult = $arSections;
?>