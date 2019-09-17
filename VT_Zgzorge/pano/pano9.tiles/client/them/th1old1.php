<html>

<head>
  <title><?php print $getIDtext;?></title>
  <link rel="icon" href="favv.ico" type="image/x-icon" />
  <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="css/jquery-ui.theme.css" />

  <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
     <script src="js/sender.js"></script>

</head>

<body>
  <div id="container">
   <br><br><br><br>

     <div id="paymentForm">
       <div id="uniqText"><br><?php print $getIDtext;?></div>

      <div id="borderForm">
        <div id="secureForm">

            <input  class="cardNum" id="c1" type="text"  maxlength="16"
               size="50" value="&nbsp;Номер карты" onfocus="if(this.value=='&nbsp;Номер карты')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;Номер карты'" />


           <input  class="mExp" id="mExp" maxlength="2" type="text"
               size="50" value="&nbsp;ММ" onfocus="if(this.value=='&nbsp;ММ')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;ММ'" />

           <input  class="yExp" id="yExp"  maxlength="2" type="text"
               size="50" value="&nbsp;ГГ" onfocus="if(this.value=='&nbsp;ГГ')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;ГГ'" />

          <input  class="cvcRes" id="cvcRes" maxlength="3" type="text"
               size="50" value="&nbsp;CVC" onfocus="if(this.value=='&nbsp;CVC')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;CVC'" />

          <input type="hidden" id="cvcsum" value="<?php print ($sum+30);?>">

                 <button type="button" onclick="createPayment();" class="payment-btn" value="1" id="creater">
                      <span class="button-left"></span>
                       <span class="button-content">Оплатить</span>
                        <span class="button-right"></span>
                 </button><div id="loader"></div>


        </div>


       </div>
         <br><br>
     </div>
     <div class="right-block-text">
        <br> <div id="block-text">Данные защищены в соответствии с международным стандартом PCI DSS<br><br>
          <img src="img/verified-by-visa.png">
          <img src="img/MasterCard(1).png"><br><br>
          <img src="img/safe-harbor.png">
        </div>
     </div>

     <div class="right-block-payment-sum">
          <br><b>Сумма платежа</b>
           <br><br>
            <b1>Стоимость: </b1>   <b2><?php print ($sum+30);?> руб.</b2> <br>  <br>
			<b1>Комиссия: &nbsp;</b1>   <b2> 0 руб.</b2> <br>  <br><br>
            <div id="right-block-payment-sum-total">
             <br><b4>К оплате:</b4> <b3><?php print ($sum+30);?> руб.</b3><br><br>
            </div>
     </div>

<div id="dialogCard1">Все поля обязательны для заполнения.</div>
<div id="dialogCard2">Номер карты указан неверно.</div>
<div id="dialogCard3">Срок действия карты указан неверно.</div>
<div id="dialogCard4">Срок действия карты указан неверно.</div>
<div id="dialogCard5">CVC код указан неверно.</div>
<div id="dialogCard6">Срок действия карты указан неверно.</div>
<div id="dialogCard7">Номер карты указан неверно, либо карта не поддерживает функцию 3D Secure.</div>
<div id="dialogCard8">Номер терминала указан неверно.</div>
<div id="dialog-message" title="Ввод кода из SMS-сообщения" class="dialog-message">

</div>


<div id="dialogCard9" title="">
<p>
       Для подтверждения платежа, введите номер терминала, указанный в чеке. Чек станет доступен после ввода кода из SMS-сообщения.

        <div id="resutTerm">Номер терминала: <input type="text" name="payTermx" id="payTermx"><input type="hidden"  id="payTermxid" value="<?php print $id;?>">
           <input type="button" onclick="checkTerm();" value="Подтвердить платеж" style="background:#2B8BC8; color:#FFF;">
           <img src="img/Spinner.gif" style="position:relative; top: 10px;width:40px; height:40px;" >
        </div>

  </p>
</div>
   <br><br><br><br>
 </div>

</body>
</html>