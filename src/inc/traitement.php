<style><?php include('../css/traitement.css') ?></style>
<?php include('../config.php');

$q = new BDD;
/* Afichage liste questions */
$questions = $q->listeQuestions();
$compteur = 0;
foreach($questions as $valueQ) {
    echo ++$compteur.' - <input name="questionID" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';

    /* Affichage liste réponses */
    $reponses = $q->listeReponses($valueQ['id_question']);
    foreach ($reponses as $valueR) {
      if ($valueR['type']=="radio") {
        echo '<input class="tabReponses" type="radio" name="reponseID" type="hidden" value="'.$valueR['id_reponse'].'">&nbsp;&nbsp;'.$valueR['texte'].'<br>';
      }else{
        echo '<input class="tabReponses" type="checkbox" name="reponseID" type="hidden" value="'.$valueR['id_reponse'].'">&nbsp;&nbsp;'.$valueR['texte'].'<br>';
      }
    }
    echo '<br>';}
?>
