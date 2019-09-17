<?php

include_once 'include.php';

$zd = new \Zadarma_API\Client(KEY, SECRET);
$answer = $zd->call('/v1/info/balance/');

$answerObject = json_decode($answer);

if ($answerObject->status == 'success'):?>
<div class="col-lg-12">
	<div class="row">
		<div class="alert alert-info page-header">
  			<?echo 'Ваш баланс составляет ' . $answerObject->balance . ' ' . $answerObject->currency;?>
		</div> 
	</div>
</div> 
<?endif;?>
