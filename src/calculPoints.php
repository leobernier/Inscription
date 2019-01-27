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


function repCBOK($tab, $nbrPoints){
  if (empty($tab)) {
    $nbrPoints=$nbrPoints;
  }
  else {
    $goClassBDD = new BDD;
    $bdd = $goClassBDD->accesBDD();

    /* Récupération de l'id de la question */
    $req=$bdd->prepare("SELECT id_question FROM reponses WHERE id_reponse = '".$tab['0']."'");
    $req->execute();
    $id_question = $req->fetch();

    /* Récupération de la liste des réponses justes */
    $req=$bdd->prepare("SELECT id_reponse FROM reponses WHERE id_question = ".(int)($id_question['id_question'])." AND juste = 1");
    $req->execute();
    $reponseJuste=$req->fetchAll();

    foreach ($tab as $value) {
      foreach ($reponseJuste as $key => $valueRJ) {
        if(!in_array($valueRJ['id_reponse'],$tab)){
          $nbrPoints--;
        }else {
          $nbrPoints++;
        }
      }
    }
  }
  return $nbrPoints;
}

$nbrPoints = repCBOK($ReponseQ1CB, $nbrPoints);
$nbrPoints = repCBOK($ReponseQ2CB, $nbrPoints);
$nbrPoints = repCBOK($ReponseQ3CB, $nbrPoints);
$nbrPoints = repCBOK($ReponseQ4CB, $nbrPoints);
$nbrPoints = repCBOK($ReponseQ5CB, $nbrPoints);


echo 'nombre de points = '.$nbrPoints;

/*





var_dump($ReponseQ1CB);
var_dump($ReponseQ2CB);
var_dump($ReponseQ3CB);
var_dump($ReponseQ4CB);
var_dump($ReponseQ5CB);

echo '---------';

$bool = empty($ReponseQ1CB);
echo 'Q1CB vide ? : '.$bool;

$bool = empty($ReponseQ1RB);
echo 'Q1RB vide ? : '.$bool;

var_dump($ReponseQ1CB['0']);
var_dump($ReponseQ2CB['0']);
var_dump($ReponseQ3CB['0']);
var_dump($ReponseQ4CB['0']);
var_dump($ReponseQ5CB['0']);
*/
?>
