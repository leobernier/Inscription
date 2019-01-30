<?php
include('header.php');
include('config.php');

$goClassBDD = new BDD;

if (ISSET($_POST['Identifiant'])&&ISSET($_POST['MotDePasse'])) {
  /* Vérification validité du mot de passe */
  $boolValide = $goClassBDD->motDePasseValide($_POST['Identifiant'], $_POST['MotDePasse']);

  if ($boolValide) {
    /* On récupère tous les candidats */
    $candidatsValides = $goClassBDD->tousCandidatsValide();

    var_dump($candidatsValides);
    ?>
<div> FORMATEUR OK</div>


    <?php
  }else {
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span>ERREUR</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <span>Vous n'êtes pas enregistré en base de données</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="index.php"><button type="button" class="btn btn-danger">RETOUR</button></a>
        </div>
      </div>
    </div>
    <?php
  }
}else {
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <span>ERREUR</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span>Vous n'avez pas remplis tous les champs</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="index.php"><button type="button" class="btn btn-danger">RETOUR</button></a>
      </div>
    </div>
  </div>
  <?php
}
?>
<?php
include('footer.php');
?>
