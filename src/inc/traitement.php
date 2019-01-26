<?php include('../config.php');

$q = new BDD;
/* Afichage liste questions */
$questions = $q->listeQuestions();
foreach($questions as $valueQ) {
    echo '<input name="questionID" type="hidden" value="'.$valueQ['id_question'].'">'.$valueQ['question'].'<br>';

    /* Affichage liste réponses */
    $reponses = $q->listeReponses($valueQ['id_question']);
    foreach ($reponses as $valueR) {
      echo '<input name="reponseID" type="hidden" value="'.$valueR['id_reponse'].'">'.$valueR['texte'].'<br>';
    }
}
?>
