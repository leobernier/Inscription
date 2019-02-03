$(document).ready(function () {

  $('.intro, .introBtn, #2, #3, #4, #5').hide().removeClass('d-none');

  $("#consignesbtn").click(function(){
    $('.intro').fadeIn();
  });

  $("#ckbxClick").click(function(){
    $('.introBtn').fadeIn();
  });

  $("#questionS1").click(function(){
    $('#checkedOK').text("");
    checkedOK('#1', '1');
    $('#1').hide();
    $('#2').show();
  });

  $("#questionS2").click(function(){
    $('#checkedOK').text("");
    checkedOK('#2', '2');
    $('#2').hide();
    $('#3').show();
  });

  $("#questionS3").click(function(){
    $('#checkedOK').text("");
    checkedOK('#3', '3');
    $('#3').hide();
    $('#4').show();
  });

  $("#questionS4").click(function(){
    $('#checkedOK').text("");
    checkedOK('#4', '4');
    $('#4').hide();
    $('#5').show();
  });

  $("#questionP2").click(function(){
    $('#checkedOK').text("");
    checkedOK('#2', '2');
    $('#2').hide();
    $('#1').show();
  });

  $("#questionP3").click(function(){
    $('#checkedOK').text("");
    checkedOK('#3', '3');
    $('#3').hide();
    $('#2').show();
  });

  $("#questionP4").click(function(){
    $('#checkedOK').text("");
    checkedOK('#4', '4');
    $('#4').hide();
    $('#3').show();
  });

  $("#questionP5").click(function(){
    $('#checkedOK').text("");
    checkedOK('#5', '5');
    $('#5').hide();
    $('#4').show();
  });

  function checkedOK(id, texte){
    var bool = false;
    if ($(id+' .repMep input[type=radio]').length != 0)
    {
      if($(id+' .repMep input[type=radio]:checked').length == 0) {bool = true;}
    }
    else {
      if($(id+' .repMep input[type=checkbox]:checked').length == 0) {bool = true;}
    }
    if (bool==true) {
      $('#checkedOK').text("Vous n'avez pas répondu à la question "+texte);
    }
  }
});

function afficheModal(){
  $("#modal").modal({
   escapeClose: false,
   clickClose: false,
   showClose: false
 });
}
