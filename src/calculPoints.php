<?php
include('config.php');

$ReponseQ1CB = array();
$ReponseQ1RB = "";
$ReponseQ2CB = array();
$ReponseQ2RB = "";
$ReponseQ3CB = array();
$ReponseQ3RB = "";
$ReponseQ4CB = array();
$ReponseQ4RB = "";
$ReponseQ5CB = array();
$ReponseQ5RB = "";

$count=0;

// var_dump($_POST);

foreach ($_POST as $key=>$value) {
  for ($i=1; $i <6 ; $i++) {
    switch ($key) {
      case 'reponseID-CB-1-'.$i:
      array_push($ReponseQ1CB, $value);
      break;
      case 'reponseID-RB-1-'.$i:
      $ReponseQ1RB = $value;
      break;
      case 'reponseID-CB-2-'.$i:
      array_push($ReponseQ2CB, $value);
      break;
      case 'reponseID-RB-2-'.$i:
      $ReponseQ2RB =$value;
      break;
      case 'reponseID-CB-3-'.$i:
      array_push($ReponseQ3CB, $value);
      break;
      case 'reponseID-RB-3-'.$i:
      $ReponseQ3RB = $value;
      break;
      case 'reponseID-CB-4-'.$i:
      array_push($ReponseQ4CB, $value);
      break;
      case 'reponseID-RB-4-'.$i:
      $ReponseQ4RB = $value;
      break;
      case 'reponseID-CB-5-'.$i:
      array_push($ReponseQ5CB, $value);
      break;
      case 'reponseID-RB-5-'.$i:
      $ReponseQ5RB = $value;
      break;
      default:
      break;
    }
  }
}

$nbrPoints = 0;

$goClassBDD = new BDD;

$nbrPoints = $goClassBDD->repRBOK($ReponseQ1RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ2RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ3RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ4RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ5RB, $nbrPoints);

$nbrPoints = $goClassBDD->repCBOK($ReponseQ1CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ2CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ3CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ4CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ5CB, $nbrPoints);

$pourcentageReussite = ($nbrPoints*100)/5;

var_dump($pourcentageReussite);
?>
<?php
if ($nbrPoints>=3) {
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      Vous avez réussi.
      Vous avez obtenus <?= $nbrPoints ?> réponses justes.
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      Pourcentage de réussite : <?= $pourcentageReussite ?> %
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="#"><input type="button" />Poursuivre</a>
    </div>
  </div>
</div>
<?php
}else {
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      Vous avez échoué.
      Vous avez obtenus <?= $nbrPoints ?> réponses justes.
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      Pourcentage de réussite : <?= $pourcentageReussite ?> %
    </div>
  </div>
</div>
<?php
}
?>
