<style><?php include('../css/traitement.css') ?></style>
<?php include('../config.php');
session_start();

$q = new BDD;
/* Afichage liste questions */
$questions = $q->listeQuestions();
$compteur = 0;
$compteurQ = 0;

echo '<form method="POST" action="calculPoints">';
foreach($questions as $valueQ) {
    $compteurR = 0;
    ++$compteur;
    echo $compteur.' - <input name="questionID-'.$compteur.'" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';

    /* Affichage liste réponses */
    $reponses = $q->listeReponses($valueQ['id_question']);
    foreach ($reponses as $valueR) {
      if ($valueR['type']=="radio") {
        echo '<input class="tabReponses" type="radio" name="reponseID-RB-'.$compteur.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
      }else{
        echo '<input class="tabReponses" type="checkbox" name="reponseID-CB-'.$compteur.'-'.++$compteurR.'" value="'.$valueR['id_reponse'].'"/><label for="reponseID">&nbsp;&nbsp;'.$valueR['texte'].'</label><br>';
      }
    }
  echo '<br>';
}
echo '<input type="submit" value="Envoyer les réponses"/>';
echo '</form>'
?>
