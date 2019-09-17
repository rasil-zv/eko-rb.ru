function balance() {
  var $result = $("#cout"); 
  $.ajax({
    type: "POST", 
    data: { 
    },
    dataType: "html", 
    url: "balance.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_stat() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_stat.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_stat_mail() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_stat_mail.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_list() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_list.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_list_csv() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_list_csv.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_mail() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_mail.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 
function show_mail_csv() {
  var $result = $("#cout1"); 
  $.ajax({
    type: "POST", 
    data: { 
      'date1': $("#date1").val(),
      'date2': $("#date2").val(),
      'date3': $("#date3").val(),
      'date3v':$("#date3 option:selected" ).text(),
      'date4': $("#date4").text(),
      'date5': $("#date5").text(),
    },
    dataType: "html", 
    url: "show_mail_scv.php", 
    beforeSend: function() { 
    $result.html('<div>Подождите...</div>');
    },
    success: function(data) {
     $result.html(data); 
    },
  });
} 

function auth(){
  login=$("#gg1").val();
  pass=$("#gg2").val();
  document.location.href="/statforadmin/index.php?login="+login+"&pass="+pass;
}