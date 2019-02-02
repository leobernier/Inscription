<style><?php include('css/traitement.css') ?></style>
<?php
include('config.php');
include('header.php');
session_start();

$goClassBDD = new BDD;

/* Affichage de la page avant l'envoi du formulaire */
if (empty($_POST['test'])) {

  /* Afichage liste questions */
  $questions = $goClassBDD->listeQuestions();
  $compteur = 0;
  $compteurQ = 0;

  echo '<div class="container"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><form method="POST" action="traitement.php" align="center" id="form"><input type="hidden" name="test" value="1">';
  foreach($questions as $valueQ) {
    $compteurR = 0;
    ++$compteur;

    /* Afichage de la question 1 */
    if ($compteur=="1") {
      echo '<div id="'.$compteur.'">';
      echo $compteur.' - <input name="questionID-'.$compteur.'" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';
      $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
      foreach ($reponses as $valueR) {
        if ($valueR['type']=="radio") {
          echo '<input class="tabReponses" type="radio" name="reponseID-RB-'.$compteur.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }else{
          echo '<input class="tabReponses" type="checkbox" name="reponseID-CB-'.$compteur.'-'.++$compteurR.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }
      }
      echo '<br /><div class="row"><div class="col-md-6" align="center"></div><div class="col-md-6" align="center">';
      echo '<button id="questionS'.$compteur.'" type="button" class="btn btn-primary btn-light">suivante</button>';
      echo '<input type="submit" id="valideReponses" class="btn btn-success" value="Envoyer les réponses" style="display:none;"/>';
      echo '</div></div></div>';

      /* Afichage de la question 5 */
    }elseif($compteur=="5") {
      echo '<div id="'.$compteur.'" class="d-none">';
      echo $compteur.' - <input name="questionID-'.$compteur.'" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';

      /* Affichage liste réponses */
      $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
      foreach ($reponses as $valueR) {
        if ($valueR['type']=="radio") {
          echo '<input class="tabReponses" type="radio" name="reponseID-RB-'.$compteur.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }else{
          echo '<input class="tabReponses" type="checkbox" name="reponseID-CB-'.$compteur.'-'.++$compteurR.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }
      }
      echo '<br /><div class="row"><div class="col-md-6" align="center">';
      echo '<button id="questionP'.$compteur.'" type="button" class="btn btn-primary btn-light">précédente</button>';
      echo '</div><div class="col-md-6" align="center"></div><br /><br /><div class="col-md-12"><input type="submit" class="btn btn-success" value="Envoyer les réponses"/></div></div>';

      /* Afichage des autres questions */
    }else {
      echo '<div id="'.$compteur.'" class="d-none">';
      echo $compteur.' - <input name="questionID-'.$compteur.'" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';

      /* Affichage liste réponses */
      $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
      foreach ($reponses as $valueR) {
        if ($valueR['type']=="radio") {
          echo '<input class="tabReponses" type="radio" name="reponseID-RB-'.$compteur.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }else{
          echo '<input class="tabReponses" type="checkbox" name="reponseID-CB-'.$compteur.'-'.++$compteurR.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
        }
      }
      echo '<br /><div class="row"><div class="col-md-6" align="center">';
      echo '<button id="questionP'.$compteur.'" type="button" class="btn btn-primary btn-light">précédente</button>';
      echo '</div><div class="col-md-6" align="center">';
      echo '<button id="questionS'.$compteur.'" type="button" class="btn btn-primary btn-light">suivante</button>';
      echo '<input type="submit" id="valideReponses" class="btn btn-success" value="Envoyer les réponses" style="display:none;"/>';
      echo '</div></div></div>';
    }
  }
  echo '</form></div><div class="col-md-4"></div></div></div>';
  ?>

<div id="rebours"></div>
<?php
}else {
  /* Enregistrement dans un cookie du résultat sous format JSON */
  $resultatJSON = json_encode($_POST);
  $_SESSION['resultatJSON']=$resultatJSON;

  /* Déclaration des tableaux contenants les résultats du test */
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

  /* Répartition des résultats dans les tableaux idoines */
  foreach ($_POST as $key=>$value) {
    for ($i=1; $i <6 ; $i++) {
      switch ($key) {
        case 'reponseID-CB-1-'.$i:
        array_push($ReponseQ1CB, $value);
        break;
        case 'reponseID-RB-1':
        $ReponseQ1RB = $value;
        break;
        case 'reponseID-CB-2-'.$i:
        array_push($ReponseQ2CB, $value);
        break;
        case 'reponseID-RB-2':
        $ReponseQ2RB =$value;
        break;
        case 'reponseID-CB-3-'.$i:
        array_push($ReponseQ3CB, $value);
        break;
        case 'reponseID-RB-3':
        $ReponseQ3RB = $value;
        break;
        case 'reponseID-CB-4-'.$i:
        array_push($ReponseQ4CB, $value);
        break;
        case 'reponseID-RB-4':
        $ReponseQ4RB = $value;
        break;
        case 'reponseID-CB-5-'.$i:
        array_push($ReponseQ5CB, $value);
        break;
        case 'reponseID-RB-5':
        $ReponseQ5RB = $value;
        break;
        default:
        break;
      }
    }
  }

  $nbrPoints = 0;

  /* Calcul du nombre de points */
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

  /* Calcul du pourcentage de réussite */
  $pourcentageReussite = ($nbrPoints*100)/5;

  if ($nbrPoints>=3) {
    ?>
    <div class="container" id="modal">
      <div class="row" style="color:green; font-size:40px">
        REUSSITE
      </div>
      <div class="row">
        Vous avez obtenus <?= $nbrPoints ?> réponses justes.
      </div>
      <div class="row">
        Pourcentage de réussite : <?= $pourcentageReussite ?> %
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="formulaire.php"><button type="button" class="btn btn-success">POURSUIVRE</button></a>
        </div>
      </div>
    </div>
    <script>
    afficheModal();
    </script>
    <?php
  }else {
    ?>
    <div class="container" id="modal">
      <div class="row" style="color:red; font-size: 40px;">
        <strong>ECHEC</strong>
      </div>
      <div class="row">
        Vous avez obtenus <?= $nbrPoints ?> réponses justes.
      </div>
      <div class="row">
        Pourcentage de réussite : <?= $pourcentageReussite ?> %
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="index.php"><button type="button" class="btn btn-danger">QUITTER</button></a>
        </div>
      </div>
    </div>
    <script>
    afficheModal();
    </script>
    <?php
  }
}
?>

<!-- Règle le compte à rebours -->
<script>
var seconds = 5;
setInterval( function(){
  --seconds;
  if(seconds>=1)document.getElementById('rebours').innerHTML = "Vous allez être redirigé automatiquement<br>sur la page d'accueil dans "+seconds+" seconde(s) !";
  if (seconds==0) { $('#form').submit();
}
}, 1000);
</script>
<?php
include('footer.php');
?>
