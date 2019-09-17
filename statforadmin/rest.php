<?
$bitrix_webhook="https://crm.masterokon.ru/rest/1/jkyvbvfuyuscc7p1/"; //адрес вебхука в битрикс24 
        $queryUrl  = $bitrix_webhook.'crm.lead.add.json';
        $queryData = http_build_query(array(
        'fields' => array(
          'TITLE' => 'test Danat ',
          'NAME' => 'Danat',
		  "STATUS_ID" => "NEW",
		  "ASSIGNED_BY_ID" => 1,
		  "PHONE" => array(array("VALUE" => '8688768686876', "VALUE_TYPE" => "WORK" )),
          'COMMENTS' => 'test ',
        ),
    ));
    $curl      = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, 1);
	Print_r($result);

?>