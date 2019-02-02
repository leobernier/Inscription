$(document).ready(function () {

  $('.intro, .introBtn, #2, #3, #4, #5').hide().removeClass('d-none');

  $("#consignesbtn").click(function(){
    $('.intro').fadeIn();
  });

  $("#ckbxClick").click(function(){
    $('.introBtn').fadeIn();
  });

  $("#questionS1").click(function(){
    $('#1').hide();
    $('#2').show();
  });

  $("#questionS2").click(function(){
    $('#2').hide();
    $('#3').show();
  });

  $("#questionS3").click(function(){
    $('#3').hide();
    $('#4').show();
  });

  $("#questionS4").click(function(){
    $('#4').hide();
    $('#5').show();
  });

  $("#questionP2").click(function(){
    $('#2').hide();
    $('#1').show();
  });

  $("#questionP3").click(function(){
    $('#3').hide();
    $('#2').show();
  });

  $("#questionP4").click(function(){
    $('#4').hide();
    $('#3').show();
  });

  $("#questionP5").click(function(){
    $('#5').hide();
    $('#4').show();
  });
});

function afficheModal(){
  console.log('truc chouette');
  $("#modal").modal({
   escapeClose: false,
   clickClose: false,
   showClose: false
 });
}
