<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule('iblock');?>
<?
$check = $_POST["params"]["check"];
$check_2 = $_POST["params"]["check_2"];
if (($check == "") && (($check_2 == "check"))){
    $iblock_first = str_replace("7765626372616674_", "", $_POST["hidden"]["first"]);
    $iblock_second = str_replace(Array("776562_", "_f0e0e7f0e0e1eef2eae0"), "", $_POST["hidden"]["second"]);
    if ($iblock_first == $iblock_second){
        $iblock_id = $iblock_first;
        $date_active = $_POST["params"]["date_active"];
        $el = new CIBlockElement;
        foreach ($_POST["elements"] as $input){
            if ($input["type"] == "textarea"){
                if (iconv_strlen($input["value"]) > 500){
                    echo 'Превышено допустимое количество символов в полях формы.';
                    exit();
                }
            }
            if (
                ($input["type"] == "text") ||
                ($input["type"] == "textarea")
            ){
                if ($input["clear"] == "true"){
                    $clear = true;
                    $change = Array("http://", "https://", "www.", ".ru", ".com");
                    foreach ($change as $item){
                        if (strpos($input["value"], $item) !== false){
                            $clear = false;
                            break;
                        } else {
                            continue;
                        }
                    }
                    if ($clear == false){
                        echo 'Некоторые поля содержат недопустимые символы.';
                        exit();
                    }
                }
            }
            $input["name"] = str_replace(" *", "", $input["name"]);
            if ($input["name"] == "Фамилия, Имя, Отчество"){
                $name = $input["value"];
            }
            $rsProp = CIBlockProperty::GetList(
                Array(),
                Array("IBLOCK_ID" => $iblock_id, "CODE" => $input["code"])
            );
            if ($arProp = $rsProp -> GetNext()){
                $prop_id = $arProp["ID"];
            } else {
                if (
                    ($input["type"] == "text") ||
                    ($input["type"] == "select") ||
                    ($input["type"] == "email")
                ){
                    $arFields = Array(
                        "NAME" => $input["name"],
                        "ACTIVE" => "Y",
                        "CODE" => $input["code"],
                        "PROPERTY_TYPE" => "S",
                        "IBLOCK_ID" => $iblock_id,
                    );
                } else if ($input["type"] == "textarea"){
                    $arFields = Array(
                        "NAME" => $input["name"],
                        "ACTIVE" => "Y",
                        "CODE" => $input["code"],
                        "PROPERTY_TYPE" => "S",
                        "USER_TYPE" => "HTML",
                        "IBLOCK_ID" => $iblock_id,
                    );
                }
                $ibp = new CIBlockProperty;
                $prop_id = $ibp->Add($arFields);
            }
            $props[$prop_id] = $input["value"];
        }
        $arLoadProductArray = Array(
            "MODIFIED_BY"       => $USER->GetID(),
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblock_id,
            "PROPERTY_VALUES"   => $props,
            "NAME"              => $date_active.' | '.$name,
            "ACTIVE"            => "N",
            "ACTIVE_FROM"       => $date_active,
        );
        if($el->Add($arLoadProductArray)){
            echo true;
        } else {
            echo 'Проблема соединения с сервером. Попробуйте оставить свой отзыв позже.';
        }
    } else {
        echo 'Неверно заполнены поля формы. Попробуйте обновить страницу и ввести данные заного.';
    }
} else {
    echo 'Неверно заполнены поля формы. Попробуйте обновить страницу и ввести данные заного.';
}
?>