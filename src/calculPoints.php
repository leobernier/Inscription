<?php
var_dump($_POST);
foreach ($_POST['question_id'] as $value) {
  echo $value;
}
?>
