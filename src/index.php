<?php
include('header.php');
include('config.php');
session_start();

/* Appel de la BDD */
$goClassBDD = new BDD;

/* Recupère l'adresse ip. ATTENTION, en localhost, ce sera toujours ::1 */
function get_ip() {
  if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
  { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
  elseif( isset($_SERVER['HTTP_CLIENT_IP']) )
  { $ip = $_SERVER['HTTP_CLIENT_IP']; }
  else{ $ip = $_SERVER['REMOTE_ADDR']; }
  return $ip;
}

$ip = get_ip();

/* Enregistrement de l'ip en session pour faire enregistrement des résultats une fois ceux ci effectués */
$_SESSION['ip']=$ip;

// renvoi false si le candidat est nouveau et true s'il existe déjà
$resultat = $goClassBDD->testIP($ip);
?>

<div class="container">
  <div class="row user">
    <div class="col-md-5">
      <img src="images/etudiant.jpg" alt="Avatar" class="image" style="width:100%">
      <div class="middle">
        <button id="consignesbtn" type="button" class="btn btn-light">consignes</button>
      </div>
    </div>
  </div>

  <?php
  /* Controle de l'affichage en fonction de l'ip => désactivé pour pouvoir travailler sur le projet*/
  /*
  if ($resultat)
  {?>
    <div class="container">
      <div class="intro d-none" align="center">
        <br />
        <br />
        <br />
        <p>
          Désolé, vous ne pouvez pas repasser le test
        </p>
        <br />
      </div>
    </container>
    <?php
  }else
  {
  */
  ?>

    <div class="intro d-none" align="center">
      <br />
      <p>
        1. Vous ne pouvez passez le test <strong>qu'une seule fois</strong>.<br/>
        2. Les question a choix multiple peuvent necessiter plusieurs réponses.<br/>
        3. Chaque bonne réponse vous octroie un point.<br/>
        4. Chaque mauvaise réponse compte pour 0.<br/>
        5. Chaque réponse non répondue compte pour 0.<br/>
        6. Vous devez obtenir un total de 3 points.<br/>
        7. Si vous n'obtenez pas le nombre de points exigés, vous ne pourrez plus procéder à votre inscription.<br/>
      </p>
      <br />
      <input type="checkbox" id="ckbxClick">  J'ai bien compris les consignes et je suis prêt pour passer le test</input>
    </div>
    <br />
    <div class="introBtn d-none" align="center">
      <a href="traitement.php"><button type="button" class="btn btn-danger">COMMENCER</button></a>
    </div>
    <?php
  //}
  ?>
  <?php include('footer.php'); ?>
