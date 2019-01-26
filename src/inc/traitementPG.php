<?php include('../config.php');

$q = new BDD;
$donnees = $q->questions();

for ($i=0; $i <4 ; $i++) {
  echo $donnees[i];
}
var_dump($donnees);
/*
foreach($donnees as $value) {
  foreach ($value as $key => $v) {
    echo $key.'  '.$v.'<br>';
  }
}
*/
?>
