$('.test').hide();
var eo = '12';
$( ".commencer" ).click(function() {
  $( ".intro" ).hide();
  $('.test').show();
    // J'initialise le variable box
    // Je définis ma requête ajax
    var nav = '12';
  $.ajax({
      // Adresse à laquelle la requête est envoyée
      url : 'inc/traitement.php',
      type : 'POST',
      data : "m=" + nav ,
      dataType : 'html', // On désire recevoir du HTML
      success : function(data, statut){ // code_html contient le HTML renvoyé
        $('.test').html(data);
      },
      error : function(resultat, statut, erreur){
        console.log('erreur');
      }
  });

});
