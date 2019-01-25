<?php include('../config.php');

$q = new BDD;
$donnees = $q->questions();

foreach($donnees as $value) {
  foreach ($value as $key => $v) {
    echo $key.'  '.$v.'<br>';
  }
}
?>
