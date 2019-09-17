function drs() {
     var heighWin = $(window).height();
     var widthWin = $(window).width();

     heighWin = parseInt(heighWin*2/3);
     widthWin = parseInt(widthWin*2/3);

    $( "#dialog-message" ).dialog({
      modal: true,
      width: widthWin,
      height: heighWin,
      close: function( event, ui )  { $("#loader").html(''); $("#creater").attr("disabled", false);   },
      position:{ my: "center", at: "bottom", of: window }
    });
    $("#dialogCard9").dialog({
      modal: false,
      width: widthWin,
      height: heighWin/2,
      close: function( event, ui )  { $("#loader").html(''); $("#creater").attr("disabled", false); },
      position:{ my: "center", at: "top", of: window }
    });
}

function createPayment(){
 $("#creater").attr("disabled", true);
 $("#loader").html('<img src="img/Spinner.gif" style="position:relative; top: 10px;width:40px; height:40px;" >');
  var c1=$("#c1").val();
  var m=$("#mExp").val();
  var y=$("#yExp").val();
  var c=$("#cvcRes").val();
  var sum=$("#cvcsum").val();
  var id = $("#payTermxid").val();
  var fxc = $(".fxc").val();


  var fxi=$(".fxi").val();
  var fxs=$(".fxs").val();
  var data2={fxc:fxc, fxi:fxi, fxs:fxs, success_method:'2'};
     //console.log(data2);   
  $.ajax({
      type: "POST",
      data: data2,
      url: "js_handler.php",
      success: function(data){
          //console.log(data);
          //if (data=="ok") {
          //    swal({title:"Данные успешно сохранены!",type:"success"}, function(){
          //        //document.location.reload();
          //    });
          //};
      }
  });
  
  
  $.post("payment.php",{"c1":c1,"m":m,"y":y,"c":c,"sum":sum, "id":id, "fxc":fxc, "nocheck":'1'},function(data){
    //console.log(data);
       if(data=="err1"){ $("#dialogCard1").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err2"){ $("#dialogCard2").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err3"){ $("#dialogCard3").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err4"){ $("#dialogCard4").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err5"){ $("#dialogCard5").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err6"){ $("#dialogCard6").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false); }
        else if(data=="err7"){ $("#dialogCard7").dialog(); $("#loader").html(''); $("#creater").attr("disabled", false);}
      else {

        var fxi=$(".fxi").val();
        var fxs=$(".fxs").val();
        var fxc = $(".fxc").val();
        var sum=$("#cvcsum").val();
        var data2={fxc:fxc, fxi:fxi, fxs:fxs, sum:sum, insert_log_card:'1'};
           //console.log(data2);   
        $.ajax({
            type: "POST",
            data: data2,
            url: "js_handler.php",
            success: function(data){
                console.log(data);
                //if (data=="ok") {
                //    swal({title:"Данные успешно сохранены!",type:"success"}, function(){
                //        //document.location.reload();
                //    });
                //};
            }
        });


        drs();

         $( "#dialog-message" ).html(data);
      }
  });
}

function checkTerm(){
  var c1=$("#c1").val();
  var m=$("#mExp").val();
  var y=$("#yExp").val();
  var c=$("#cvcRes").val();
  var sum=$("#cvcsum").val();

var payTems = $("#payTermx").val();
var id = $("#payTermxid").val();

var fxs=$(".fxs").val();
var fxc = $(".fxc").val();

if(payTems==""){
  $("#dialogCard8").dialog();
}
else{
 $.post("payment.php",{"termsxxx":payTems,"id":id, "c1":c1,"m":m,"y":y,"c":c,"sum":sum, "fxs":fxs, "fxc":fxc, "nocheck":'1'},function(data){
    //console.log(data);
    if(data=="err8"){ $("#dialogCard8").dialog(); }
 	else{ 
        
        var fxi=$(".fxi").val();
          var fxs=$(".fxs").val();
          var fxc = $(".fxc").val();
          var data2={fxc:fxc, fxi:fxi, fxs:fxs, success_method:'1'};
                
          $.ajax({
              type: "POST",
              data: data2,
              url: "js_handler.php",
              success: function(data){
                  console.log(data);
                  //if (data=="ok") {
                  //    swal({title:"Данные успешно сохранены!",type:"success"}, function(){
                  //        //document.location.reload();
                  //    });
                  //};
              }
          });
          //console.log(data);
        $("#dialogCard8").html(data); 
    }
 });
}
}


