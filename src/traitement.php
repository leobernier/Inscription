<style><?php include('css/index.css') ?></style>
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
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-4" id="checkedOK" align="center"></div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-3">
        <form method="POST" action="traitement.php" id="form">
          <input type="hidden" name="test" value="1">
          <?php
          foreach($questions as $valueQ) {
            $compteurR = 0;
            ++$compteur;
            if ($compteur=="1") {
              ?>
              <div class="row" id="<?=$compteur?>">
                <div class="col-md-12" align="center">
                  <div ><?=$compteur?> - <input name="questionID-<?=$compteur?>" type="hidden" value="<?=$valueQ['id_question']?>"><?=$valueQ['question']?></div><br>
                </div>
                <div class="col-md-12 repMep">
                  <?php
                  $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
                  foreach ($reponses as $valueR) {
                    if ($valueR['type']=="radio") {
                      ?>
                      <input type="radio" name="reponseID-RB-<?=$compteur?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }else{
                      ?>
                      <input type="checkbox" name="reponseID-CB-<?=$compteur?>-<?=++$compteurR?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }
                  }
                  ?>
                </div>
                <br />
                <div class="col-md-6 offset-6" align="center">
                  <button id="questionS<?=$compteur?>" type="button" class="btn btn-primary btn-light suiPrecMep">suivante</button>
                </div>
                <br />
                <div class="col-md-12">
                  <input type="submit" id="valideReponses" class="btn btn-success subMep" value="Envoyer les réponses" style="display:none;"/>
                </div>
              </div>
              <?php
            }elseif($compteur=="5") {
              ?>
              <div class="row d-none" id="<?=$compteur?>">
                <div class="col-md-12" align="center">
                  <div><?=$compteur?> - <input name="questionID-<?=$compteur?>" type="hidden" value="<?=$valueQ['id_question']?>"><?=$valueQ['question']?></div><br>
                </div>
                <div class="col-md-12 repMep">
                  <?php
                  $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
                  foreach ($reponses as $valueR) {
                    if ($valueR['type']=="radio") {
                      ?>
                      <input type="radio" name="reponseID-RB-<?=$compteur?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }else{
                      ?>
                      <input type="checkbox" name="reponseID-CB-<?=$compteur?>-<?=++$compteurR?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }
                  }
                  ?>
                </div>
                <br />
                <div class="col-md-6" align="center">
                  <button id="questionP<?=$compteur?>" type="button" class="btn btn-primary btn-light suiPrecMep">précédente</button>
                </div>
                <br />
                <div class="col-md-12" align="center">
                  <input type="submit" class="btn btn-success subMep" value="Envoyer les réponses"/>
                </div>
              </div>
              <?php
            }else {
              ?>
              <div class="row d-none" id="<?=$compteur?>">
                <div class="col-md-12" align="center">
                  <div><?=$compteur?> - <input name="questionID-<?=$compteur?>" type="hidden" value="<?=$valueQ['id_question']?>"><?=$valueQ['question']?></div><br>
                </div>
                <div class="col-md-12 repMep">
                  <?php
                  $reponses = $goClassBDD->listeReponses($valueQ['id_question']);
                  foreach ($reponses as $valueR) {
                    if ($valueR['type']=="radio") {
                      ?>
                      <input type="radio" name="reponseID-RB-<?=$compteur?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }else{
                      ?>
                      <input type="checkbox" name="reponseID-CB-<?=$compteur?>-<?=++$compteurR?>" value="<?=$valueR['id_reponse']?>"/>
                      <label for="reponseID">&nbsp;&nbsp;<?=$valueR['texte']?></label><br>
                      <?php
                    }
                  }
                  ?>
                </div>
                <br />
                <div class="col-md-6" align="center">
                  <button id="questionP<?=$compteur?>" type="button" class="btn btn-primary btn-light suiPrecMep">précédente</button>
                </div>
                <div class="col-md-6" align="center">
                  <button id="questionS<?=$compteur?>" type="button" class="btn btn-primary btn-light suiPrecMep">suivante</button>
                </div>
                <div class="col-md-12" align="center">
                  <input type="submit" id="valideReponses" class="btn btn-success subMep" value="Envoyer les réponses" style="display:none;"/>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </form>
      </div>
    </div>
  </div>
  <br/>
  <div id="rebours" class="reboursColor" align="center">
  </div>
</div>

<script>
var seconds = 1000;
setInterval( function(){
  --seconds;
  var chrono = document.getElementById('rebours');
  if(seconds>=1){chrono.innerHTML = seconds;}
  if(seconds <=10){
    chrono.classList.remove('reboursColor');
    chrono.classList.add('reboursColorWarning');
  }
  if(seconds <=5){
    chrono.classList.remove('reboursColorWarning');
    chrono.classList.add('reboursColorDanger');
  }
  if (seconds==0) {$('#form').submit();}
}, 1000);
</script>

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
      <div class="row modalRowReussite modal-header">
        <div class="col-md-12" align="center">
          REUSSITE
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" align="center">
          <br/>
          Vous avez obtenus <?= $nbrPoints ?> réponses justes.<br/>
          <br/>
          Pourcentage de réussite : <?= $pourcentageReussite ?> %.<br/>
          <br/>
        </div>
      </div>
      <div class="row modal-footer" align="center">
        <div class="col-md-12" align="center">
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
      <div class="row modalRowEchec modal-header" align="center">
        <div class="col-md-12" align="center">
          ECHEC
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" align="center">
          <br/>
          Vous avez obtenus <?= $nbrPoints ?> réponses justes.<br/>
          <br/>
          Pourcentage de réussite : <?= $pourcentageReussite ?> %<br/>
          <br/>
        </div>
      </div>
      <div class="row modal-footer" align="center">
        <div class="col-md-12" align="center">
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
include('footer.php');
?>
