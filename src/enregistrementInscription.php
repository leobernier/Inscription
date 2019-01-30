<?php
session_start();
include('config.php');
include('header.php');

//var_dump($_POST);
//var_dump(json_decode($_SESSION['resultatJSON']));


if(ISSET($_POST['Nom']) && ISSET($_POST['Prenom']) && ISSET($_POST['Email']) && ISSET($_POST['Telephone']) && ISSET($_POST['Telephone_portable'])
&&ISSET($_POST['Adresse']) && ISSET($_POST['Ville']) && ISSET($_POST['Code_postal']) && ISSET($_POST['Date_naissance']) && ISSET($_POST['Niveau_etude']))
{
  /* Insertion candidat selon id_adresse_ip */
  $bdd = new BDD;
  $bdd->insertCandidatSelonIdadresseIp($_SESSION['ip'], $_POST['Nom'], $_POST['Prenom'], $_POST['Email'], $_POST['Telephone'], $_POST['Telephone_portable'],
  $_POST['Adresse'], $_POST['Ville'], $_POST['Code_postal'], $_POST['Date_naissance'], $_POST['Niveau_etude'], $_SESSION['resultatJSON']);

  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <span>Merci pour votre participation !</span></br>
        <span>Un email a été envoyé aux directrices de formation.</span></br>
        <span>Elles vous contacteront rapidement pour poursuivre les démarches.</span></br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="index.php"><button type="button" class="btn btn-primary">QUITTER</button></a>
      </div>
    </div>
  </div>
  <?php
}else {
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <span>Une erreur est survenue. Contactez le centre de formation.</span></br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="index.php"><button type="button" class="btn btn-primary">QUITTER</button></a>
      </div>
    </div>
  </div>
  <?php
}
?>
